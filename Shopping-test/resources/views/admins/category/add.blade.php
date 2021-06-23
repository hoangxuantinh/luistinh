@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <h3>Thêm Danh Mục</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mt-4">
            <form method="post" action="{{ route('category.store') }}">
                @csrf
                <div class="form-group">
                    <label >Nhập danh mục</label>
                    <input  class="form-control" name="name"  placeholder="Please press">
                    <small id="emailHelp" class="form-text text-muted">Nhập danh mục mà bạn muốn thêm</small>
                  </div>
                <div class="form-group">
                    <label >Chọn Danh Mục Cha</label>
                    <select  class="form-control" name="parent_id" id="exampleFormControlSelect2">
                      <option value="0">Chọn Danh Mục Cha</option>
                       {!! $htmlOptions !!}
                      
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
    
@endsection