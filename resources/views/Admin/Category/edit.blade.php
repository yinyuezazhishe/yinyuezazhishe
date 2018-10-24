@extends('Admin.Public.layout')
 
@section('title', $title)

@section('content')
<div class="ibox-content">
        <div class="mws-panel-header">
       
        <span>{{$title}}</span>
        </div>
            <form action="/admin/category/{{$rs->id}}" method="post" class="form-horizontal"  enctype='multipart/form-data'>                         
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">类别名称</label>
                                <div class="col-sm-5">
                                 <input type="text" class="form-control" name="catename" value="{{$rs->catename}}">
                                </div>
                            </div>

                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    {{csrf_field()}} 
                                    {{ method_field('PUT') }} 
                                    <button class="btn btn-primary" type="submit">修改类别</button>
                                    <a class="btn btn-white" href="javascript:history.back();">取消</a>
                                </div>
                            </div>
         </form>
     </div>
@stop
@section('js')
    <script type="text/javascript">
         //改变导航条样式
        var show_category = $('.show_category').parents('li');
        $('.show_category a').css({'color':'#fff'});
        show_category.attr('class','active');
    </script>

@stop