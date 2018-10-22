@extends('Home.Public.layout')

@section('title',session('homeuser')->username."的设置中心")

@section('head')
	<link href="/homes/css/setting.css" rel="stylesheet"/>
@stop

@section('content')
	<div class="post-11062 page type-page status-publish hentry">
            <h2 class="page-title">
                <span>
                    设置中心
                </span>
            </h2>            
            <div class="entry clearfix">
            	<div class="userinfo">
	                用户名:<input type="text" name="username" class="input" autocomplete="off" value="{{session('homeuser')->username}}" check-name="{{session('homeuser')->username}}">
	                <p class="checkuser"></p>
	                QQ:<input type="text" name="qq" class="input" autocomplete="off" value="{{session('homeuser')->qq}}" check-qq="{{session('homeuser')->qq}}">
	                <p class="checkqq"></p>
	                性别:
                	<select class="input" name="sex" check-sex="{{session('homeuser')->sex}}">
                		<option value="0" @if(session('homeuser')->sex == '0') selected  @endif>女</option>
                		<option value="1" @if(session('homeuser')->sex == '1') selected  @endif>男</option>
                		<option value="2" @if(session('homeuser')->sex == '2') selected  @endif>保密</option>
                	</select>
	                <p class="checksex"></p>
	                年龄:<input type="text" name="age" class="input" autocomplete="off" value="{{session('homeuser')->age}}" check-age="{{session('homeuser')->age}}">
	                <p class="checkage"></p>
	                电话:<input type="text" name="tel" class="input" autocomplete="off" value="{{session('homeuser')->tel}}" check-tel="{{session('homeuser')->tel}}">
	                <p class="checktel"></p>
	                个性签名:<input type="text" name="sdasd" class="input" autocomplete="off" value="{{session('homeuser')->sdasd}}" check-sdasd="{{session('homeuser')->sdasd}}">
	                <p class="checksdasd"></p>
	                <div class="form-edit">
                            <p><button type="button" id="affrit_edit" mydata-id="{{session('homeuser')->id}}" style="background-color: #23c6c8;">确认修改</button></p>
                    </div>
                    <p>
                    	<a href="javascript:history.back()" style="display: inline-block;width: 100%;height: 100%;overflow: hidden;cursor: pointer;text-align: center;border-radius: 22.5px;line-height: 45px;font-size: 16px;color: #fff;position: relative;z-index: 1; background-color: #f8ac59;">返回个人中心</a>
                    </p>
                </div>
            </div>
        </div>
