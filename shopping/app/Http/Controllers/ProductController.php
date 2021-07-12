<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;
use App\Components\CategoryRecusive;
use Str;
use App\Traits\StorageFileUpLoad;
use App\Models\product_image;
use App\Traits\deleteModeTrait;
use DB;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    use StorageFileUpLoad;
    use deleteModeTrait;
    protected $category;
    protected $product;

    public function __construct(category $category,product $product) {
        $this->category = $category;
        $this->product = $product;
    }
    public function index(Request $request) {
        $products = $this->product->latest()->get();
        return view('admins.products.index',compact('products'));
    }
    public function getCategory() {
        $categories = $this->category->all();
        $category = new CategoryRecusive($categories);
        return $category;
    }
    public function create(){
        $category = $this->getCategory();

        $htmlOptions = $category->RecusiveCategory($parentID = '');
        return view('admins.products.add',compact('htmlOptions'));
    }
    
    public function store(Request $request) {
        
        try{
            DB::beginTransaction();
            $data = [
                'name' => $request->name,
                'price' => $request->price,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
                'describtion' => $request->describtion,
            ];
            $dataImgUpload = $this->StorageSingleFile($request,'feature_image_path','products');
            if( !empty($dataImgUpload) ){
                $data['feature_image_path'] = $dataImgUpload['file_path'];
                $data['feature_image_name'] = $dataImgUpload['file_name'];
            }
            $product = $this->product->create($data);
            if( isset($request->image_path) ) {
                foreach($request->image_path as $item) {
                     $dataImgDetail = $this->StorageMutipleFile($item,'products');
                     $product->images()->create([
                        'image_path' => $dataImgDetail['file_path'],
                        'image_name' => $dataImgDetail['file_name']
                    ]);
                }
                
            }
            DB::commit();
            return redirect()->route('product.index');

        }catch(\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' .$exception->getMessage() . '----Line:   ' . $exception->getLine());
        }
        

    }
    public function edit($id) {
        $product = $this->product->find($id);

        $categories = $this->category->all();
        $category = new CategoryRecusive($categories);

        $htmlOptions = $category->RecusiveCategory($product->category_id);
        return view('admins.products.edit',compact('product','htmlOptions'));
    }
    public function update($id,Request $request) {
        try{
            DB::beginTransaction();
            $data = [
                'name' => $request->name,
                'price' => $request->price,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
                'describtion' => $request->describtion,
            ];
            $dataImgUpload = $this->StorageSingleFile($request,'feature_image_path','products');
            if( !empty($dataImgUpload) ){
                $data['feature_image_path'] = $dataImgUpload['file_path'];
                $data['feature_image_name'] = $dataImgUpload['file_name'];
            }
            $this->product->find($id)->update($data);
            if( $request->hasFile('image_path') ) {
                product_image::where('product_id',$id)->delete();
                foreach($request->image_path as $item) {
                     $dataImgDetail = $this->StorageMutipleFile($item,'products');
                     $this->product->find($id)->images()->create([
                        'image_path' => $dataImgDetail['file_path'],
                        'image_name' => $dataImgDetail['file_name']
                    ]);
                }
                
            }
            DB::commit();
            return redirect()->route('product.index');

        }catch(\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' .$exception->getMessage() . '----Line:   ' . $exception->getLine());
        }
        
    }
    public function delete($id) {
        $this->product->find($id)->images()->delete();

        return $this->deleteModeTrait($id,$this->product);
    }
    
}
