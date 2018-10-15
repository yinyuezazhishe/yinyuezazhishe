@extends('Admin.Public.layout')

@section('title',$title)

@section('content')
	<input type="hidden" name="" class="theme" value="{{session('admin_user')->theme}}">
	<div class="col-sm-3">
        <div class="widget style1 navy-bg">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-sticky-note fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span> 文章 </span>
                    <h2 class="font-bold">2121</h2>
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
                    <h2 class="font-bold">21212</h2>
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
                    <h2 class="font-bold">12221</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="widget style1 navy-bg">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-eye fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span> 访问量 </span>
                    <h2 class="font-bold">45443</h2>
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
                		<li class="m-xs font-bold username" style="width:200px;">{{session('admin_user')->username}} 您好</li>
                		<br>
               			<li class="m-xs font-bold" style="width:200px;">
                   		这是您第12次登录
                		</li>
                		<br>
                		
                		<li class="m-xs font-bold" style="width:200px;">上次登录IP地址为 : 172.0.0.1</li>
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
                            <td width="320px">Windows</td>
                            <td width="150px;">运行环境</td>
                            <td width="320px">Windows</td>
                        </tr>
                        <tr>
                            <td width="150px;">操作系统:</td>
                            <td width="320px">Windows</td>
                            <td width="150px;">操作系统</td>
                            <td width="320px">Windows</td>
                        </tr>
                        <tr>
                            <td width="150px;">操作系统:</td>
                            <td width="320px">Windows</td>
                            <td width="150px;">操作系统</td>
                            <td width="320px">Windows</td>
                        </tr>
                        <tr>
                            <td width="150px;">操作系统:</td>
                            <td width="320px">Windows</td>
                            <td width="150px;">操作系统</td>
                            <td width="320px">Windows</td>
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
