<?php

namespace App\Http\Controllers;
use App\Components\Recusive;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\product_tag;
use App\Models\product_image;
use App\Http\Requests\StoreProductAdmin;
use App\Traits\StorageImageTrait;
use App\Models\category;
use App\Models\tag;
use Storage;
use DB;
use Log;
use Str;


class AdminProductsController extends Controller
{
    use StorageImageTrait;
    private $product;
    private $product_tag;
    private $category;
    private $tag;
    private $product_img;

    
    public function __construct(product_tag $product_tag,product_image $product_image,
    product $product,category $category,tag $tag) {
        $this->product = $product;
        $this->product_tag = $product_tag;
        $this->product_image = $product_image;

        $this->category = $category;
        $this->tag = $tag;

    }
    public function index() {
        $products = $this->product->latest()->paginate(5);
        return view('admins.products.index',compact('products'));
    }
    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        return view('admins.products.add', compact('htmlOption'));
    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }



    public function store(StoreProductAdmin $request) {
        try{
            DB::beginTransaction();
            $dataProductCreate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->content,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
                'views_count' => 8,
            ];
            $dataImageUpload = $this->storageTraitUpload($request,'featute_image_path','product');
            
            if ( !empty($dataImageUpload) ) {
                $dataProductCreate['feature_image_name'] = $dataImageUpload['file_name'];
                $dataProductCreate['feature_image_path'] = $dataImageUpload['file_path'];
            }
            
            $product = $this->product->create($dataProductCreate);
            if( $request->hasFile('image_path') ) {
                foreach($request->image_path as $dataImgItem) {
                    $dataImageUploadDetail = $this->storageTraitUploadMutiple($dataImgItem,'product');
                    $product->images()->create([
                        'image_name' => $dataImageUploadDetail['file_name'],
                        'img_path' => $dataImageUploadDetail['file_path'],
                    ]);
                }
            }
            //insert data into tags
            $tagId = [];
            if( !empty($request->tags) ) {
                foreach($request->tags as $tagItem) {
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagId[] = $tagInstance->id;
                    // $product->tags()->create([
                    //     'product_id' => $product->id,
                    //     'tag_id' => $tagInstance->id,
                    // ]);
    
                }
            }
            $product->tags()->attach($tagId);
            DB::commit();

            
            return redirect()->route('product.index');

        }
        catch(\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' .$exception->getMessage() . '----Line :  '.$exception->getLine());

        }
        
    }
    
    public function edit($id){
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        return view('admins.products.edit',compact('product','htmlOption'));

    }
    public function update($id,Request $request){
        try{
            DB::beginTransaction();
            $dataProductUpdate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->content,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id
            ];
            $dataImageUpload = $this->storageTraitUpload($request,'featute_image_path','product');
            
            if ( !empty($dataImageUpload) ) {
                $dataProductUpdate['feature_image_name'] = $dataImageUpload['file_name'];
                $dataProductUpdate['feature_image_path'] = $dataImageUpload['file_path'];
            }
            
            $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);

            if( $request->hasFile('image_path') ) {
                $this->product_image->where('product_id',$id)->delete();

                foreach($request->image_path as $dataImgItem) {
                    $dataImageUploadDetail = $this->storageTraitUploadMutiple($dataImgItem,'product');
                    $product->images()->create([
                        'image_name' => $dataImageUploadDetail['file_name'],
                        'img_path' => $dataImageUploadDetail['file_path'],
                    ]);
                }
            }
            //insert data into tags
            $tagId = [];
            if( !empty($request->tags) ) {
                foreach($request->tags as $tagItem) {
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagId[] = $tagInstance->id;
                    // $product->tags()->create([
                    //     'product_id' => $product->id,
                    //     'tag_id' => $tagInstance->id,
                    // ]);
    
                }
            }
            $product->tags()->sync($tagId);
            DB::commit();

            
            return redirect()->route('product.index');

        }
        catch(\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' .$exception->getMessage() . '----Line :  '.$exception->getLine());

        }
        
    }

    public function delete($id) {
        try{
            $this->product->find($id)->delete();
            return response()->json([
                'code' => '200',
                'message' => 'success'
            ]);
        }
        catch(\Exception $exception) {
            Log::error('Message: ' .$exception->getMessage(). '---Line : '.$exception->getLine());
            return response()->json([
                'code' => '500',
                'message' => 'fail',
            ]);
        }
    }
}
