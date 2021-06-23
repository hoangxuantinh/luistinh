@extends('layouts.admin')

@section('title')
    <title>Setting</title>
@endsection


@section('content')

    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Setting', 'key' => 'Add'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('setting.update',['id' => $settingEdit->id]) . '?type=' . request()->type }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Configure Key</label>
                                <input type="text" class="form-control 
                                @error('configure_key') is-invalid @enderror" value="{{ $settingEdit->configure_key }}"
                                    name="configure_key" placeholder="Nhập Configue Key">
                                @error('configure_key')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            @if (request()->type === 'Text')
                                <div class="form-group">
                                    <label>Configure Key</label>
                                    <input type="text" class="form-control @error('configure_value') is-invalid @enderror"
                                        name="configure_value" placeholder="Nhập Configue value" value="{{ $settingEdit->configure_value }}">
                                    @error('configure_value')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            @elseif(request()->type === 'Textarea')
                                <div class="form-group">
                                    <label>Configure Key</label>
                                    <textarea type="text"
                                        class="form-control @error('configure_value') is-invalid @enderror"
                                        name="configure_value" placeholder="Nhập Configue value" rows="5"></textarea>
                                    @error('configure_value')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror    
                                </div>
                            @endif



                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
