@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <h3>Thêm nhân viên</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mt-4">
            <form method="post" action="{{ route('setting.store') }}">
                @csrf
                <div class="form-group">
                    <label >Tên nhân viên</label>
                    <input  class="form-control" name="config_key"  placeholder="Please press">
                    <small id="emailHelp" class="form-text text-muted">Nhập chức vụ mà bạn muốn thêm</small>
                  </div>
                  <div class="form-group">
                    <label >Email</label>
                    <input  class="form-control" name="config_key"  placeholder="Please press">
                  </div>
                  <div class="form-group">
                    <label >Password</label>
                    <input  class="form-control" name="config_key"  placeholder="Please press">
                  </div>
                <div class="form-group">
                    <label >Chức vụ</label>
                    <input  class="form-control" name="config_value"  placeholder="Please press">
                </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
    
@endsection