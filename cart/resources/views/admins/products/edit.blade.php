
@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('css')
    <link href=" {{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href=" {{ asset('admins/products/add/add.css') }}" rel="stylesheet" />

@endsection


@section('content')

    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Products', 'key' => 'Edit'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <form action="{{ route('product.update',['id'=>$product->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên Sản Phẩm</label>
                                <input type="text"
                                       class="form-control"
                                       name="name"
                                       placeholder="Nhập tên sản phẩm"
                                       value="{{ $product->name }}"
                                >
                            </div>
                            <div class="form-group">
                                <label>Gía Sản Phẩm</label>
                                <input type="text"
                                       class="form-control"
                                       name="price"
                                       value="{{ $product->price }}"                                   
                                >
                            </div>
                            <div class="form-group">
                                <label> Ảnh Đại Diện  </label>
                                <input type="file" class="form-control-file" name="featute_image_path">
                                <div class="col-md-8">
                                    <img class="feature_image" src="{{ $product->feature_image_path }}" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label> Ảnh Chi Tiết  </label>
                                <input type="file" class="form-control-file" name="image_path[]" multiple>
                                
                                <div class="col-md-12 product_image_contain">
                                    <div class="row">
                                        @foreach ($product->images as $imageItem)
                                        <div class="col-md-3">
                                            <img class="product_image" src="{{ $imageItem->img_path }}" alt="">
                                        </div>
                                        @endforeach
                                    </div>                                   
                                </div>
                               
                            </div>

                            <div class="form-group">
                                <label>Chọn menus cha</label>
                                <select class="form-control" name="category_id">
                                    <option value="0">Chọn menu cha</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Nhập Tags</label>
                                <select class="form-control select2_tag_choose" name="tags[]" multiple>
                                    @foreach ($product->tags as $tagItem)
                                        
                                    
                                    <option selected value="{{ $tagItem->name }}">{{ $tagItem->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Nội Dung</label>
                                <textarea class="form-control" id="my-editor" name="content" rows="3">{{ $product->content }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admins/products/add/add.js') }}"></script>
    <script src="{{ asset('vendors/ckeditor/ckeditor/ckeditor.js') }}"></script>
    
    <script>
        CKEDITOR.replace('my-editor');
    </script>
    
    
    
@endsection
