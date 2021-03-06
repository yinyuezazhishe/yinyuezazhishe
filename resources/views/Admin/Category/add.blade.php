@extends('Admin.Public.layout')
 
@section('title', $title)

@section('content')
<div class="ibox-content">
        <div class="mws-panel-header">
       
        <span>{{$title}}</span>
        </div>
            <form action="/admin/category" method="post" class="form-horizontal"  enctype='multipart/form-data'>                         
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">类别名称</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="catename">
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">父级分类</label>
                            <div class="ol-sm-5">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <select class="small" name='pid'>
                                    <option value='0'>顶级类别</option>
                                    @foreach($rs as $k => $v)
                                    <option value='{{$v->id}}' @if($ids==$v->id) selected='selected' @endif>{{$v->catename}}</option>

                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    {{csrf_field()}}  
                                    <button class="btn btn-primary" type="submit">添加类别</button>
                                    <a href="/Admin/category" class="btn btn-warning">取消</a>
                                </div>
                            </div>
         </form>
     </div>
@stop
@section('js')
    <script type="text/javascript">
         //改变导航条样式
        var create_category = $('.create_category').parents('li');
        $('.create_category a').css({'color':'#fff'});
        create_category.attr('class','active');
    </script>
@stop