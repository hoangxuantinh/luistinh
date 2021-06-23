@extends('layouts.master')

@section('css')
<style>
    .product_img_feature{
        width: 180px;
        height: 130px;
        margin-top: 12px;
    }
</style>
    
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <h3>Chỉnh sửa sản phẩm</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mt-4">
            <form method="post" action="{{ route('product.update',['id' => $product->id]) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label >Nhập tên sản phẩm</label>
                    <input  class="form-control" name="name"  value="{{ $product->name }}"  placeholder="Please press">
                    <small id="emailHelp" class="form-text text-muted @error('name') is-invalid @enderror">
                        Nhập danh mục mà bạn muốn thêm
                    </small>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-group">
                    <label >Giá</label>
                    <input 
                      class="form-control @error('price') is-invalid @enderror" name="price"
                      value="{{ $product->price }}"  placeholder="Please press price">
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label >Ảnh đại diện</label>
                    <input class="form-control @error('feature_image_path') is-invalid @enderror"
                     type="file" name="feature_image_path" >
                     <div class="row">
                         <div class="col-md-3"></div>
                     </div>
                     <div class="div">
                         <img class="product_img_feature" src="{{ $product->feature_image_path }}" alt="">
                     </div>
                    @error('feature_image_path')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label >Ảnh chi tiết</label>
                    <input  class="form-control"  type="file" multiple name="image_path[]" >
                    <div class="div">
                        @foreach ($product->images as $item)
                            <img class="product_img_feature"  src="{{ $item->image_path }}" alt="">
                        @endforeach
                    </div>
                    
                </div>
                <div class="form-group">
                    <label >Chọn Danh Mục Cha</label>
                    <select  class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="exampleFormControlSelect2">
                      <option value="0">Chọn Danh Mục Cha</option>
                       {!! $htmlOptions !!}
                       
                      
                    </select>
                    @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    

                </div>
                <div class="form-group">
                    <label >Describtion</label>
                    <textarea id="my-editor" value="" name="describtion" class="form-control @error('describtion') is-invalid @enderror" rows="3">{{ $product->describtion }}</textarea>
                    @error('describtion')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
    
@endsection
@section('js')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('my-editor');
    </script>
    
@endsection