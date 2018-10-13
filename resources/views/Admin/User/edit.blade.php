@extends('Admin.Public.layout')

@section('title',$title)

@section('content')

<div class="col-sm-12">
<div class="ibox float-e-margins">
	@if (count($errors) > 0)
		    <div class="mws-form-message error">
	        	错误信息
	            <ul>
	            	@foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
	            </ul>
	        </div>
		@endif
    <div class="ibox-title">
        <h5>{{$title}}</h5>
    </div>
    <div class="ibox-content">
        <form method="post" class="form-horizontal" enctype='multipart/form-data' action="/admin/user/{{$rs->id}}">
            <div class="form-group">
                <label class="col-sm-2 control-label">用户名</label>
                <div class="col-sm-6 ">
                    <input type="text" class="form-control username" name="username"  placeholder="请输入用户名" value="{{$rs->username}}">
                    <span class="help-block m-b-none title"></span>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-2 control-label">性别</label>
                <div class="col-sm-10">
                    <div class="radio">
                    	<label>
                            <input type="radio" @if($rs->sex=='1') checked @endif value="1"  name="sex">男</label>
                        <label>
                            <input type="radio" @if($rs->sex=='0') checked @endif value="0"  name="sex">女</label>
                        <label>
                            <input type="radio" @if($rs->sex=='2') checked @endif value="2"  name="sex">保密</label>   
                    </div>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-2 control-label">状态</label>
                <div class="col-sm-10">
                    <div class="radio">
                    	<label>
                            <input type="radio" @if($rs->status=='1') checked @endif value="1"  name="status">启用</label>
                        <label>
                            <input type="radio" @if($rs->status=='0') checked @endif value="0"  name="status">禁用</label> 
                    </div>
                </div>
            </div>

            <div class="hr-line-dashed"></div>
            <div class="form-group" id="uploadForm" enctype="multipart/form-data" style="margin-left: 180px">
                <div class="h4">图片预览</div>
                <div class="fileinput fileinput-new" data-provides="fileinput" id="exampleInputUpload">
                    <div class="fileinput-new thumbnail" style="width: 200px;height: auto;max-height:150px;">
                        <img id="picImg" style="width: 100%;height: auto;max-height: 140px;" src="{{$rs->face}}" alt="">
                        <input type="hidden" name="oldface" value="{{$rs->face}}">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                    <div>
                        <span class="btn btn-primary btn-file">
                            <span class="fileinput-new">选择文件</span>
                            <span class="fileinput-exists">换一张</span>
                            <input type="file" name="face" id="picID" accept="image/gif,image/jpeg,image/x-png">
                        </span>
                        <a href="javascript:;" class="btn btn-warning fileinput-exists" data-dismiss="fileinput">移除</a>
                    </div>
                </div>
            </div>
            <div class="hr-line-dashed"></div>

            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <div class="col-sm-10 col-md-offset-2">
                    <button class="btn btn-primary" id="sub" type="submit">修改</button>
                    <a href="/admin/user" class="btn btn-warning">取消</a>
                </div>
            </div>
        </form>
    </div>  
</div>          
</div>

@stop

@section('js')

<script type="text/javascript">

    var flag = true;

    //获取原本的用户名
    var oldname = $('.username').val();

    $('.username').blur(function(){

        //获取输入的值
        var name = $(this).val();
        //判断初始用户名是否更改
        if (oldname != name) {

            //发送ajax
            $.ajax({
                url: '/admin/user/getName',   
                data: {'username':name},    
                dataType: 'json',    
                type: 'GET',      
                success: function(data){
                    // console.log(data);
                    //判断是否被用户名占用并且不为空
                    if (data == '1' && name != '') {

                        $('.username').css('border','1px solid #1ab394');

                        $('.title').html('<i class="fa fa-info-circle"></i>该用户名可以使用').css('color','green');

                        flag = true;
                    //判断是否被用户名占用 被占用则无法提交
                    } else if (data == '0') {

                        $('.username').css('border','1px solid red');

                        $('.title').html('<i class="fa fa-info-circle"></i>该用户名已被使用').css('color','red');

                        flag = false;
                    //用户名为空 则无法提交
                    } else if (name == '') {

                        $('.title').html('<i class="fa fa-info-circle"></i>不能为空').css('color','red');
                        $('.submit').click(function(){

                            flag = false;

                        });
                    }
                },    
                error: function(){},         
                timeout:3000,      
                async: true    
            });
        } else {
            $('.username').css('border','1px solid #e5e6e7');
            $('.title').html('');

            flag = true;
        } 
    });

    $('#sub').click(function(){
        return flag;
    });

</script>

@stop