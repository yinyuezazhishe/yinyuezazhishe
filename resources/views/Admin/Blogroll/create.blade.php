@extends('Admin.Public.layout')


@section('content')
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>添加链接</h5>
    </div>
    <div class="ibox-content">
        <form class="form-horizontal m-t" id="signupForm" action="/admin/blogroll" novalidate="novalidate" id="uploadForm" enctype='multipart/form-data' method="post">
        	<div class="form-group">
                <label class="col-sm-3 control-label">链接类型：</label>
                <div class="col-sm-3">
                    <select class="form-control m-b" name="type">
                        <option value="0">图片链接</option>
                        <option value="1">文字链接</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">链接名称：</label>
                <div class="col-sm-3">
                    <input name="title" class="form-control" type="text" autocomplete="off">
                    <span class="help-block m-b-none mytitle">
                    	<i class="fa fa-info-circle"></i>请输入链接名称
                    </span>
                </div>
            </div>           
           	<div class="form-group">
                <label class="col-sm-3 control-label">链接图片：</label>
                <div class="col-sm-3">
                    <div class="form-group" style="margin-left:0px;" >
		                <div class="fileinput myfile fileinput-new" data-provides="fileinput"  id="exampleInputUpload">
		                    <div class="fileinput-new thumbnail" style="width: 200px;height: auto;max-height:150px;">
		                        <img id='picImg' style="width: 100%;height: auto;max-height: 140px;" src="/admins/img/noimage.png" alt="" />
		                    </div>
		                    <div class="fileinput-preview fileinput-exists thumbnail thumb" style="max-width: 200px; max-height: 150px;"></div>
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
                    <input name="links" class="form-control" type="text" autocomplete="off">
                    <span class="help-block m-b-none mylinks">
                    	<i class="fa fa-info-circle"></i>请输入链接地址(例如:www.baidu.com)
                    </span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3 col-sm-offset-3">
                	{{csrf_field()}}
                    <button class="btn btn-primary" type="submit">添加</button>
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

		
		$('select[name="type"]').change(function(){
			val = $(this).val();
			if(val == 0){
				$('#picID').removeAttr('disabled');
			}else{
				$('#picID').attr('disabled','true');
				$('.myfile').removeClass('fileinput-exists').addClass('fileinput-new');
			}
		})		
		//判断title
		var ajaxtitle = new Array();
		var flag = false;
		function checktitle(tit){				
				if(!tit.val()){
					$('.mytitle').html('<i class="fa fa-close" style="color:red;padding-right:3px;"></i>请输入链接名称');
					$('.mytitle').css({'color':'red'});
					return false;
				}	
				ajaxtitle.push(tit.val());
				setTimeout(function(){
					mytitle = ajaxtitle.pop();
					ajaxtitle = new Array();
					if(mytitle){
						$.get('/admin/mytitle?mytitle='+mytitle,{},function(data){
							if(data == '2'){
								$('.mytitle').html('<i class="fa fa-check-circle" style="color:lightgreen;padding-right:3px;"></i>链接昵称可以使用');
								$('.mytitle').css({'color':'lightgreen'});							
								flag = true;
							}else{
								$('.mytitle').html('<i class="fa fa-close" style="color:red;padding-right:3px;"></i>链接昵称已被占用');
								$('.mytitle').css({'color':'red'});
								flag = false;
							}
						})
					}
				},2000);
		}
		$('input[name="title"]').keyup(function(){	
			checktitle($(this));			
		})
		$('input[name="title"]').focus(function(){
			/*if($(this).val()){
				$('.mytitle').html('<i class="fa fa-close" style="color:red;padding-right:3px;"></i>请输入链接名称');
					$('.mytitle').css({'color':'red'});
					return false;
			}*/
		})

	    //判断links
	    function checklinks(links){
	    	var reg = /^w{3}\.\w+\.(com|cn|com.cn|vip|edu|org)$/i;
			 if(reg.test(links.val())){					
				$('.mylinks').html('<i class="fa fa-check-circle" style="color:lightgreen;padding-right:3px;"></i>链接地址正确');
				$('.mylinks').css({'color':'lightgreen'});
				return true;
			}else{
				$('.mylinks').html('<i class="fa fa-close" style="color:red;padding-right:3px;"></i>链接地址错误(例如:www.baidu.com)');
				$('.mylinks').css({'color':'red'});
				return false;
			}
		}
	    $('input[name="links"]').blur(function(){	    	
			checklinks($(this));
		})

		//当单击提交按钮的时候再次调用判断
	    $('form').submit(function(){
	    	imglen = $('.thumb').find('img').length;
	    	if($('select[name="type"]').val() == 0 && imglen == 0){
	    		layer.alert('你选择的是图片链接,请选择图片哦',{title:'提示',icon:'7'});
	    		return false;
	    	}
	    	checktitle($('input[name="title"]'));
	    	if(flag && checklinks($('input[name="links"]'))){
	    		return true;
	    	}	    	
	    	return false;
	    })
	</script>
@stop