@extends('layouts.admin')

@section('title')
    <title>Permission</title>
@endsection
@section('js')
    <script>
        $('.check_all').on('click', function() {
            $(this).parents().find('.check_element').prop('checked', $(this).prop('checked'));
        })

    </script>
@endsection


@section('content')

    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Permissin', 'key' => 'Add'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('permission.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Module Cha</label> <br>
                                <select name="module_parent" id="" style="width:100%;height:36px">
                                    <option value="">Chọn module cha</option>
                                    @foreach (config('permissions.module_parent') as $permissionParent)

                                        <option value="{{ $permissionParent }}">{{ $permissionParent }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="checkbox" class="check_all">
                                        Check All
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                @foreach (config('permissions.module_childrent') as $permissionChildrent)

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="checkbox" name="module_child[]" class="check_element"
                                                value="{{ $permissionChildrent }}">
                                            {{ $permissionChildrent }}
                                        </div>
                                    </div>
                                @endforeach


                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
