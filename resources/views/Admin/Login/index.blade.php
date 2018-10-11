
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{$title}}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" href="/admins/login/css/bootstrap.min.css">
	<link rel="stylesheet" href="/admins/login/css/animate.css">
	<link rel="stylesheet" href="/admins/login/css/style.css">


	<!-- Modernizr JS -->
	<script src="/admins/login/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	</head>
	<body class="style-2">

		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<ul class="menu">
						<li><a href="index.html"></a></li>
						<li class="active"><a href="index2.html"></a></li>
						<li><a href="index3.html"></a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div  class="col-md-4 col-md-push-8">
					
					<!-- Start Sign In Form -->
					<form style="margin:0px" action="/admin/dologin" class="fh5co-form animate-box" data-animate-effect="fadeInRight" method="post">
						{{ csrf_field() }}
						<h2>登 录</h2>
						<div class="form-group message">
				            @if(session('error'))  
				            <div class="alert alert-danger danger">
				                {{session('error')}}  

				            </div>
				            @endif

							<!-- <div class="alert alert-danger"></div> -->

						</div>
						<div class="form-group">
							<label for="username" class="sr-only">用户名</label>
							<input type="text" class="form-control" name="username" id="username" placeholder="请输入您的用户名" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="password" class="sr-only">密 码</label>
							<input type="password" class="form-control" name="password" id="password" placeholder="请输入您的密码" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="code" class="sr-only">验证码</label>
							<input type="code" id="code" style="width:130px; display: inline;" class="form-control" name="code" id="code" placeholder="请输入您的验证码" autocomplete="off">
							<img src="/code" style="padding-left: 25px; padding-top: 15px;" onclick="this.src='/code?rand='+Math.random();">
						</div>
						<div>
							<!-- <img src="/admins/login/images/bg_2.jpg" width="120px"> -->
							
						</div>
						<div class="form-group">
							<input type="submit" value="登录" class="btn btn-primary">
						</div>
					</form>
					<!-- END Sign In Form -->
				</div>
			</div>
			<div class="row" style="padding-top: 60px; clear: both;">
				<div class="col-md-12 text-center"><p><small>&copy; Copyright 2018 - 2019 Yinyue. All Rights Reserved <a href="http://yinyue.com" target="_blank" title="">音悦杂志社</a> <a href="http://www.cssmoban.com/" title="" target="_blank"></a></small></p></div>
			</div>
		</div>
	
	<!-- jQuery -->
	<script src="/admins/login/js/jquery.min.js"></script>
	
	<!-- Bootstrap -->
	<script src="/admins/login/js/bootstrap.min.js"></script>
	<!-- Placeholder -->
	<script src="/admins/login/js/jquery.placeholder.min.js"></script>
	<!-- Waypoints -->
	<script src="/admins/login/js/jquery.waypoints.min.js"></script>
	<!-- Main JS -->
	<script src="/admins/login/js/main.js"></script>

	<script type="text/javascript">

		onload = function ()
		{
			var form = document.getElementsByTagName('form')[0];

			var message = document.getElementsByClassName('message')[0];

			var username = document.getElementById('username');

			var password = document.getElementById('password');

			var code = document.getElementById('code');

			function createNode()
			{
				var dv = document.createElement('div');

				dv.className = 'alert alert-danger';

				return dv;
			}

			function divs()
			{
				// 获取节点
				var div = createNode();

				message.appendChild(div);

				message.style = 'display:block';	
			}

			user = false;
			pass = false;
			co = false;

			form.onsubmit = function(){

				if (username.value == '') {

					// console.log( username.value);			
					if(user != true) {

						divs();

						last = message.lastElementChild;

						last.innerHTML = '您的用户名不能为空';

						last.setAttribute('id', 'one');
					}

					user = true;

				} else {

					if (user == true) {

						one = document.getElementById('one');

						message.removeChild(one);
					}

					user = false;
				}

				if (password.value == '') {

					// console.log(password.value);
					if(pass != true) {

						divs();

						last = message.lastElementChild;

						last.innerHTML = '您的密码不能为空';

						last.setAttribute('id', 'two');
					}

					pass = true;

				} else {

					// alert(1);

					if (pass == true) {

						two = document.getElementById('two');

						message.removeChild(two);
					}

					pass = false;
				}

				if (code.value == '') {

					// console.log(password.value);

					if(co != true) {

						divs();

						last = message.lastElementChild;

						last.innerHTML = '您的验证码不能为空';

						last.setAttribute('id', 'three');
					}

					co = true;

				} else {

					if (co == true) {

						three = document.getElementById('three');

						message.removeChild(three);
					}

					co = false;		
				}

				if (user != false || pass != false || co != false) {

					return false;

				} else if (user != true && pass != true && co != true) {

					return true;
				}

				return false;
			}

			//底层共用
		    var iBase = {
		        Id: function(name){
		            return document.getElementById(name);
		        },
		        //设置元素透明度,透明度值按IE规则计,即0~100
		        SetOpacity: function(ev, v){
		            ev.filters ? ev.style.filter = 'alpha(opacity=' + v + ')' : ev.style.opacity = v / 100;
		        }
		    }

			//淡出效果(含淡出到指定透明度)
			function fadeOut(elem, speed, opacity){
			    /*
			     * 参数说明
			     * elem==>需要淡入的元素
			     * speed==>淡入速度,正整数(可选)
			     * opacity==>淡入到指定的透明度,0~100(可选)
			     */
			    speed = speed || 20;
			    opacity = opacity || 0;
			    //初始化透明度变化值为0
			    var val = 150;
			    //循环将透明值以5递减,即淡出效果
			    (function(){
			        iBase.SetOpacity(elem, val);
			        val -= 10;
			        console.log(opacity)
			        if (val >= opacity) {
			            setTimeout(arguments.callee, speed);
			        }else if (val < 0) {
			            //元素透明度为0后隐藏元素
			            elem.style.display = 'none';
			        }
			    })();
			}

			var danger = document.getElementsByClassName('danger');

			// var dangers = document.getElementsByClassName('dangers');

			// console.log(dangers);

			setInterval(function ()
			{
				// console.log(danger);

				for (var i = 0; i < danger.length; i++) {

					fadeOut(danger[i], 80);
				}

			}, 5000)
		}

	</script>
	<!-- <script src="/admins/login/js/jquery-1.8.3.min.js"></script> -->
	</body>
</html>

