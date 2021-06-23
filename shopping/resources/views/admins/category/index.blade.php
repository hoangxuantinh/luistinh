@extends('layouts.master')
@section('css')
    <style>
        .w-5 {
            display: none;
        }

    </style>


@endsection
@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-6">
                <h3>Danh Mục</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 mt-4 mx-auto">
                <table class="table" id="myTable">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="text-white">Tên danh mục</th>
                            <th scope="col" class="text-white text-center">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $item)

                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->name }}</td>
                                <td class="mx-auto text-center">
                                    <a href="{{ route('category.edit', ['id' => $item->id]) }}" class="btn btn-primary">Cập
                                        Nhật</a>
                                    <a data-url="{{ route('category.delete', ['id' => $item->id]) }}"
                                        class="btn btn-danger action_delete">Xóa</a>
                                </td>

                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-2 mt-4">
                <a href="{{ route('category.add') }}" class="btn btn-success">Thêm Mới</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {{ $categories->links() }}
            </div>
        </div>
    </div>

@endsection
@section('js')
    
    <script src="{{ asset('adminlte/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('js/role/delete/deleteMode.js') }} "></script>
    <script>
        
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
