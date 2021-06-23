@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <h3>Thêm cài đặt</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mt-4">
            <form method="post" action="{{ route('setting.update',['id' => $setting->id]) }}">
                @csrf
                <div class="form-group">
                    <label >Nhập Configure Key</label>
                    <input  class="form-control" name="config_key" value="{{ $setting->config_key }}"  placeholder="Please press">
                    <small id="emailHelp" class="form-text text-muted">Nhập cài dặt mà bạn muốn thêm</small>
                  </div>
                <div class="form-group">
                    <label >Nhập Configure Value</label>
                    <input  class="form-control" name="config_value" value="{{ $setting->config_value }}"  placeholder="Please press">
                </div>
                <button type="submit" class="btn btn-primary">Cập Nhật</button>
            </form>
        </div>
    </div>
</div>
    
@endsection