@stop
@section('js');
	<script type="text/javascript">
		$(function(){
			//用户名正则
			var user_reg = /^[\w\u4e00-\u9fa5]{3,10}$/;
			//qq正则
			var qq_reg = /^\d{6,10}$/;
			//年龄正则
			var age_reg = /^\d{1,2}$/;
			//电话正则
			var tel_reg = /^1[3456789]\d{9}$/;
			//标记
			var flag = true;
			checkall();
			function checkall(){
				$('input[name="username"]').blur(function(){
					if(!user_reg.test($(this).val())){
						$('.checkuser').html('<font style="color:red;"><i class="fa fa-close"></i>用户名包含数字、字母、下划线,且不能少于三位,多于十位</font>');
						flag = false;
					}else{
						$('.checkuser').html('<font style="color:lightgreen"><i class="fa fa-check"></i>用户名格式正确</font>');
						flag = true;
					}
				})
				$('input[name="qq"]').blur(function(){
					if(!user_reg.test($(this).val())){
						$('.checkqq').html('<font style="color:red;"><i class="fa fa-close"></i>qq格式错误,请核对后仔细输入</font>');
						flag = false;
					}else{
						$('.checkqq').html('<font style="color:lightgreen"><i class="fa fa-check"></i>qq格式正确</font>');
						flag = true;
					}
				})
				$('input[name="age"]').blur(function(){
					if(!age_reg.test($(this).val())){
						$('.checkage').html('<font style="color:red;"><i class="fa fa-close"></i>不要皮哦,你年龄是这样子的吗?</font>');
						flag = false;
					}else{
						$('.checkage').html('<font style="color:lightgreen"><i class="fa fa-check"></i>年龄输入正确</font>');
						flag = true;
					}
				})
				$('input[name="tel"]').blur(function(){
					if(!tel_reg.test($(this).val())){
						$('.checktel').html('<font style="color:red"><i class="fa fa-close"></i>电话格式不正确</font>');
						flag = false;
					}else{
						$('.checktel').html('<font style="color:lightgreen"><i class="fa fa-check"></i>电话格式正确</font>');
						flag = true;
					}
				})
				$('input[name="sdasd"]').blur(function(){
					if($(this).val().length >= 40){
						$('.checksdasd').html('<font style="color:red"><i class="fa fa-close"></i>个性签名长度不能大于40个字哦</font>');
						flag = false;
					}else{
						$('.checksdasd').html('<font style="color:lightgreen"><i class="fa fa-check"></i>签名格式正确</font>');
						flag = true;
					}
				})
			}
			//提交
			$('#affrit_edit').click(function(){
				var edit = $(this);
				checkall();
				//判断用户是否有更改值
				if($('input[name="username"]').val() == $('input[name="username"]').attr('check-name') &&
					$('input[name="qq"]').val() == $('input[name="qq"]').attr('check-qq') &&
					$('input[name="sex"]').val() == $('input[name="sex"]').attr('check-sex') &&
					$('select[name="sex"] option:selected').val() == $('select[name="sex"]').attr('check-sex') &&
					$('input[name="age"]').val() == $('input[name="age"]').attr('check-age') &&
					$('input[name="tel"]').val() == $('input[name="tel"]').attr('check-tel') &&
					$('input[name="sdasd"]').val() == $('input[name="sdasd"]').attr('check-sdasd')
					){
					swal('温馨提示','你当前未做任何修改','error');
					return false;
				}
				if(flag){
					$.post('/home/user/saveinfo',{
						"_token":"{{csrf_token()}}",
						"username":$('input[name="username"]').val(),
						"check_name":$('input[name="username"]').attr('check-name'),
						"qq":$('input[name="qq"]').val(),
						"sex":$('select[name="sex"]').val(),
						"age":$('input[name="age"]').val(),
						"tel":$('input[name="tel"]').val(),
						"sdasd":$('input[name="sdasd"]').val(),
						"id":edit.attr('mydata-id')
					},function(data){
						if(data.right == 1){
							if($('input[name="username"]').val() != $('input[name="username"]').attr('check-name')){
								$('#indexuser').html(data.username);
								$('input[name="username"]').val(data.username);
								$('input[name="username"]').attr('check-name',data.username);
							}
							if($('input[name="qq"]').val() != $('input[name="qq"]').attr('check-qq')){
								$('input[name="qq"]').val(data.qq);
								$('input[name="qq"]').attr('check-qq',data.qq);
							}
							if($('select[name="sex"] option:selected').val() == $('select[name="sex"]').attr('check-sex')){
								$('select[name="sex"] option:eq('+data.sex+'):selected');
								$('select[name="sex"]').attr('check-sex',data.sex);
							}
							if($('input[name="age"]').val() != $('input[name="age"]').attr('check-age')){
								$('input[name="age"]').val(data.age);
								$('input[name="age"]').attr('check-age',data.age);
							}
							if($('input[name="tel"]').val() == $('input[name="tel"]').attr('check-tel')){
								$('input[name="tel"]').val(data.tel);
								$('input[name="tel"]').attr('check-tel',data.tel);
							}
							if($('input[name="sdasd"]').val() == $('input[name="sdasd"]').attr('check-sdasd')){
								$('input[name="sdasd"]').val(data.sdasd);
								$('input[name="sdasd"]').attr('check-sdasd',data.sdasd);
							}
							swal('温馨提示','信息修改成功','success');
						}else if(data == 2){
							$('input[name="username"]').val($('input[name="username"]').attr('check-name'));
							swal('温馨提示','该用户名已存在','error');
						}else{
							swal('温馨提示','信息修改失败','error');
						}
					})
				}else{
					return false;
				}
			})
		})
	</script>
@stop
