@extends('layouts.master')
@section('css')
<style>
    .img_product{
        width: 150px;
        height: 100px;
    }
    .w-5{
        display: none;
    }
</style>
@endsection

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-10">
                <h3>Settings</h3>
            </div>
            <div class="col-md-2 float-right">
                <a href="{{ route('setting.add') }}" class="btn btn-success">Thêm mới</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 mt-4 ">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col" class="text-white">Config Key</th>
                            <th scope="col" class="text-white ">Config Value</th>
                            <th scope="col" class="text-white text-center ">Action</th>
                            

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($settings as $index => $item)

                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->config_key }}</td>
                                <td>{{ $item->config_value }}</td>
                                
                                <td class="mx-auto text-center">
                                    <a href="{{ route('setting.edit',['id' => $item->id]) }}" class="btn btn-primary">Cập Nhật</a>
                                    <a data-url="{{ route('setting.delete',['id' => $item->id]) }}"
                                        class="btn btn-danger action_delete">Xóa</a>
                                </td>

                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-12">
                {{ $settings->links() }}
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{ asset('adminlte/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function actionDelete() {
            let urlDelete = $(this).attr('data-url');
            let _this = $(this);
            $.ajax({
                type: 'GET',
                url: urlDelete,
                dataType: 'JSON',
                success: function(data) {
                    if (data.code === 200) {
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
            $(document).on('click','.action_delete',actionDelete);
        })
    </script>
    
@endsection

