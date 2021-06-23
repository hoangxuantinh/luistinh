@extends('layouts.admin')

@section('title')
    <title>Products</title>
@endsection

@section('js')
    {{-- <script src="{{ asset('vendors/sweetAlert2/sweetalert2@9.js') }}"></script> --}}
    {{-- <script type="text/javascript" src="{{ asset('admins/main.js') }}"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('admins/products/index/index.js') }}"></script>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/products/index/index.css') }}">
    
@endsection


@section('content')

    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Products', 'key' => 'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('product.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên Sản Phẩm</th>
                                <th scope="col">Gía </th>
                                <th scope="col"> Hình Anh </th>
                                <th scope="col">Danh Mục </th>
                                <th scope="col">Action </th>

                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    
                                <tr>
                                    <th scope="row">{{ $product->id }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ number_format($product->price) }}</td>
                                    <td>
                                        <img class="category_img" src="{{ $product->feature_image_path }}" alt="">
                                    </td>
                                
                                    <td>{{ optional($product->category)->name }}</td>
                                    <td>
                                        <a href="{{ route('product.edit',['id' => $product->id] ) }}"class="btn btn-default">Edit</a>
                                        <a href="" data-url="{{ route('product.delete',['id'=>$product->id]) }}" class="btn btn-danger action_delete">Delete</a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $products->links() }}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection

