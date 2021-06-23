@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <h3>Thêm Dữ Liệu Permission</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-4">
            <form method="post" action="{{ route('permission.store') }}">
                @csrf
                <div class="form-group">
                    <label >Chọn Module Cha</label>
                    <select  class="form-control" name="module_parent"  id="exampleFormControlSelect2">
                        <option value="0">Chọn Danh Mục Cha</option>

                        @foreach (config('permissions.module_parent') as $moduleParent)
                            <option value="{{ $moduleParent }}">{{ $moduleParent  }}</option>
                        @endforeach
        
                    </select>
                </div>
                <div class="form-group row">
                    <label class="col-md-12" >Chọn module con</label> <br>
                    <div class="col-md-13 ml-3">
                        <label class="text-infor"> 
                            Check All
                             <input type="checkbox" class="check_all">
                        </label>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="row ">
                            
                            @foreach (config('permissions.module_childrent') as $moduleChildrent)
                                <div class="col-md-3">
                                    <label>
                                        <input type="checkbox" name="module_childrent[]" value="{{$moduleChildrent}}" class="check_element"> 
                                         {{$moduleChildrent}}
            
                                    </label>

                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-1 btn-click">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
    
@endsection
@section('js')
    <script>
        $('btn-click').on('click',function() {
            alert('Thêm thành công');
        })
        $('.check_all').on('click',function() {
            $(this).parents('.form-group').find('.check_element').prop('checked',$(this).prop('checked'));
        })

    </script>
    
@endsection