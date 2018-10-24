@extends('Admin.Public.layout')

@section('title',$title)

@section('content')
	<div class="ibox-content">
        <div class="mws-panel-header">
        <span>{{$title}}</span>
        </div>
            <form action="/admin/advertising" method="post" class="form-horizontal" enctype='multipart/form-data'>   
            {{csrf_field()}}              
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">广告标题</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="title">
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
                 <div class="form-group" id="uploadForm" enctype="multipart/form-data" style="margin-left: 180px">
                    <div class="h4">广告图片预览</div>
                    <div class="fileinput fileinput-new" data-provides="fileinput" id="exampleInputUpload">
                        <div class="fileinput-new thumbnail" style="width: 200px;height: auto;max-height:150px;">
                                <img id="picImg" style="width: 100%;height: auto;max-height: 140px;" src="/admins/img/noimage.png" alt="">
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
            <div class="form-group">
                <div class="col-sm-10 col-md-offset-2">
                    <button class="btn btn-primary" id="sub" type="submit">添加</button>
                    <a href="/admin/advertising" class="btn btn-warning">取消</a>
                </div>
            </div>
         </form>
     </div>
@stop
@section('js')
<script type="text/javascript">
    //改变导航条样式
    var create_advertising = $('.create_advertising').parents('li');        
    $('.create_advertising a').css({'color':'#fff'});
    create_advertising.attr('class','active');
</script>
    
@stop