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
                <table class="table">
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

    <script>
        function actionDelete() {
            let _this = $(this);
            $.ajax({
                type: 'GET',
                url: $(this).attr('data-url'),
                success: function(data) {
                    if (data.code == 200) {
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                _this.parent().parent().remove();
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                            }
                        })
                    }
                }
            })
        }
        $(function() {
            $(document).on('click', '.action_delete', actionDelete)
        })

    </script>
@endsection
