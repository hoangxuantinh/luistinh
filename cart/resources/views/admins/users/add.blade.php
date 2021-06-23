@extends('layouts.admin')

@section('title')
    <title>User</title>
@endsection

@section('css')
    <link href=" {{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href=" {{ asset('admins/users/add/add.css') }}" rel="stylesheet" />
@endsection

@section('js')

    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admins/users/add/add.js') }}"></script>

@endsection


@section('content')

    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Users', 'key' => 'Add'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('users.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    placeholder="Nhập tên">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                                    placeholder="Nhập Email">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control @error('password') is-invalid @enderror"
                                    name="password" placeholder="Nhập mật khẩu">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Chức vụ</label>
                                <select class="form-control @error('display_name') is-invalid @enderror select2_init"
                                    multiple name="role_id[]">
                                    <option value=""></option>

                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                    @error('role_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
