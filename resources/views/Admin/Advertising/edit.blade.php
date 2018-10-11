@extends('Admin.Public.layout')

@section('title',$title)

@section('content')
	<div class="ibox-content">
        <div class="mws-panel-header">
       
        <span>{{$title}}</span>
        </div>
            <form action="/Admin/advertising/{{$rs->id}}" method="post" class="form-horizontal"  enctype='multipart/form-data'>                         
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">广告标题</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="title" value="{{$rs->title}}">
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">广告图片</label>
                                <div class="col-sm-5">
                                  <input name="picture" value="{{$rs->picture}}" type="file" class="btn btn-outline btn-link">
                                  <!-- <img width="50px" src="{{$rs->picture}}" alt="">                        -->
                                   </input>
                                </div>
                            </div>

                             <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">广告链接</label>
                                <div class="col-sm-5">
                                  <input type="text" class="form-control" name="links" value="{{$rs->links}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    {{csrf_field()}}
                                    {{ method_field('PUT') }} 
                                    <button class="btn btn-primary" type="submit">修改广告</button>
                                    <button class="btn btn-white" type="submit">取消</button>
                                </div>
                            </div>
         </form>
     </div>
@stop