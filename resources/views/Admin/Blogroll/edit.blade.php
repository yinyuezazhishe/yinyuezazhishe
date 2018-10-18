@extends('Admin.Public.layout')


@section('content')
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>修改链接</h5>
    </div>
    <div class="ibox-content">
        <form class="form-horizontal m-t" id="signupForm" action="/admin/blogroll/{{$rs->id}}" novalidate="novalidate" id="uploadForm" enctype='multipart/form-data' method="post">
        	<div class="form-group">
                <label class="col-sm-3 control-label">链接类型：</label>
                <div class="col-sm-3">
                    <select class="form-control m-b" name="type">
                        <option value="0" @if($rs->type == 0) selected @endif>图片链接</option>
                        <option value="1" @if($rs->type == 1) selected @endif>文字链接</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">链接名称：</label>
                <div class="col-sm-3">
                    <input name="title" class="form-control" type="text" value="{{$rs->title}}" autocomplete="off">
                    <span class="help-block m-b-none mytitle">
                    	<i class="fa fa-info-circle"></i>请输入链接名称
                    </span>
                </div>
            </div>
           	<div class="form-group">
                <label class="col-sm-3 control-label">链接图片：</label>
                <div class="col-sm-3">
                    <div class="form-group" style="margin-left:0px;" >
		                <div class="fileinput fileinput-new" data-provides="fileinput"  id="exampleInputUpload">
		                    <div class="fileinput-new thumbnail" style="width: 200px;height: auto;max-height:150px;">
		                    	@if($rs->type == 0)
		                        <img id='picImg' style="width: 100%;height: auto;max-height: 140px;" src="{{$rs->picture}}" alt="" />		                        
		                        @else
		                        <img id='picImg' style="width: 100%;height: auto;max-height: 140px;" src="/admins/img/noimage.png" alt="" />
		                        @endif
		                        <input type="hidden" name="oldpicture" value="{{$rs->picture}}"/>
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
                    <span class="help-block m-b-none">
                    	<i class="fa fa-info-circle"></i>请选择链接图片(该图片可不选)
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">链接地址：</label>
                <div class="col-sm-3">
                    <input name="links" class="form-control" type="text" value="{{$rs->links}}" autocomplete="off">
                    <span class="help-block m-b-none mylinks">
                    	<i class="fa fa-info-circle"></i>请输入链接地址(例如:www.baidu.com)
                    </span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3 col-sm-offset-3">
                	{{csrf_field()}}
                	{{method_field("PUT")}}
                    <button class="btn btn-primary" type="submit">修改</button>
                    <a href="/admin/blogroll" class="btn btn-warning">返回</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('js')
	<script type="text/javascript">
		//改变导航条样式
		var createlink = $('.createlink').parents('li');
		$('.createlink a').css({'color':'#fff'});
		createlink.attr('class','active');

		//判断title
		function checktitle(title){
			if(title.val()){					
				$('.mytitle').html('<i class="fa fa-check-circle" style="color:lightgreen;padding-right:3px;"></i>昵称正确');
				$('.mytitle').css({'color':'lightgreen'});
				return true;
			}else{
				$('.mytitle').html('<i class="fa fa-close" style="color:red;padding-right:3px;"></i>请输入链接名称');
				$('.mytitle').css({'color':'red'});
				return false;
			}
		}
		$('input[name="title"]').keyup(function(){			
			checktitle($(this));
		})

	    //判断links
	    function checklinks(title){
	    	var reg = /^w{3}\.\w+\.(com|cn|com.cn|vip|edu|org)$/i;
			if(reg.test(title.val())){					
				$('.mylinks').html('<i class="fa fa-check-circle" style="color:lightgreen;padding-right:3px;"></i>链接地址正确');
				$('.mylinks').css({'color':'lightgreen'});
				return true;
			}else{
				$('.mylinks').html('<i class="fa fa-close" style="color:red;padding-right:3px;"></i>链接地址错误(例如:www.baidu.com)');
				$('.mylinks').css({'color':'red'});
				return false;
			}
		}
	    $('input[name="links"]').keydown(function(){	    	
			checklinks($(this));
		})

		//当单击提交按钮的时候再次调用判断
	    $('form').submit(function(){
	    	var titlecheck = checktitle($('input[name="title"]'));
	    	var linkscheck = checklinks($('input[name="links"]'));
	    	if(titlecheck && linkscheck){
	    		return true;
	    	}	    	
	    	return false;
	    })
	</script>
@stop