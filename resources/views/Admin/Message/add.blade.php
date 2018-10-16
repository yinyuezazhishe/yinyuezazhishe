@extends('Admin.Public.layout')

@section('title',$title)

@section('content')
	<div class="ibox-content">
        <div class="mws-panel-header">
       
        <span>{{$title}}</span>
        </div>
            <form action="/Admin/message" method="post" class="form-horizontal"  enctype='multipart/form-data'>                         
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">轮播标题</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="title">
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">轮播图片</label>
                                <div class="col-sm-5">
                                  <input name="picture" type="file" class="btn btn-outline btn-link">                               
                                   </input>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">轮播排序</label>
                                <div class="col-sm-5">
                                    <input type="number" class="form-control" name="ranks" placeholder="数值越大越靠前">
                                </div>
                            </div>
                             <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">轮播alt</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="alt" placeholder="图片错误提示">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    {{csrf_field()}}  
                                    <button class="btn btn-primary" type="submit">添加轮播图</button>
                                    <button class="btn btn-white" type="submit">取消</button>
                                </div>
                            </div>
         </form>
     </div>
@stop

@section('js')
<script>

    var ue = UE.getEditor('editor');


    $('.mws-form-message').delay(3000).fadeOut(2000);
</script>