<?php
$baseUrl = 'http://localhost:8000'; ?>
@extends('layouts.master')
@section('css')
    <style>
        .img_product {
            width: 150px;
            height: 60px;
        }

        .w-5 {
            display: none;
        }

    </style>
@endsection


@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-10">
                <h3>Sản Phẩm</h3>
            </div>
            <div class="col-md-2 float-right">
                <a href="{{ route('product.add') }}" class="btn btn-success">Thêm mới</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-4 mx-auto">
                <table class="table" id="myTable">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="text-white">Tên sản phẩm</th>
                            <th scope="col" class="text-white ">Hình ảnh</th>
                            <th scope="col" class="text-white ">Giá</th>
                            <th scope="col" class="text-white text-center">Danh Mục</th>
                            <th scope="col" class="text-white text-center">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)

                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <img class="img_product" src="{{ $item->feature_image_path }}" alt="">
                                </td>
                                <td>{{ number_format($item->price) }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td class="mx-auto text-center">
                                    <a href="{{ route('product.edit', ['id' => $item->id]) }}" class="btn btn-primary">Cập
                                        Nhật</a>
                                    <a data-url="{{ route('product.delete', ['id' => $item->id]) }}"
                                        class="btn btn-danger action_delete">Xóa</a>
                                </td>

                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection
@section('js')

    <script src="{{ asset('adminlte/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/role/delete/deleteMode.js') }} "></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>



    <script>
        
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
