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
        @include('partials.content-header', ['name' => 'Products', 'key' => 'Add'])
        <div class="row">
            <div class="col-md-12">
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên Sản Phẩm</label>
                                <input type="text" class="form-control @error('name')is-invalid @enderror" name="name"
                                    placeholder="Nhập tên sản phẩm" value="{{ old('name') }}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Gía Sản Phẩm</label>
                                <input type="text" class="form-control @error('price')is-invalid @enderror" 
                                value="{{ old('price') }}" name="price">
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label> Ảnh Đại Diện </label>
                                <input type="file" class="form-control-file" name="featute_image_path">
                            </div>
                            <div class="form-group">
                                <label> Ảnh Chi Tiết </label>
                                <input type="file" class="form-control-file" name="image_path[]" multiple>
                            </div>

                            <div class="form-group">
                                <label>Chọn menus cha</label>
                                <select class="form-control @error('category_id')is-invalid @enderror" name="category_id">
                                    <option value="0">Chọn menu cha</option>
                                    {!! $htmlOption !!}
                                </select>
                                @error('category_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label>Nhập Tags</label>
                                <select value="{{ old('tags') }}" class="form-control select2_tag_choose  @error('tags')is-invalid @enderror" name="tags[]" multiple>

                                </select>
                                @error('tags')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Nội Dung</label>
                                <textarea class="form-control @error('content')is-invalid @enderror" id="my-editor" value="{{ old('content') }}"
                                    name="content" rows="3"></textarea>
                                @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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
