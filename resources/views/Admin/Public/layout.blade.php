<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>音悦杂志社</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <!--[if lt IE 8]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <link rel="shortcut icon" href="/admins/img/logo.ico">
    <link href="/admins/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/admins/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/admins/css/animate.min.css" rel="stylesheet">
    <link href="/admins/css/style.min.css?v=4.0.0" rel="stylesheet">
    <link href="/admins/css/bootstrap-fileinput.css" rel="stylesheet">
    <link href="/admins/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/admins/css/animate.min.css" rel="stylesheet">
    <link href="/admins/css/style.min.css?v=4.0.0" rel="stylesheet">
    <link href="/admins/layer/mobile/need/layer.css" rel="stylesheet">
    <link href="/admins/layer/theme/default/layer.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
</head>
<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
        <input type="hidden" name="" class="theme" value="{{session('adminusers')->theme}}">
    <div id="wrapper">
        <!--左侧导航开始-->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <input type="hidden" class="uid" value="{{session('adminusers')->id}}">
            <div class="nav-close"><i class="fa fa-times-circle"></i>
            </div>
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                   <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span><img alt="image" class="img-circle" src="{{session('adminusers_face')}}" style="width: 64px;height: 64px" /></span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                               <span class="block m-t-xs"><strong class="font-bold">{{session("adminusers")->username}}</strong></span>
                                <span class="text-muted text-xs block">
                                    @if(session('power') == '0')
                                        普通群众
                                    @elseif(session('power') == '1')
                                        中级管理员
                                    @elseif(session('power') == '2')
                                        高级管理员
                                    @elseif(session('power') == '3')
                                        超级管理员
                                    @endif
                                    <b class="caret"></b></span>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="" href="/admin/user/setFace">修改头像</a>
                                </li>
                                <li><a class="" href="/admin/setPass">修改密码</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="/admin/Exitlogon">安全退出</a>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">H+
                        </div>
                    </li>
                    <li>
                        <a class="ind" href="/admin">
                            <i class="fa fa-home"></i>
                            <span class="nav-label">首页</span>
                        </a>
                    </li>                 
                    <li>
                        <a href="">
                            <i class="fa fa-group"></i> 
                            <span class="nav-label">用户管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li class="show_user">
                                <a href="/admin/user">浏览用户</a>
                            </li>
                            <li class="create_user">
                                <a href="/admin/user/create">添加用户</a>
                            </li>
                        </ul>
                    </li>                 
                    <li>
                        <a href="#">
                            <i class="fa fa-github-square"></i> 
                            <span class="nav-label">角色管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li class="create_role"><a href="/admin/role/create">添加角色</a>
                            </li>
                            <li class="show_role"><a href="/admin/role">浏览角色</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-user-secret"></i> 
                            <span class="nav-label">权限管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li class="create_permission"><a href="/admin/permission/create">添加权限</a>
                            </li>
                            <li class="show_permission"><a href="/admin/permission">浏览权限</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-user"></i> 
                            <span class="nav-label">会员管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li class="showuser"><a href="/Admin/HomeUsers/index">查看会员</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-vimeo-square"></i> 
                            <span class="nav-label">会员等级管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="404.html">404页面</a>
                            </li>
                            <li><a class="J_menuItem" href="500.html">500页面</a>
                            </li>
                            <li><a class="J_menuItem" href="empty_page.html">空白页</a>
                            </li>
                        </ul>
                    </li>                    
                    <li>
                        <a href="#">
                            <i class="fa fa-server"></i> 
                            <span class="nav-label">类别管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/Admin/category/create"> 
                                    <span class="nav-label">添加类别</span>
                                </a>                                 
                            </li>                           
                        </ul>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/Admin/category"> 
                                    <span class="nav-label">浏览类别</span>
                                </a>
                            </li>                           
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-th-large"></i> 
                            <span class="nav-label">列表管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="404.html">404页面</a>
                            </li>
                            <li><a class="J_menuItem" href="500.html">500页面</a>
                            </li>
                            <li><a class="J_menuItem" href="empty_page.html">空白页</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-th-list"></i> 
                            <span class="nav-label">详情管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li class="create_details"><a href="/admin/details/create">添加详情</a>
                            </li>
                            <li class="show_details"><a href="/admin/details">浏览详情</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-commenting"></i> 
                            <span class="nav-label">评论管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="404.html">404页面</a>
                            </li>
                            <li><a class="J_menuItem" href="500.html">500页面</a>
                            </li>
                            <li><a class="J_menuItem" href="empty_page.html">空白页</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-comments"></i> 
                            <span class="nav-label">回复管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="404.html">404页面</a>
                            </li>
                            <li><a class="J_menuItem" href="500.html">500页面</a>
                            </li>
                            <li><a class="J_menuItem" href="empty_page.html">空白页</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="glyphicon glyphicon-link"></i> 
                            <span class="nav-label">链接管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li class="showlink"><a href="/Admin/Blogroll">查看链接</a>
                            </li>
                            <li class="createlink"><a href="/Admin/Blogroll/create">添加链接</a>
                            </li>                            
                        </ul>
                    </li>
                      <li>
                        <a href="#">
                            <i class="fa fa-edit"></i> 
                            <span class="nav-label">留言板管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/Admin/message">浏览留言</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-photo"></i> 
                            <span class="nav-label">轮播管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/Admin/banner/create">添加轮播</a>
                            </li>
                            <li>
                                <a href="/Admin/banner">浏览轮播</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="#">
                            <i class="fa fa-map-signs"></i> 
                            <span class="nav-label">广告管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a href="/Admin/advertising/create">添加广告</a>
                            </li>
                            <li><a href="/Admin/advertising">浏览广告</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-gift"></i> 
                            <span class="nav-label">规划活动节日</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="404.html">404页面</a>
                            </li>
                            <li><a class="J_menuItem" href="500.html">500页面</a>
                            </li>
                            <li><a class="J_menuItem" href="empty_page.html">空白页</a>
                            </li>
                        </ul>
                </ul>
            </div>
        </nav>
        <!--左侧导航结束-->
        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1" style="overflow-x:hidden;">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header" style="width:90%;">
                        <a class="minimalize-styl-2" href="javascript:void(0)" style="margin:0px;padding:0px;padding-left:5px;">
                            <img src='/admins/img/yinyuelogo.png' style="height:60px;"/>
                        </a>
                        <a class=" minimalize-styl-2 btn btn-primary" href="#" style="float:right">
                            <i class="fa fa-search"></i> 
                        </a>
                        <form role="search" class="navbar-form-custom" method="post" style="float:right" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="请输入您需要查找的内容 …" class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown hidden-xs">
                            <a class="right-sidebar-toggle" aria-expanded="false">
                                <i class="fa fa-tasks"></i> 主题
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            @section('content')


            @show
            <div class="footer">
                <div class="pull-right">&copy; 2018-2019 <a href="javascript:void(0)" target="_blank">音悦杂志社</a>
                </div>
            </div>
        </div>
        <!--右侧部分结束-->
        <!--右侧边栏开始-->
        <div id="right-sidebar">
            <div class="sidebar-container">

                <ul class="nav nav-tabs navs-3">

                    <li class="active">
                        <a data-toggle="tab" href="#tab-1">
                            <i class="fa fa-gear"></i> 主题
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                        <div class="sidebar-title">
                            <h3> <i class="fa fa-comments-o"></i> 主题设置</h3>
                            <small><i class="fa fa-tim"></i> 你可以从这里选择和预览主题的布局和样式，这些设置会被保存在本地，下次打开的时候会直接应用这些设置。</small>
                        </div>
                        <div class="skin-setttings">
                            <div class="title">主题设置</div>                         
                            <div class="setings-item">
                                <span>固定顶部</span>

                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="fixednavbar" class="onoffswitch-checkbox" id="fixednavbar">
                                        <label class="onoffswitch-label" for="fixednavbar">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="setings-item">
                                <span>
                                    固定宽度
                                </span>
                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="boxedlayout" class="onoffswitch-checkbox" id="boxedlayout">
                                        <label class="onoffswitch-label" for="boxedlayout">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="title">皮肤选择</div>
                            <div class="setings-item default-skin nb">
                                <span class="skin-name ">
                         <a href="#" class="s-skin-0 default">
                             默认皮肤
                         </a>
                    </span>
                            </div>
                            <div class="setings-item blue-skin nb">
                                <span class="skin-name ">
                        <a href="#" class="s-skin-1 blue">
                            蓝色主题
                        </a>
                    </span>
                            </div>
                            <div class="setings-item yellow-skin nb">
                                <span class="skin-name ">
                        <a href="#" class="s-skin-3 yellow">
                            黄色/紫色主题
                        </a>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <script src="/admins/js/jquery.min.js?v=2.1.4"></script>
    <script src="/admins/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="/admins/js/bootstrap-fileinput.js"></script>    
    <script src="/admins/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/admins/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/admins/js/plugins/layer/layer.min.js"></script>
    <script src="/admins/js/hplus.min.js?v=4.0.0"></script>
    <script type="text/javascript" src="/admins/js/contabs.min.js"></script>
    <script src="/admins/js/plugins/pace/pace.min.js"></script>
    <script src="/admins/layer/layer.js"></script>
    <script type="text/javascript" src="/admins/js/contabs.min.js"></script>
    <script src="/admins/js/plugins/pace/pace.min.js"></script>
    <script src="/admins/js/jquerysession.js"></script>
    <script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" src="/ueditor/lang/zh-cn/zh-cn.js"></script>

    <script type="text/javascript">
        var theme = '';
        var id = $('.uid').val();

        // console.log(id);
        //接收返回信息
        $(function(){
            @if(session('success'))
                layer.msg("{{session('success')}}");
                {{session()->forget('success')}}
            @endif

            @if(session('error'))
                layer.msg("{{session('error')}}");
                {{session()->forget('error')}}
            @endif  

            var theme1 = $('.theme').val();

            theme =  $.session.get('theme');
            
            if (theme == undefined){

                theme = theme1;

            }

            $('body').eq(0).addClass(theme);

            if (theme == 'skin-1') {

            $('.style1').addClass('lazur-bg');

            } else if (theme == 'skin-3') {

                $('.style1').addClass('yellow-bg');

            } else {

                 $('.style1').addClass('navy-bg');
            }

        })

        $('.blue').click(function(){

            $.session.set('theme','skin-1');

            $('.style1').removeClass('navy-bg');
            $('.style1').removeClass('yellow-bg');

            $('.style1').addClass('lazur-bg');

            setTheme('skin-1');
        });

        $('.yellow').click(function(){

            $.session.set('theme','skin-3');
           
            $('.style1').removeClass('navy-bg');
            $('.style1').removeClass('lazur-bg');

            $('.style1').addClass('yellow-bg');

            setTheme('skin-3');
        });

        $('.default').click(function(){

            $.session.set('theme','default');
            
            $('.style1').removeClass('yellow-bg');
            $('.style1').removeClass('lazur-bg');

            $('.style1').addClass('navy-bg');

            setTheme('default');
        });

        function setTheme(a)
        {
            $.ajax({

                url:'/admin/setTheme',
                data:{
                    'id':id,
                    'theme':a
                },
                dataType:'json',
                type:'GET',
                success:function(data){
                    if (data){
                        
                        location.reload(true);
                    }
                },
                error:function(){
                    
                },
                timeout:3000,
                async:false
            });
        }

    </script>
    @section('js')

    @show
</body>
</html>