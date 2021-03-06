@extends('Admin.Public.layout')


@section('content')
	<input type="hidden" name="" class="theme" value="{{session('adminusers')->theme}}">
	<div class="col-sm-3">
        <div class="widget style1 navy-bg">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-sticky-note fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span> 文章 </span>
                    <h2 class="font-bold">{{$article}}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="widget style1 navy-bg">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-commenting fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span> 评论 </span>
                    <h2 class="font-bold">{{$comment}}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="widget style1 navy-bg">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-link fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span> 友链 </span>
                    <h2 class="font-bold">{{$blogroll}}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="widget style1 navy-bg">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-edit fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span> 留言 </span>
                    <h2 class="font-bold">{{$message}}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>状态</small></h5>
            </div>
            <div class="ibox-content">
            <div class="widget navy-bg no-padding style1">
                <div class="p-m">
                	<div style="width: 100px;height: 100px;float: left;margin-top: 5px;">
                	<img alt="image" class="img-circle" src="{{session('adminusers_face')}}" style="width: 120px;height: 120px">
                	</div>
            		<ul style="width:200px;float:left;list-style: none;">
                		<li class="m-xs font-bold username" style="width:200px;">{{session('adminusers')->username}} 您好</li>
                		<br>
               			<li class="m-xs font-bold" style="width:200px;">
                   		这是您第{{$logins}}次登录
                		</li>
                		<br>
                		
                		<li class="m-xs font-bold" style="width:200px;">上次登录IP地址为 : {{$prev_ip}}</li>
                	</ul>
                	<div style="float:right ;display: inline-block;width: 500px;height: 120px;">
                			<h1 class="font-bold no-margins"id="time1" style="line-height: 120px;font-size: 40px;"></h1>
                	</div>
                	<div style="clear:both;"></div>
                	
                	<!-- <div style="width: 350px;height: 50px; margin-left:350px;">
	                	
                	</div> -->
                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>系统信息</h5>
            </div>
           <div class="ibox-content">
                <table class="table table-striped">
                        <tr>
                            <td width="150px;">操作系统:</td>
                            <td width="320px">{{PHP_OS}}</td>
                            <td width="150px;">运行环境</td>
                            <td width="320px">{{php_sapi_name()}}</td>
                        </tr>
                        <tr>
                            <td width="150px;">PHP版本:</td>
                            <td width="320px">{{phpversion()}}</td>
                            <td width="150px;">Apache版本:</td>
                            <td width="320px">{{phpversion()}}</td>
                        </tr>
                        <tr>
                            <td width="150px;">本机IP:</td>
                            <td width="320px">{{$_SERVER["REMOTE_ADDR"]}}</td>
                            <td width="150px;">服务器域名:</td>
                            <td width="320px">{{$_SERVER["HTTP_HOST"]}}</td>
                        </tr>
                </table>
            </div>
        </div>
    </div>

@stop

@section('js')

    <script type="text/javascript">
        //改变导航条样式
        var ind = $('.ind').parents('li');
        $('.ind a').css({'color':'#fff'});
        ind.attr('class','active');
    </script>
	
	<script>
		mytime();
		function mytime(){
		    var a = new Date();
		    var b = a.toLocaleTimeString();
		    var c = a.toLocaleDateString();
		    document.getElementById("time1").innerHTML = c+"&nbsp"+b;
		    }
		setInterval(function() {mytime()},1000);
	</script>

@stop
