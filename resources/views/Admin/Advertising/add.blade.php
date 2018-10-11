@extends('Admin.Public.layout')

@section('title',$title)

@section('content')
	<div class="ibox-content">
        <div class="mws-panel-header">
       
        <span>{{$title}}</span>
        </div>
            <form action="/Admin/advertising" method="post" class="form-horizontal"  enctype='multipart/form-data'>                         
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">广告标题</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="title">
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">广告图片</label>
                                <div class="col-sm-5">
                                  <input name="picture" type="file" class="btn btn-outline btn-link">                               
                                   </input>
                                </div>
                            </div>

                             <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">广告链接</label>
                                <div class="col-sm-5">
                                  <input type="text" class="form-control" name="links" placeholder="请输入广告跳转地址">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    {{csrf_field()}}  
                                    <button class="btn btn-primary" type="submit">添加广告</button>
                                    <button class="btn btn-white" type="submit">取消</button>
                                </div>
                            </div>
         </form>
     </div>
@stop