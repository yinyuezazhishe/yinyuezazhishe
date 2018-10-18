@extends('Admin.Public.layout')

@section('content')
<div class="row">
	<div class="col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>创建活动</h5>
            </div>
            <div class="ibox-content">
            	@if($oneActivity->status == 1)
                <form action="/admin/activity/{{$oneActivity->id}}" method="post" class="form-horizontal m-t" id="signupForm" novalidate="novalidate">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">活动标题：</label>
                        <div class="col-sm-8">
                            <input name="title" class="form-control activity-title" type="text" autocomplete="off" value="{{$oneActivity->title}}">
                            <span class="help-block m-b-none activity-circle"><i class="fa fa-info-circle"></i> 活动标题</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">活动路由链接：</label>
                        <div class="col-sm-8">
                            <input name="route_link" class="form-control activity-route" type="text" aria-required="true" aria-invalid="false" value="{{$oneActivity->route_link}}">
                            <span class="help-block m-b-none route-circle"><i class="fa fa-info-circle"></i> 访问路由url例如(/admin/user)</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">活动开始时间：</label>
                        <div class="col-sm-8">
                            <input  name="begintime" class="form-control activity-begin" type="date" aria-required="true" aria-invalid="true" value="{{$oneActivity->begintime}}">
                            <span class="help-block m-b-none begin-circle"><i class="fa fa-info-circle"></i> 设置活动开始时间(当天凌晨)</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">活动结束时间：</label>
                        <div class="col-sm-8">
                            <input  name="stoptime" class="form-control activity-stop" type="date" value="{{$oneActivity->stoptime}}">
                            <span class="help-block m-b-none stop-circle" ><i class="fa fa-info-circle"></i> 设置活动结束时间(当天凌晨)</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-3">
                        	{{csrf_field()}}
                        	{{method_field('PUT')}}
                            <button class="btn btn-primary">提交</button>
                            <a class="btn btn-warning" href="javascript:history.back()">返回</a>
                        </div>
                    </div>
                </form>
                @elseif($oneActivity->status == 2)
                 <form  class="form-horizontal m-t" id="signupForm" novalidate="novalidate">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">活动标题：</label>
                        <div class="col-sm-8">
                            <input name="title" class="form-control" type="text" autocomplete="off" value="{{$oneActivity->title}}" disabled="disabled">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">活动路由链接：</label>
                        <div class="col-sm-8">
                            <input name="route_link" class="form-control" type="text" aria-required="true" aria-invalid="false" value="{{$oneActivity->route_link}}" disabled="disabled">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">活动开始时间：</label>
                        <div class="col-sm-8">
                            <input  name="begintime" class="form-control" type="date" aria-required="true" aria-invalid="true" value="{{$oneActivity->begintime}}" disabled="disabled">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">活动结束时间：</label>
                        <div class="col-sm-8">
                            <input  name="stoptime" class="form-control" type="date" value="{{$oneActivity->stoptime}}" disabled="disabled">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-3">
                            <a class="btn btn-warning" href="javascript:history.back()">返回</a>
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@stop
@section('js')
	<script type="text/javascript">
		//改变导航条样式
		var createActivity = $('.createActivity').parents('li');		
		$('.createActivity a').css({'color':'#fff'});
		createActivity.attr('class','active');
		checkflag = true;
		function checktitle(title){
			if(title.val().length <= 0){
				$('.activity-circle').css({'color':'red'}).html('<i class="fa fa-info-circle">标题不能为空哦</i>');
				checkflag = false;
				return false;
			}
			reg_title = /^[\u4e00-\u9fa5\w]{1,20}$/i;
			if(reg_title.test(title.val())){
				$('.activity-circle').css({'color':'lightgreen'}).html('<i class="fa fa-check">格式正确</i>');
				checkflag = true;
			}else{
				$('.activity-circle').css({'color':'red'}).html('<i class="fa fa-info-circle">标题长度超过20个,或者存在特殊字符</i>');
				checkflag = false;
			}
		}
		function checkroute(route){
			if(route.val().length <= 0){
				$('.route-circle').css({'color':'red'}).html('<i class="fa fa-info-circle">路由不能为空哦</i>');
				checkflag = false;
			}
			reg_route = /^\/\w+(\/\w+){0,5}$/i;
			if(reg_route.test(route.val())){
				$('.route-circle').css({'color':'lightgreen'}).html('<i class="fa fa-check">格式正确</i>');
				checkflag = true;
			}else{
				$('.route-circle').css({'color':'red'}).html('<i class="fa fa-info-circle">路由过长,或者路由不正确</i>');
				checkflag = false;
			}
		}
		function checktime(begin,stop){
			if(begin.val() == ''){
				$('.begin-circle').css({'color':'red'}).html('<i class="fa fa-info-circle">请选择活动开始时间</i>');
				checkflag = false;
			}else{
				$('.begin-circle').css({'color':'lightgreen'}).html('<i class="fa fa-info-circle">格式正确</i>');
				checkflag = true;
			}
			if(stop.val()==''){
				$('.stop-circle').css({'color':'red'}).html('<i class="fa fa-info-circle">请选择活动结束时间</i>');
				checkflag = false;
			}else{
				$('.stop-circle').css({'color':'lightgreen'}).html('<i class="fa fa-info-circle">格式正确</i>');
				checkflag = true;
			}
			if(begin.val()!='' && stop.val() != ''){
				newbegin = begin.val().replace(/-/g,'');
				newstop = stop.val().replace(/-/g,'');
				if(newstop <= newbegin){
					layer.alert("活动开始时间不能超过活动结束时间",{title:"温馨提示",icon:"7"});
					$('.stop-circle').css({'color':'red'}).html('<i class="fa fa-info-circle">格式错误</i>');
					checkflag = false;
				}
			}
		}
		$('.activity-title').blur(function(){
			checktitle($(this));
		})
		$('.activity-route').blur(function(){
			checkroute($(this));
		})
		$("form").submit(function(){
			begin = $('input[name="begintime"]');
			stop = $('input[name="stoptime"]');
			checkroute($('.activity-route'));
			checktitle($('.activity-title'));
			checktime(begin,stop);
			if(checkflag){
				return true;
			}
			return false;
		})
	</script>
@stop