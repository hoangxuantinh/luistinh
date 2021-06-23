<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SliderAddRequest;
use App\Traits\DeleteModelTrait;
use App\Models\slider;
use App\Traits\StorageImageTrait;
use Log;

class SliderController extends Controller
{
    use StorageImageTrait,DeleteModelTrait;
    private $slider;
    public function __construct(slider $slider) {
        $this->slider = $slider;
    }
    public function index() {
        $sliders = $this->slider->paginate(5);
        return view('admins.slider.index',compact('sliders'));
    }
    public function create() {
        return view('admins.slider.add');
    }
    public function store(SliderAddRequest $request) {
        try {
            $dataSliderUpload = [
                'name' => $request->name,
                'describtion' => $request->describtion,
            ];
            $dataImgUpload = $this->storageTraitUpload($request,'image_path','slider');
            if( !empty($dataImgUpload) ) {
                $dataSliderUpload['image_path'] = $dataImgUpload['file_path'];
                $dataSliderUpload['image_name'] = $dataImgUpload['file_name'];
            }
            $this->slider->create($dataSliderUpload);  
            return redirect()->route('slider.index'); 

        }catch(\Exception $exception) {
            Log::error('Message : '.$exception->getMessage(). '---Line:  ' .$exception->getLine() );
        }

       
    }
    public function edit($id) {
        $slider = $this->slider->find($id);
        return view('admins.slider.edit',compact('slider'));
    }
    public function update(Request $request, $id){
        try {
            $dataSliderUpdate = [
                'name' => $request->name,
                'describtion' => $request->describtion,
            ];
            $dataImgUpload = $this->storageTraitUpload($request,'image_path','slider');
            if( !empty($dataImgUpload) ) {
                $dataSliderUpdate['image_path'] = $dataImgUpload['file_path'];
                $dataSliderUpdate['image_name'] = $dataImgUpload['file_name'];
            }
            $this->slider->find($id)->update($dataSliderUpdate);  
            return redirect()->route('slider.index'); 

        }catch(\Exception $exception) {
            Log::error('Message : '.$exception->getMessage(). '---Line:  ' .$exception->getLine() );
        }
    }
    public function delete($id) {
        return $this->deleteModelTrait($id,$this->slider);
    }

}
