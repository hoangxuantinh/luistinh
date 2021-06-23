@extends('layouts.master')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <h3>Thêm nhân viên</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mt-4">
                <form method="post" action="{{ route('user.update',['id' => $user->id]) }}">
                    @csrf
                    <div class="form-group">
                        <label>Tên nhân viên</label>
                        <input class="form-control" name="name" value="{{ $user->name }}" placeholder="Please press">
                        <small  class="form-text text-muted">Nhập chức vụ mà bạn muốn thêm</small>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" value="{{ $user->email }}" placeholder="Please press">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" name="password"  placeholder="Please press">
                    </div>
                    <div class="form-group">
                        <label>Chức vụ</label>
                        <select class="form-control select2_option" name="role_id[]" multiple placeholder="Please press">
                            <option value="" ></option>
                            @foreach ($roles as $role)
                                <option {{ $roleOfUser->contains('id',$role->id) ? 'selected' : null }}
                                 value="{{$role->id }}"> {{ $role->name }}</option>

                            @endforeach

                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(".select2_option").select2({
            placeholder: "Select a state",
        });

    </script>
@endsection
