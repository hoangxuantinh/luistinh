@extends('layouts.admin')

@section('title')
    <title>User</title>
@endsection

@section('css')
    <link href=" {{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href=" {{ asset('admins/users/add/add.css') }}" rel="stylesheet" />
    <style>
        .card-body {
            background: #fff;
            color: blue;
        }

    </style>
@endsection

@section('js')
    <script src="{{ asset('admins/roles/edit/edit.js') }}"></script>
@endsection


@section('content')

    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Users', 'key' => 'Add'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{ route('roles.store') }}" method="post" style="width:100%;">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Vai trò</label>
                                    <input type="text" class="form-control" name="name" placeholder="Nhập tên">

                                </div>
                                <div class="form-group">
                                    <label>Mô tả vai trò</label>
                                    <textarea type="text" class="form-control" name="display_name"
                                        placeholder="Nhập vai trò"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label >
                                    
                                    <input type="checkbox" class="check_all">
                                    Check aLL
                                </label>
                            </div>
                            <div class="col-md-12">
                                @foreach ($permissionParent as $permissionParentItem)
                                    <div class="card text-white bg-primary col-md-12">
                                        <div class="card-header">
                                            <label>
                                                <input type="checkbox" class="input_wrapper">
                                            </label>
                                            Module {{ $permissionParentItem->name }}
                                        </div>

                                        <div class="row">
                                            @foreach ($permissionParentItem->permissionChildrent as $permissionChildrent)

                                                <div class="card-body col-md-3">
                                                    <h5 class="card-title">
                                                        <label>
                                                            <input type="checkbox" class="input_child"
                                                                name="permission_id[]"
                                                                value="{{ $permissionChildrent->id }}">
                                                        </label>
                                                        {{ $permissionChildrent->name }}
                                                    </h5>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
