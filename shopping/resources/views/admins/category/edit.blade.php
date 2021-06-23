@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <h3>Thêm Sản Phẩm</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mt-4">
            <form method="post" action="{{ route('category.update',['id' => $category->id]) }}">
                @csrf
                <div class="form-group">
                    <label >Nhập danh mục</label>
                    <input  class="form-control" value="{{ $category->name }}" name="name"  placeholder="Please press">
                    <small id="emailHelp" class="form-text text-muted">Nhập danh mục mà bạn muốn thêm</small>
                  </div>
                <div class="form-group">
                    <label >Chọn Danh Mục Cha</label>
                    <select  class="form-control" name="parent_id" id="exampleFormControlSelect2">
                      <option value="0">Chọn Danh Mục Cha</option>
                       {!! $htmlOptions !!}
                      
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Cập Nhật</button>
            </form>
        </div>
    </div>
</div>
    
@endsection