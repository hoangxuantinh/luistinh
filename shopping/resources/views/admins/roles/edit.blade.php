@extends('layouts.master')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <h3>Thêm chức vụ</h3>
            </div>
        </div>
        <div class="row">
            <form method="post" action="{{ route('role.update', ['id' => $role->id]) }}" style="width: 100%;">
                <div class="col-md-12">
                    @csrf
                    <div class="form-group">
                        <label>Tên chức vụ</label>
                        <input class="form-control" value="{{ $role->name }}" name="name" placeholder="Please press">
                        <small class="form-text text-muted">Nhập chức vụ mà bạn muốn thêm</small>
                    </div>
                    <div class="form-group">
                        <label>Mô tả chức vụ</label>
                        <input class="form-control" value="{{ $role->display_name }}" name="display_name" placeholder="Please press">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <label>
                                <input type="checkbox" class="check_all"> Check All
                            </label>
                        </div>
                        @foreach ($permissionParents as $permissionParent)
                            <div class="card text-white col-md-12">
                                <div class="card-header bg-success ">
                                    <input type="checkbox" class="checkbox_wrapper">
                                    Module {{ $permissionParent->name }}
                                </div>

                                <div class="row">
                                    @foreach ($permissionParent->permissionChildrent as $itemChildrent)
                                        <div class="card-header col-md-3">

                                            <h5 class="card-title">
                                                <input type="checkbox" name="permission_id[]" class="checkbox_element"
                                                    value="{{ $itemChildrent->id }}" {{$permissionsOfRole->contains('id',$itemChildrent->id) ? 'checked' : null}}>
                                                {{ $itemChildrent->name }}
                                            </h5>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

    </div>

@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/role/add.js') }}"></script>
    
@endsection
