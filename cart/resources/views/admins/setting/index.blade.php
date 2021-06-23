@extends('layouts.admin')

@section('title')
    <title>Setting</title>
@endsection

@section('css')
    <style>
        .dropdown {
            margin-left: 930px;
        }
    </style>
    
@endsection




@section('content')

    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Setting', 'key' => 'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="dropdown ">
                        <button class="btn btn-secondary dropdown-toggle right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Setting Add
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="{{ route('setting.create') .'?type=Text' }}">Text</a>
                          <a class="dropdown-item" href="{{ route('setting.create') .'?type=Textarea' }}">TextArea</a>
                          
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Configure Key</th>
                                <th scope="col">Configure Value</th>
                                <th scope="col">Action</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($setting as $settingItem)

                                <tr>
                                    <th scope="row">{{ $settingItem->id }}</th>
                                    <td>{{ $settingItem->configure_key  }}</td>
                                    <td>{{ $settingItem->configure_value }}</td>
                                    <td>
                                        <a href="{{ route('setting.edit',['id' => $settingItem->id])
                                         . '?type=' .$settingItem->type }}"class="btn btn-default">Edit</a>
                                        <a href="" data-url="{{ route('setting.delete',['id'=>$settingItem->id]) }}" class="btn btn-danger action_delete">Delete</a>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $setting->links() }}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
@section('js')
    <script src="{{ asset('vendors/sweetalert2/sweetalert2@11.js')}}"></script>
    <script src="{{ asset('admins/slider/index/index.js')}}"></script>

    
@endsection

