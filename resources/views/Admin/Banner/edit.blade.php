@extends('Admin.Public.layout')

@section('title',$title)

@section('content')
	<div class="ibox-content">
        <div class="mws-panel-header">
       
        <span>{{$title}}</span>
        </div>
            <form action="/Admin/banner/{{$rs->id}}" method="post" class="form-horizontal"  enctype='multipart/form-data'>                         
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">轮播标题</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="title" value='{{$rs->title}}'>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">轮播排序</label>
                                <div class="col-sm-5">
                                    <input type="number" class="form-control" name="ranks"  value='{{$rs->ranks}}' placeholder="数值越大越靠前">
                                </div>
                            </div>
                             <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">轮播alt</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="alt" placeholder="图片错误提示" value='{{$rs->alt}}'>
                                </div>
                            </div>
                             <div class="hr-line-dashed"></div>
                             <div class="form-group" id="uploadForm" enctype="multipart/form-data" style="margin-left: 180px">
                                <div class="h4">轮播图片预览</div>
                                <div class="fileinput fileinput-new" data-provides="fileinput" id="exampleInputUpload">
                                    <div class="fileinput-new thumbnail" style="width: 200px;height: auto;max-height:150px;">
                                        <img id="picImg" style="width: 100%;height: auto;max-height: 140px;" src="{{$rs->picture}}">
                                        <input type="hidden" name="picture" value="{{$rs->picture}}">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                    <div>
                                        <span class="btn btn-primary btn-file">
                                            <span class="fileinput-new">选择文件</span>
                                            <span class="fileinput-exists">换一张</span>
                                            <input type="file" name="picture" id="picID" accept="image/gif,image/jpeg,image/x-png">
                                        </span>
                                        <a href="javascript:;" class="btn btn-warning fileinput-exists" data-dismiss="fileinput">移除</a>
                                    </div>
                                </div>
                            </div>
                          <div class="hr-line-dashed"></div>
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                         <div class="form-group">
                            <div class="col-sm-10 col-md-offset-2">
                                <button class="btn btn-primary" id="sub" type="submit">修改</button>
                                <a href="/Admin/banner" class="btn btn-warning">取消</a>
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