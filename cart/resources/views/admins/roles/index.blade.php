@extends('layouts.admin')

@section('title')
    <title>Users</title>
@endsection

@section('js')
    <script src="{{ asset('vendors/sweetalert2/sweetalert2@11.js')}}"></script>


    <script type="text/javascript" src="{{ asset('admins/users/index/index.js') }}"></script>
@endsection


@section('content')

    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Roles', 'key' => 'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('roles.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Action</th>

                                
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($roles as $role)

                                <tr>
                                    <th scope="row">{{ $role->id }}</th>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->display_name}}</td>
                                    <td>
                                        <a href="{{ route('roles.edit',['id' => $role->id]) }}" class="btn btn-default">Edit</a>
                                        <a data-url="{{ route('roles.delete',['id' => $role->id] ) }}"  class="btn btn-danger action_delete">Delete</a>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $roles->links() }}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection

