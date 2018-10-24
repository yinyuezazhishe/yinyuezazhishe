<!DOCTYPE html>
<!-- HTML 5 -->
<html lang="zh-CN">
<head>
        <meta charset="UTF-8" />
        <title> @yield('title') </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="applicable-device" content="pc,mobile">
        <meta name="keywords" content="小众音乐,小清新,民谣,最好听的歌" />
        <meta name="description" content="用音乐和文字温暖生活。小众音乐、有声电台、独立音乐、民谣、摇滚、爵士、欧美音乐、轻音乐。推荐最好的音乐，不管它是什么类型。"
        />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="/admins/img/logo.ico">
        <link type="text/css" media="all" href="/homes/css/autoptimize_92080519133b963b934f14202138607c.css" rel="stylesheet" />
        <link rel="stylesheet" href="/admins/js/plugins/layer/skin/layer.css" id="layui_layer_skinlayercss">
        @section('head')

        @show
        <script src="/homes/js/sweetalert.min.js"></script>
        <script type="text/javascript" src="/homes/js/autoptimize_22c3799c14ce37e2988fb6e1676bb4df.js">
        </script>
        <script src="/homes/js/sweetalert.min.js"></script>
        <!-- <script type="text/javascript" src="/layer/layer.js"></script> -->
        <!-- <script type="text/javascript">
            layer.msg('123');
        </script> -->
        <!--[if lt IE 9]>
            <script src="https://www.mtyyw.com/wp-content/themes/dynamic-news-lite/js/html5shiv.min.js"
            type="text/javascript">
            </script>
        <![endif]-->
        <!-- <script>
            var _hmt = _hmt || []; (function() {
                var hm = document.createElement("script");
                hm.src = "https://hm.baidu.com/hm.js?cf90d3025434cd8f3c4626671aab3a68";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();
        </script> -->
        
        <link href="/homes/public/templates/default/style/css.css"  rel="stylesheet" type="text/css" />
        <link href="/homes/css/player.css" rel="stylesheet" type="text/css" />
        <link href="/homes/public/templates/default/style/div.css" ttype="text/css" />
        <!-- 公用样式代码 结束 -->
        <link href="/homes/public/templates/default/style/font-awesome.min.css"  rel="stylesheet" type="text/css" />
        <!-- 公用样式代码 结束 -->
        <!-- <script type='text/javascript' src='/homes/js/jquery.min.js'></script> -->
        <script type="text/javascript" src="/homes/public/templates/default/js/jQuery v1.7 .js"></script>
        <!-- 公用js库链接代码 结束 -->


        <!-- 动画代码 开始 -->
        <link  href="/homes/public/templates/default/style/animate.css" rel="stylesheet" type="text/css" />
        <!-- 动画代码 结束 -->


        <link href="/homes/public/templates/default/style/Validform.css"  rel="stylesheet" type="text/css" /><!-- Validform表单验证代码 结束 -->
        <link href="/homes/public/templates/default/style/fankui.css"  rel="stylesheet" type="text/css" /><!-- 反馈样式代码 结束 -->
        <link href="/homes/public/templates/default/style/anniutexiao.css" rel="stylesheet" type="text/css" /><!-- 按钮特效代码 结束 -->


        <link  href="/homes/public/templates/default/style/logintan.css"  rel="stylesheet" type="text/css" /><!-- 登录代码 结束 --> 


        <link rel="stylesheet" href="/homes/css/menu.css" type="text/css" />
        <script src="/homes/js/jquery-1.4.2.js" type="text/javascript"></script>
        <script src="/homes/js/jquery.backgroundpos.js" type="text/javascript"></script>
        <script src="/homes/js/menu.js" type="text/javascript"></script>
        <!-- banner 样式  -->
        <link rel="stylesheet" type="text/css" href="/homes/css/banner.css">
        
          <style type="text/css">
            .chazhao1 {
                background-color: #e5e5e5 ; 
            }
            
            #content {
                border: none;
            }

            .button--wayra:hover {
                text-decoration: none;
            }
            
            .shenyinclick a {
                text-decoration: none;
                font-size: 14px;
            }
            .thumbnail{
                    display: block;
                    padding: 4px;
                    margin-bottom: 20px;
                    line-height: 1.42857143;
                    background-color: #fff;
                    border: 1px solid #ddd;
                    border-radius: 4px;
                    -webkit-transition: border .2s ease-in-out;
                    -o-transition: border .2s ease-in-out;
                    transition: border .2s ease-in-out;
            }
            .header {
                width: 100%;
                margin-bottom: 20px;
            }
            .language {
                
            }
            .weidengru1 {
                width: 50%;
                float: none;
            }
            .weidengru2 {
                width: 50%;
                float: none;
            }
            .WB_row_line a {
                display: block;
                margin: 0 0 0 1px;
                padding: 1px 0;
                text-align: center;
            }
            .S_txt2, .W_input, .W_btn_b_disable, .W_btn_b_disable:hover {
                color: #808080;
                text-decoration: none;
            }
            a, .S_link1, a.S_txt1:hover, a.current .S_txt1, a.S_txt2:hover, .SW_fun:hover .S_func1 {
                color: #32a2d5;
            }
        </style>
    </head>    
    <body class="home blog">        
        @if(session('error'))  
        <script type="text/javascript">
            swal("对不起!", "{{session('error')}}", "error");
        </script>
        @endif
        
        @if(session('success'))
        <script type="text/javascript">
            swal("恭喜你!", "{{session('success')}}", "success");
        </script>      
        @endif
            <?php
                $cate = \App\Model\Home\CateGory::getSubCates();
            ?>
        <div id="wrapper" class="hfeed">
            <!-- 代码 开始 -->
            
            <div class="header">
                <ul class="menus" style="margin: 0px;">
                    <li class="current first">
                        <a href="/" target="_self">首页</a>
                    </li>
                    @foreach ($cate as $k => $v)
                    <li class="li_3">
                        <a class="noclick" href="/home/lists/{{$v->id}}" target="_self">{{$v -> catename}}</a>
                        <dl style="margin:0px; padding: 0px;" class="li_3_content">
                            <dt></dt>
                            @foreach ($v->sub as $kk=>$vv)

                            <dd style="margin:0px; padding: 0px;"><a href="/home/lists/{{$vv->id}}" target="_self"><span>{{$vv -> catename}}</span></a></dd>
                           
                            @endforeach
                        </dl>
                    </li>
                    @endforeach

                    <li class="li_3">
                        <a class="noclick" href="/Home/message" target="_self">留言板</a>
                        <dl style="margin:0px; padding: 0px;" class="li_3_content">
                            <dt></dt>
                        </dl>
                    </li>
                </ul>
                
                <a href="/">
                    <img title="MIUI" class="miui_logo" src="/admins/img/yinyuelogo.png" width="200" alt="网站logo" /></a>
                @if(empty(session('homeuser')))
                <p class="language">
                    <a style="display: inline;" href="Javascript:;" class="weidengru1 lgtanchu shenyinclick">登录</a>
                    <span>|</span>
                    <a style="display: inline;" class="weidengru2 mf_zhucetan shenyinclick" href="Javascript:;" rel="nofollow">注册</a>
                </p>
                @else
                <p class="language">
                    <a style="display: inline;" href="/home/user/center" id="indexuser">{{session('homeuser')->username}}</a>
                    <span>|</span>
                    <a style="display: inline;" href="/home/logout" rel="nofollow">退出登录</a>
                </p>
                @endif
            </div>
            <!-- 代码 结束 -->
            @section('contents')
            @section('content')
            <?php
                $pictures = \App\Model\Home\Banner::BanNer();
             ?>
            
            <!-- banner start -->
            <div id="banner_tabs" style="margin:0px;padding:0px" class="flexslider">
                <ul class="slides">
                    @foreach ($pictures as $k => $v)
                    <li>
                        <a title="{{$v->title}}" target="_self" href="#">
                            <img width="1920" height="482" alt="{{$v->alt}}" style="background: url({{$v->picture}}) no-repeat center;" src="{{$v->picture}}">
                        </a>
                    </li>
                    @endforeach
                </ul>
                <ul class="flex-direction-nav">
                    <li><a class="flex-prev" href="javascript:;">Previous</a></li>
                    <li><a class="flex-next" href="javascript:;">Next</a></li>
                </ul>
                <ol id="bannerCtrl" class="flex-control-nav flex-control-paging">
                    @for($i = 1; $i <= count($pictures); $i ++)
                    <li><a>{{$i}}</a></li>
                    @endfor
                </ol>
            </div>
             
            <script src="/homes/js/slider.js"></script>
            <script type="text/javascript">

            $('#bannerCtrl').find('li').first().addClass('active');
           
            $(function() {
                var bannerSlider = new Slider($('#banner_tabs'), {
                    time: 5000,
                    delay: 400,
                    event: 'hover',
                    auto: true,
                    mode: 'fade',
                    controller: $('#bannerCtrl'),
                    activeControllerCls: 'active'
                });
                $('#banner_tabs .flex-prev').click(function() {
                    bannerSlider.prev()
                });
                $('#banner_tabs .flex-next').click(function() {
                    bannerSlider.next()
                });
            })
            </script>
            <!-- banner stop -->
            <div id="wrap" class="container clearfix">
                <section id="content" class="primary" role="main">
                    @php
                        $hottest = DB::table('praise')->select(DB::raw('count(*) as d_c_count, d_c_id'))->groupBy('d_c_id')->orderBy('d_c_count', 'desc')->get();

                        if (!empty($hottest->toArray())) {
                            foreach ($hottest as $k => $v) {
                                $d_c[] = $v->d_c_id;
                            }

                            $details =\App\Model\Admin\Details::with('details_content', 'lists')->whereIn('id', $d_c)->orderBy('id', 'desc')->where('status', '<>', '1')->get();
                        }
                        
                        $details =\App\Model\Admin\Details::with('details_content', 'lists')->orderBy('id', 'desc')->where('status', '<>', '1')->get();

                        $lid = [];
                        foreach ($details as $k => $v) {
                            if ($v -> lists['status'] == 0) {
                                $lid['id'] = $v -> lists['id'];
                            }
                        }

                        if (empty($lid)) {
                            $id = \App\Model\Admin\Details::whereNotIn('id', $d_c)->orderBy('id', 'desc')->where('status', '<>', '1')->first();
                            $lid = [];
                            $lid[] = $id -> id;  
                        }
                        
                        session(['lid' => $lid]);
                        $d_content = \App\Model\Admin\DetailsContent::whereIn('did', $lid)->first();
                    @endphp
                    <article class="content-excerpt post-13827 post type-post status-publish format-standard has-post-thumbnail sticky hentry category-nomusic tag-t">
                        <h2 class="post-title entry-title">
                            <a href="/home/details/{{$d_content->id}}" rel="bookmark">
                                {{$d_content->title}}
                            </a>
                        </h2>
                        <div class="postmeta">
                            {{date('Y-m-d',$d_content->addtime)}}
                        </div>
                        <div class="entry clearfix">
                            <blockquote>
                                <p>
                                    {{$d_content->saying}}
                                </p>
                            </blockquote>
                            <p>
                                <a href="/home/details/{{$d_content->id}}" title="{{$d_content->title}}">
                                    <img style="width: 350px; height: auto;" src="{{$d_content->picstream}}"
                                    align="absmiddle" />
                                    <br/>
                                    <div style="width: 700px;">
                                        <span style="color: black;">简 介:</span> &nbsp;&nbsp; <span style="letter-spacing: 3.5px; line-height: 30px;">{{$v->details_content->describe}}
                                        </span>
                                    </div>
                                </a>
                            </p>
                            <a href="/home/details/{{$d_content->id}}" class="more-link">
                                查看全部
                            </a>
                        </div>
                    </article>
                    @php
                        $details =\App\Model\Admin\Details::with('details_content', 'lists')->get();
                        $lid = [];
                        foreach ($details as $k => $v) {
                            if ($v -> lists['status'] == 0) {
                                $lid[] = $v -> lists['id'];
                            }
                        }
                        $details = \App\Model\Admin\Details::with('details_content', 'lists')->whereIn('id', $lid)->where('status', '<>', '1')->whereNotIn('id', session('lid'))->orderBy('id', 'desc')->paginate(5);
                        
                    @endphp

                    @foreach ($details as $k =>$v)
                    <article class="content-excerpt post-19689 post type-post status-publish format-standard has-post-thumbnail hentry category-video category-popmusic tag-2853 tag-3298 tag-3472">
                        <h2 class="post-title entry-title">
                            <a href="/home/details/{{$v->details_content->id}}" rel="bookmark">
                                {{$v->details_content->title}}
                            </a>
                        </h2>
                        <div class="postmeta">
                            {{date('Y-m-d',$v->details_content->addtime)}}
                        </div>
                        <div class="entry clearfix">
                            <blockquote>
                                <p>
                                    {{$v->details_content->saying}}
                                </p>
                            </blockquote>
                            <p>
                                <a href="/home/details/{{$v->
                                    id}}" title="{{$v->details_content->title}}">
                                    <img style="width: 350px; height: auto;" src="{{$v->details_content->picstream}}"
                                    align="absmiddle" />
                                    <br />
                                    <div style="width: 700px;">
                                    <span style="color: black;">简 介:</span> &nbsp;&nbsp; <span style="letter-spacing: 3.5px; line-height: 30px;">{{$v->details_content->describe}}
                                    </span>
                                    </div>
                                </a>
                            </p>
                            <a href="/home/details/{{$v->details_content->did}}" class="more-link">
                                查看全部
                            </a>
                        </div>
                    </article>
                    @endforeach
                   <style>
                        /*分页样式*/  
                        .pagination{text-align:center;margin-bottom: 20px; line-height:37px;}  
                        .pagination li{margin:0px 10px; width:41.75px; height:40px; border:1px solid #ddd;display: inline-block;; cursor: pointer;}
                        .pagination .active{margin-top: 20px;background-color: #0e90d2;color: #fff;border-radius: 5px} 
                        .pagination .active:hover{background-color: #23abf0;color: #fff;} 
                        .pagination li:hover{background-color:#ddd;}
                        .pagination a{width:41.75px; height:40px;display:block; text-decoration:none;}
                    </style>
                    <div> {{$details->links()}} </div>
                    <div style='clear:both;'></div>
                </section>
                @show

                <section id="sidebar" class="secondary clearfix" role="complementary">
                    <aside id="search-8" class="widget widget_search clearfix">
                        <h3 class="widgettitle">
                            <span>
                                搜索
                            </span>
                        </h3>
                        <form role="search" method="get" class="search-form" action="/home/search">
                            <label>
                                <span class="screen-reader-text">
                                    Search for:
                                </span>
                                <input type="search" class="search-field" placeholder="Search Title &hellip;" value="" name="title">
                            </label>
                            <button type="submit" class="search-submit">
                                <i class="fa fa-search" style="color: #aaa; font-size: 18px;">
                                </i>
                            </button>
                        </form>
                    </aside>
                    <aside id="dynamicnews_tabbed_content-6" class="widget dynamicnews_tabbed_content clearfix">
                        <div class="widget-tabbed">
                            <div class="widget-tabnavi">
                                <ul class="widget-tabnav">
                                    <li>
                                        <a href="#dynamicnews_tabbed_content-6-tabbed-1">
                                            最新主题
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#dynamicnews_tabbed_content-6-tabbed-3">
                                            热门主题
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div id="dynamicnews_tabbed_content-6-tabbed-1" class="tabdiv">
                                <ul>
                                    @php
                                        $details =\App\Model\Admin\Details::with('details_content', 'lists')->where('status', '<>', '1')->get();
                                        $lid = [];
                                        foreach ($details as $k => $v) {
                                            if ($v -> lists['status'] == 0) {
                                                $lid[] = $v -> lists['id'];
                                            }
                                        }
                                        // dd($lid);

                                        $newest = \App\Model\Admin\DetailsContent::orderBy('addtime', 'desc')->whereIn('did',$lid)->limit(5)->get();
                                    @endphp
                                    @foreach ($newest as $k => $v)
                                    <li class="widget-thumb">
                                        <a href="/home/details/{{$v->did}}" title="{{$v->title}}">
                                            <img width="75" height="75" src="{{$v->picstream}}"
                                            class="attachment-widget_post_thumb size-widget_post_thumb wp-post-image"
                                            sizes="(max-width: 75px) 100vw, 75px" />
                                        </a>
                                        <a href="/home/details/{{$v->did}}" title="{{$v->title}}">
                                            {{$v->title}}
                                        </a>
                                        <div class="widget-postmeta">
                                            <span class="widget-date">
                                                {{date('Y-m-d', $v->addtime)}}
                                            </span>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            
                            @php
                                $hottest = DB::table('praise')->select(DB::raw('count(*) as d_c_count, d_c_id'))->groupBy('d_c_id')->orderBy('d_c_count', 'desc')->limit(5)->get();
                                $d_c = [];
                                foreach ($hottest as $k => $v) {
                                    $d_c[] = $v -> d_c_id;
                                }
                                $details =\App\Model\Admin\Details::with('details_content', 'lists')->where('status', '<>', '1')->whereIn('id', $d_c)->get();
                                
                                $lid = [];
                                foreach ($details as $k => $v) {
                                    if ($v -> lists['status'] == 0) {
                                        $lid[] = $v -> lists['id'];
                                    }
                                }

                                if (count($details) < 6) {
                                    $details =\App\Model\Admin\Details::with('details_content', 'lists')->where('status', '<>', '1')->get();

                                    $lid = [];
                                    foreach ($details as $k => $v) {
                                        if ($v -> lists['status'] == 0) {
                                            $lid[] = $v -> lists['id'];
                                        }
                                    }

                                    // dd($lid);

                                    $d_content = \App\Model\Admin\DetailsContent::whereIn('did', $lid)->limit(5)->get();
                                    // dd($d_c);
                                } else {
                                    $d_content = \App\Model\Admin\DetailsContent::whereIn('did', $lid)->limit(5)->get();
                                }
                                
                            @endphp
                            <div id="dynamicnews_tabbed_content-6-tabbed-3" class="tabdiv">
                                <ul>
                                    @foreach ($d_content as $k => $v)
                                    <li class="widget-thumb">
                                        <a href="/home/details/{{$v->did}}" title="{{$v->title}}">
                                            <img width="75" height="75" src="{{$v->picstream}}" class="attachment-widget_post_thumb size-widget_post_thumb wp-post-image" sizes="(max-width: 75px) 100vw, 75px" />
                                        </a>
                                        <a href="/home/details/{{$v->did}}" title="{{$v->title}}">
                                            {{$v->title}}
                                        </a>
                                        <div class="widget-postmeta">
                                            <span class="widget-date">
                                                {{date('Y-m-d', $v->addtime)}}
                                            </span>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </aside>
                     @php 
                      $advertising = \App\Model\Home\Advertising::AdverTising();
           
                     @endphp
                    
                    <aside id="text-8" class="widget widget_text clearfix">
                         <h3 class="widgettitle">
                            <span>
                                广告牌
                            </span>
                        </h3>
                         @foreach ($advertising as $k=>$v)
                        <div class="textwidget" style="position: relative; width: 240px; text-align: center; margin: 0px auto" class="divs">
                            <i  style="color:#555;position: absolute; right: 0px; cursor:pointer;font-size:20px;" class="fa fa-close"></i>
                            <a href="{{$v->links}}"  rel="nofollow" target="_blank" >
                                <img src="{{$v->picture}}" class="alignnone size-full wp-image-11045"
                                />
                            </a>
                            
                        </div>
                         @endforeach
                    </aside>
                   
                </section>
            </div>
            <script type="text/javascript">
                $('.fa-close').click(function ()
                {
                    $(this).parent().fadeOut(1000);
                });
            </script>
            
            @show
            <div id="footer-widgets-bg">
                <div id="footer-widgets-wrap" class="container">
                    <div id="footer-widgets" class="clearfix">
                        <div class="footer-widgets-left">
                            <div class="footer-widget-column">
                                <aside id="text-5" class="widget widget_text">
                                    <h3 class="widgettitle">
                                        <span>
                                            关于本站
                                        </span>
                                    </h3>
                                    <div class="textwidget">
                                        <p>
                                            音悦杂志社建于2018年，是一个简单纯粹的文字音乐、图片分享、综艺时尚网站。
                                            <br />
                                            在浮躁、喧嚣的互联网中，希望你能在这里静下来。
                                            <br />
                                        </p>
                                    </div>
                                </aside>
                            </div>
                            <div class="footer-widget-column">
                                <aside id="text-6" class="widget widget_text" style="text-align:center;">
                                    <h3 class="widgettitle">
                                        <span>
                                            QQ群“音悦杂志社”
                                        </span>
                                    </h3>
                                    <div class="textwidget">
                                        <p>
                                            <img src="/homes/picture/QQFansGroup1.jpg"
                                            alt="音悦杂志社QQ群" title="音悦杂志社QQ群" width="220px" height="220px" class="alignnone size-full wp-image-11032"
                                            />
                                        </p>
                                    </div>
                                </aside>
                            </div>
                        </div>
                        <div class="footer-widgets-left">
                            <div class="footer-widget-column">
                                <aside id="text-7" class="widget widget_text">
                                    <h3 class="widgettitle">
                                        <span>
                                            网友活动
                                        </span>
                                    </h3>
                                    <div class="textwidget">
                                        <p>
                                            “悦生活”是一个漂流本活动，国内外的网友在笔记本上记录自己的生活和心情，然后传递给下一个人 。
                                            <br />
                                            除了碎片化的微博和朋友圈，也许你需要给无处安放的心情和文字找一个地方。
                                            <a href="/Home/message">
                                                点击查看
                                            </a>
                                        </p>
                                    </div>
                                </aside>
                            </div>
                            <div class="footer-widget-column">
                                <aside id="nav_menu-4" class="widget widget_nav_menu">
                                    <h3 class="widgettitle">
                                        <span>
                                            热门主题
                                        </span>
                                    </h3>
                                    <div class="menu-%e7%83%ad%e9%97%a8%e4%b8%bb%e9%a2%98-container">
                                        <ul id="menu-%e7%83%ad%e9%97%a8%e4%b8%bb%e9%a2%98" class="menu">
                                            @php
                                                $hottest = DB::table('praise')->select(DB::raw('count(*) as d_c_count, d_c_id'))->groupBy('d_c_id')->orderBy('d_c_count', 'desc')->limit(5)->get();
                                                $d_c = [];
                                                foreach ($hottest as $k => $v) {
                                                    $d_c[] = $v -> d_c_id;
                                                }
                                                $details =\App\Model\Admin\Details::with('details_content', 'lists')->where('status', '<>', '1')->whereIn('id', $d_c)->get();
                                                
                                                $lid = [];
                                                foreach ($details as $k => $v) {
                                                    if ($v -> lists['status'] == 0) {
                                                        $lid[] = $v -> lists['id'];
                                                    }
                                                }

                                                if (count($details) < 6) {
                                                    $details =\App\Model\Admin\Details::with('details_content', 'lists')->where('status', '<>', '1')->get();

                                                    $lid = [];
                                                    foreach ($details as $k => $v) {
                                                        if ($v -> lists['status'] == 0) {
                                                            $lid[] = $v -> lists['id'];
                                                        }
                                                    }

                                                    // dd($lid);

                                                    $d_content = \App\Model\Admin\DetailsContent::whereIn('did', $lid)->limit(5)->get();
                                                    // dd($d_c);
                                                } else {
                                                    $d_content = \App\Model\Admin\DetailsContent::whereIn('did', $lid)->limit(5)->get();
                                                }
                                                
                                            @endphp
                                            @foreach ($d_content as $k => $v)
                                            <li id="menu-item-13839" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-13839">
                                                <a href="/home/details/{{$v->id}}">
                                                    {{$v->title}}
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="footer-wrap">
                <footer id="footer" class="container clearfix" role="contentinfo">
                    <nav id="footernav" class="clearfix" role="navigation">
                        <ul id="footernav-menu" class="menu">
                            <li id="menu-item-11063" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-11063">
                                <a href="/home/blogroll">
                                    友情链接
                                </a>
                            </li>
                            <li id="menu-item-18946" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-18946">
                                @php
                                    $rs = \App\Model\Admin\AdminActivity::where('status',0)->first();
                                @endphp
                                @if($rs)
                                <a href="{{$rs['route_link']}}">
                                    音悦节
                                </a>
                                @else
                                <a href="/home/noactivity">
                                    音悦节
                                </a>
                                @endif
                            </li>
                        </ul>
                        <h4 id="footernav-icon">
                        </h4>
                    </nav>
                    <div id="footer-text">
                        Made With Love By 音悦杂志社
                    </div>
                </footer>
            </div>
        </div>
        <!-- end #wrapper -->
        <script>
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] ||
                function() { (i[r].q = i[r].q || []).push(arguments)
                },
                i[r].l = 1 * new Date();
                a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '/homes/js/analytics.js', 'ga');

            ga('create', 'UA-64091319-1', 'auto');
            ga('send', 'pageview');
        </script>
        <!-- 7 queries in 0.088 seconds. -->
             
        <!-- 右边展开代码开始 -->
        <script src="/homes/public/templates/default/js/JCheck.js"></script>
        <script>
            $(function () {
                $('.u-checkbox').jCheckbox();

                if ($('#is_remember').val() == '') {
                    $('#remember').attr('checked', 'checked');
                    $('#remember').val('1');
                }

                $('#remember').click(function () {

                    if ($(this).attr('checked')) {
                        $(this).val('1');
                    } else {
                        $(this).val('2');
                    }
                });

            });
        </script>

        <!-- 右边展开代码结束 -->

        <!-- 左边模板展示代码 结束 -->

        <!--登录代码开始 -->
        <div class="mf_dengluzhezhao"></div>

        <div class="mf_denglu">

            <div class="mf_dengluhuo"></div>

            <div class="mf_dengluguan shenyinclick">
                <svg version="1.1" id="图层_1"  x="0px" y="0px" width="23px" height="23px" viewBox="175.364 -61.823 23 23" enable-background="new 175.364 -61.823 23 23" xml:space="preserve"><path fill="#846045" d="M186.88-49.493l-3.995,3.995l-0.407,0.407l-0.813-0.813l0.406-0.407l3.995-3.997l-3.995-3.997l-0.406-0.406 l0.813-0.813l0.407,0.406l3.995,3.996l3.996-3.996l0.407-0.406l0.813,0.813l-0.407,0.406l-3.995,3.997l3.995,3.997l0.407,0.407 l-0.813,0.813l-0.407-0.407L186.88-49.493z M186.864-38.823c6.351,0,11.5-5.149,11.5-11.5s-5.149-11.5-11.5-11.5 s-11.5,5.149-11.5,11.5S180.514-38.823,186.864-38.823z"/></svg>
            </div>

            <div class="mf_denglu1">
                <div class="mf_denglu1-1" style="margin-top: 26px">
                    <a href="/"><img src="/admins/img/yinyuelogo-1.png" tppabs="" width="48"/></a>
                </div>
                <div class="mf_denglu1-2">音悦杂志社</div>

                <div class="mf_denglu1-3">
                    @php
                        session(['uri' => $_SERVER['REQUEST_URI']]);
                    @endphp
                    <form id="form1" name="form1" action="/home/dologin"  class="denglufrom" method="post">
                        {{csrf_field()}}

                        <div class="zhuce1-3-1">
                            <label> </label>
                            <input type="text" name="username" class="tel form-put" nullmsg="请输入您的用户名!" value="{{old('username')}}" errormsg="中文、数字、字母,且不能少三多十!" datatype="u3" placeholder="输入您的用户名">
                            <div class="Validform_checktip"></div>
                        </div>

                        <div class="zhuce1-3-2">
                            <label></label>
                            <input type="password" value="{{old('password')}}" name="password" class="mima form-put" placeholder="输入您的登录密码" datatype="z6" nullmsg="请填写登录密码！" errormsg="必须有数字字母,且不能少六多十六！"/>
                            <div class="Validform_checktip"></div>
                        </div>

                        <div class="mf_chongzhi1-3-3">

                            <div class="mf_chongzhi1-3-3-1"><label></label>
                                <input type="text" id="cz_yzm" name="code" class="yzm form-put" placeholder="输入验证码" datatype="*" nullmsg="请填写验证码！" errormsg="验证码错误">
                                <img src="/code" style="border-radius:8px; position:fixed; left:280px; top:291px;" onclick="this.src='/code?rand='+Math.random();">
                                <div class="Validform_checktip"></div>
                            </div>
                        </div>

                        <div class="from-an">
                            <p><button type="submit" class="button--wayra mf_denglutijiao shenyinclick lgtanchu" id="denglutijiao">登录</button></p>
                        </div>
                    </form>

                </div>

                <div class="mf_denglu1-4 shenyinclick"><a href="Javascript:;">忘记密码</a></div>
            </div>

            <div class="mf_denglu2">
                <div class="mf_denglu2-1">

                    <p><a class=" fa fa-qq" href="#" target="_self"></a></p>
                    <span><a class="fa fa-wechat" href="#" target="_self"></a></span>

                </div>

                <div class="mf_denglu2-2 shenyinclick"><a href="Javascript:;">注册</a></div>

            </div>
        </div>
        <!--登录代码结束 -->


        <!--注册代码开始 -->
        <div class="zhuce">

            <div class="mf_dengluhuo"></div>

            <div class="mf_zhuceguan mf_zhuceguan1 shenyinclick">
                <svg version="1.1" id="图层_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="23px" height="23px" viewBox="175.364 -61.823 23 23" enable-background="new 175.364 -61.823 23 23" tppabs="http://www.mfdemo.cn/new 175.364 -61.823 23 23" xml:space="preserve"><path fill="#846045" d="M186.88-49.493l-3.995,3.995l-0.407,0.407l-0.813-0.813l0.406-0.407l3.995-3.997l-3.995-3.997l-0.406-0.406 l0.813-0.813l0.407,0.406l3.995,3.996l3.996-3.996l0.407-0.406l0.813,0.813l-0.407,0.406l-3.995,3.997l3.995,3.997l0.407,0.407 l-0.813,0.813l-0.407-0.407L186.88-49.493z M186.864-38.823c6.351,0,11.5-5.149,11.5-11.5s-5.149-11.5-11.5-11.5 s-11.5,5.149-11.5,11.5S180.514-38.823,186.864-38.823z"/></svg>
            </div>

            <div class="zhuce1">
                <div class="mf_denglu1-1" style="margin-top: 26px">
                    <a href="/"><img src="/admins/img/yinyuelogo-1.png" tppabs="" width="48"/></a>
                </div>
                <div class="mf_denglu1-2">音悦杂志社</div>

                <div class="zhuce1-3">
                    <form class="zhucezhanghu" method="post" action="/home/doregister">
                        {{csrf_field()}}

                        <div class="zhuce1-3-1">
                            <label> </label>
                            <input id="reg_tel" type="text" value="{{old('username')}}" name="username" class="tel form-put" nullmsg="请输入您的用户名!" errormsg="中文、数字、字母,且不能少三多十!" datatype="u3" placeholder="输入您的用户名">
                            <div class="Validform_checktip"></div>
                        </div>

                        <div class="zhuce1-3-1">
                            <label> </label>
                            <input type="tex" id="reg_yzm" name="email" value="{{old('email')}}" class="tel form-put" errormsg="邮箱格式不正确!" placeholder="输入邮箱" datatype="e" nullmsg="请填写邮箱！"/>
                                <div class="Validform_checktip"></div>
                        </div>

                        <div class="zhuce1-3-2">
                            <label></label>
                            <input type="password" id="reg_mima" name="password" value="{{old('password')}}" class="mima form-put" placeholder="输入您的注册密码" datatype="z6" nullmsg="请填写注册密码！" errormsg="必须有数字字母,且不能少六多十六！"/>
                            <div class="Validform_checktip"></div>
                        </div>

                        <div class="zhuce1-3-2"><label></label>
                            <input type="password" id="reg_mima2" name="repassword" value="{{old('repassword')}}" class="mima2 form-put" placeholder="重复注册密码"
                                   datatype="*" recheck="password" nullmsg="请再输入确认注册密码！" errormsg="您两次输入的注册密码不一致！"/>
                            <div class="Validform_checktip"></div>
                        </div>

                        <div class="from-an">
                            <p><button type="submit" class="button--wayra mf_zhucetijiao shenyinclick ">注册</button></p>
                        </div>
                    </form>
                </div>

            </div>

            <div class="zhuce2">

                <div class="mf_denglu2-1">

                    <p><a class=" fa fa-qq" href="#"  target="_self"></a></p>
                    <span><a class="fa fa-wechat" href="#" target="_self"></a></span> 

                </div>

                <div class="zhuce2-2">
                    <p class="shenyinclick"><a href="Javascript:;">已有账号</a></p><span class="mf_zhuceguan1 shenyinclick"><a
                        href="Javascript:;">我是游客>></a></span>
                </div>
            </div>

        </div>

        <div class="zhucechenggong">
            <div class="zhucechenggong1">
                <img src="/homes/public/templates/default/images/gou.png" width="30" height="29"/>
            </div>

            <div class="zhucechenggong2">注册成功</div>

            <div class="zhucechenggong3"><p>3</p><span>s后返回登录</span></div>
        </div>

        <!--注册代码结束 -->

        <!-- 重置密码代码 开始 -->

        <div class="mf_chongzhi">
            <div class="mf_chongzhihuo"></div>

            <div class="mf_chongzhiguan shenyinclick">
                <svg version="1.1" id="图层_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="23px" height="23px" viewBox="175.364 -61.823 23 23" enable-background="new 175.364 -61.823 23 23" tppabs="http://www.mfdemo.cn/new 175.364 -61.823 23 23" xml:space="preserve"><path fill="#846045" d="M186.88-49.493l-3.995,3.995l-0.407,0.407l-0.813-0.813l0.406-0.407l3.995-3.997l-3.995-3.997l-0.406-0.406 l0.813-0.813l0.407,0.406l3.995,3.996l3.996-3.996l0.407-0.406l0.813,0.813l-0.407,0.406l-3.995,3.997l3.995,3.997l0.407,0.407 l-0.813,0.813l-0.407-0.407L186.88-49.493z M186.864-38.823c6.351,0,11.5-5.149,11.5-11.5s-5.149-11.5-11.5-11.5 s-11.5,5.149-11.5,11.5S180.514-38.823,186.864-38.823z"></path></svg>
            </div>

            <div class="mf_chongzhi1">

                <div class="mf_denglu1-1" style="margin-top: 26px">
                    <a href="/"><img src="/admins/img/yinyuelogo-1.png" tppabs="" width="48"/></a>
                </div>
                <div class="mf_denglu1-2">音悦杂志社</div>

                <div class="mf_chongzhi1-3">
                    <form class="chongzhimima" method="post" action="/home/forgetpass">
                        {{csrf_field()}}

                        <div class="zhuce1-3-1">
                            <label> </label>
                            <input type="tex" id="cz_email" name="email" value="{{old('email')}}" class="tel form-put" errormsg="邮箱格式不正确!" placeholder="输入邮箱" datatype="e" nullmsg="请填写邮箱！"/>
                            <div class="Validform_checktip"></div>
                        </div>

                        <div class="mf_chongzhi1-3-3 yy_chongzhi">
                           <div class="mf_chongzhi1-3-3-1"><label></label>
                                <input type="text" name="code" value="{{old('code')}}" class="yzm form-put" placeholder="输入验证码" datatype="*" nullmsg="请填写验证码！" errormsg="验证码错误">
                                <div class="Validform_checktip"></div>
                            </div>
                            <i class="button--wayra">获取</i>
                        </div>

                        <div class="mf_chongzhi1-3-2">
                            <label></label>
                            <input type="password" name="password" value="{{old('password')}}" class="mima form-put" placeholder="输入您的新密码" datatype="z6" nullmsg="请填写新密码！" errormsg="必须有数字字母,且不能少六多十六！"/>
                            <div class="Validform_checktip"></div>
                        </div>

                        <div class="mf_chongzhi1-3-2">
                            <label></label>
                            <input type="password" name="repassword" class="mima2 form-put" placeholder="重复新密码" value="{{old('repassword')}}" datatype="*" recheck="password" nullmsg="请再输入确认重置密码！" errormsg="您两次输入的重置密码不一致！"/>
                            <div class="Validform_checktip"></div>
                        </div>

                        <div class="from-an">
                            <p><button type="submit" class="button--wayra mf_chongzhitijiao shenyinclick ">重置密码</button></p>
                        </div>
                    </form>
                </div>

            </div>

            <div class="mf_chongzhi2"></div>
        </div>

        <script type="text/javascript" src="/homes/js/jquerysession.js"></script>

        <script type="text/javascript">

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //设置cookie
                function setCookie(name, value, days) { 
                    var d = new Date();
                    d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
                    var expires = "expires=" + d.toUTCString();
                    document.cookie = name + "=" + value + "; " + expires;
                }

                //读取cookies 
                function getCookie(name) 
                { 
                    var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
                 
                    if(arr=document.cookie.match(reg))
                 
                        return unescape(arr[2]); 
                    else 
                        return null; 
                }

            $(function () {

                var reg = /^13[0-9]{9}$|14[0-9]{9}|15[0-9]{9}$|18[0-9]{9}|17[0-9]{9}$/;

                var denglu_ajax = $(".denglufrom").Validform({
                    tiptype: function (msg, o, cssctl) {
                        //msg：提示信息;
                        //o:{obj:*,type:*,curform:*}, obj指向的是当前验证的表单元素（或表单对象），type指示提示的状态，值为1、2、3、4， 1：正在检测/提交数据，2：通过验证，3：验证失败，4：提示ignore状态, curform为当前form对象;
                        //cssctl:内置的提示信息样式控制函数，该函数需传入两个参数：显示提示信息的对象 和 当前提示的状态（既形参o中的type）;
                        if (!o.obj.is("form")) {
                            var objtip = o.obj.siblings(".Validform_checktip");
                            cssctl(objtip, o.type);
                            objtip.text(msg);

                            var infoObj = o.obj.parents("label").next();
                            if (o.type == 2) {
                                infoObj.fadeOut(200);
                            } else {

                                if (infoObj.is(":visible")) {
                                    return;
                                }
                                var left = 0,
                                        top = 0;

                                infoObj.css({
                                    left: left + 0,
                                    top: top - 50
                                }).show().animate({
                                    top: top - 33
                                }, 200);
                            }
                        }
                    },
                });
                $.extend($.Datatype, {
                    // 含有汉字、数字、字母、下划线
                    "u3": /^[a-zA-Z0-9\u4e00-\u9fa5]{3,10}$/,
                    // 不少于六位且必须有数字和字母！
                    "z6": /^(?![0-9]+$)(?![a-zA-Z]+$)[\S]{6,16}$/,
                    // "z8": /^(?![^a-zA-Z]+$)(?!\D+$).{8}/,
                    // "m": /^13[0-9]{9}$|14[0-9]{9}|15[0-9]{9}$|18[0-9]{9}|17[0-9]{9}$/,
                });

                var zhuce_ajax = $(".zhucezhanghu").Validform({
                    tiptype: function (msg, o, cssctl) {
                        if (!o.obj.is("form")) {
                            var objtip = o.obj.siblings(".Validform_checktip");
                            cssctl(objtip, o.type);
                            objtip.text(msg);

                            var infoObj = o.obj.parents("label").next();
                            if (o.type == 2) {
                                infoObj.fadeOut(200);
                            } else {
                                if (infoObj.is(":visible")) {
                                    return;
                                }
                                var left = 0,
                                        top = 0;

                                infoObj.css({
                                    left: left + 0,
                                    top: top - 50
                                }).show().animate({
                                    top: top - 33
                                }, 200);
                            }

                        }
                    },
                });
                $.extend($.Datatype, {
                    // 含有汉字、数字、字母、下划线
                    "u3": /^[a-zA-Z0-9\u4e00-\u9fa5]{3,10}$/,
                    // 不少于六位且必须有数字和字母！
                    "z6": /^(?![0-9]+$)(?![a-zA-Z]+$)[\S]{6,16}$/,
                    // "m": /^13[0-9]{9}$|14[0-9]{9}|15[0-9]{9}$|18[0-9]{9}|17[0-9]{9}$|18[0-9]{9}|18[0-9]{9}$|18[0-9]{9}$/,
                });

                //获取重置密码的短信验证码
                var validCode = true;
                var flag=true;  

                function verify()
                {
                    var m = getCookie('verify');
                    var timestamp = (new Date()).getTime() + 300000 * 1000;
                    
                    var init = setInterval(function ()
                    {
                        if (m < 0) {
                            clearInterval(init);
                            return validCode = true;
                        }  

                        if(flag){
                            swal(m + "秒后可重新获取验证码");
                            flag = false;
                        }
                        // console.log(m);

                        setCookie('verify', m--, timestamp-0.0000116);
                        validCode = false;

                    }, 1000)
                }

                flag = false;
                verify();
                $(".yy_chongzhi i").click(function () {
                    flag = true;
                    if (validCode) {
                        // console.log(validCode);
                        var email = $("#cz_email").val();
                        if (email == "") {
                            swal("请输入邮箱");
                        } else{
                            if (getCookie('verify') == 0){
                                $.ajax({
                                    url: "/home/sendemail",
                                    data: {email: email},
                                    type: "POST",
                                    dataType: "json",
                                    success: function (data) {
                                        if (data == 0) {
                                            flag = false;
                                            swal("恭喜您!", "请前往您的邮件, 输入验证码!", "success");
                                            setCookie('verify', 300, 0.0034722); 
                                            verify();
                                        } else if (data == 1) {
                                            swal("对不起!", "您输入的邮箱未在本网站登录过, 请核对后再输入!", "error");
                                        } else if (data == 2) {
                                            swal("对不起!", "您输入的邮箱未在本网站注册验证成功, 请前往您注册时的邮箱进行验证再修改密码!", "error");
                                        }
                                    },
                                    error: function(){
                                        swal("对不起!", "发送邮件失败!", "error");
                                    },
                                    // timeout:3000,
                                    async: true
                                });
                            }
                        }
                    }
                })

                var chongzhi_ajax = $(".chongzhimima").Validform({
                    tiptype: function (msg, o, cssctl) {
                        if (!o.obj.is("form")) {
                            var objtip = o.obj.siblings(".Validform_checktip");
                            cssctl(objtip, o.type);
                            objtip.text(msg);
                        }
                    },
                });

                $.extend($.Datatype, {
                    // 含有汉字、数字、字母、下划线
                    "u3": /^[a-zA-Z0-9\u4e00-\u9fa5]{3,10}$/,
                    // 不少于六位且必须有数字和字母！
                    "z6": /^(?![0-9]+$)(?![a-zA-Z]+$)[\S]{6,16}$/,
                });

                //显示登录提示
                $(".lgtanchu").live("click", function () {
                    $('.mf_dengluzhezhao').fadeIn(300);
                    $('.mf_denglu').removeClass('bounceOutUp').addClass('animated bounceInDown').fadeIn();
                });
                //弹出登录
                $(".mf_zhucetan").live("click", function () {
                    $('.mf_dengluzhezhao').fadeIn(300);
                    $('.zhuce').removeClass('bounceOutUp').addClass('animated bounceInDown').fadeIn();
                });

                //弹出注册
                $(".mf_denglu2-2 a").live("click", function () {
                    $('.mf_denglu').addClass('bounceOutUp').fadeOut();
                    setTimeout(function () {
                        $('.zhuce').removeClass('bounceOutUp').addClass('animated bounceInDown').fadeIn();
                    }, 400);
                });

                //弹出重置
                $(".mf_denglu1-4 a").live("click", function () {
                    $('.mf_denglu').addClass('bounceOutUp').fadeOut();
                    setTimeout(function () {
                        $('.mf_chongzhi').removeClass('bounceOutUp').addClass('animated bounceInDown').fadeIn();
                    }, 400);
                });

                //弹出登录
                $(".zhuce2-2 p").live("click", function () {
                    $('.zhuce').addClass('bounceOutUp').fadeOut();
                    setTimeout(function () {
                        $('.mf_denglu').removeClass('bounceOutUp').addClass('animated bounceInDown').fadeIn();
                    }, 400);
                });

                //关闭登录
                $('.mf_dengluguan').click(function () {
                    $('.mf_dengluzhezhao').fadeOut(300, function () {
                        $('.mf_denglu').addClass('bounceOutUp').fadeOut();
                    });
                });


                //关闭注册
                $('.mf_zhuceguan1').click(function () {
                    $('.mf_dengluzhezhao').fadeOut(300, function () {
                        $('.zhuce').addClass('bounceOutUp').fadeOut();
                    });
                });

                //关闭重置
                $('.mf_chongzhiguan').click(function () {
                    $('.mf_dengluzhezhao').fadeOut(300, function () {
                        $('.mf_chongzhi').addClass('bounceOutUp').fadeOut();
                    });
                });
            });

        </script>
        <!-- 登录提示代码结束 --><!-- 登录提示代码结束 -->

        @php
            $flag = '0';
            if (!empty(session('unique'))) {
                $flag = session('unique');
            } else {
                $flag = '0';
            }

            echo "<script type='text/javascript'>
                var flag = '0';
                flag = ".$flag."
                if (flag == '1') {
                    $('.zhuce').addClass('bounceOutUp').fadeOut();
                    setTimeout(function () {
                        $('.mf_denglu').removeClass('bounceOutUp').addClass('animated bounceInDown').fadeIn();
                    }, 1500);
                    $.ajax({
                        url: '/home/resession',
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            if (data == 0) {
                                // console.log('删除成功');
                            } else if (data == 1) {
                                // console.log('删除失败');
                            }
                        },
                        error: function(){
                            // console.log('删除失败');
                        },
                        // timeout:3000,
                        async: true
                    });
                    console.log(flag);
                }
            </script>";

            if (!empty(session('login'))) {
                echo "<script type='text/javascript'>
                        $('.zhuce').addClass('bounceOutUp').fadeOut();
                        setTimeout(function () {
                            $('.mf_denglu').removeClass('bounceOutUp').addClass('animated bounceInDown').fadeIn();
                        }, 1500);
                    </script>";

                session(['login' => null]);
            }

            if (!empty(session('register'))) {
                echo "<script type='text/javascript'>
                        $('.mf_denglu').addClass('bounceOutUp').fadeOut();
                    setTimeout(function () {
                        $('.zhuce').removeClass('bounceOutUp').addClass('animated bounceInDown').fadeIn();
                    }, 1500);
                    </script>";

                session(['register' => null]);
            }

            if (!empty(session('forgetpass'))) {
                echo "<script type='text/javascript'>
                    $('.mf_denglu').addClass('bounceOutUp').fadeOut();
                    setTimeout(function () {
                        $('.mf_chongzhi').removeClass('bounceOutUp').addClass('animated bounceInDown').fadeIn();
                    }, 1500);
                    </script>";

                session(['forgetpass' => null]);
            }

            if (!empty(session('emaillogin'))) {
                echo "<script type='text/javascript'>
                        $('.zhuce').addClass('bounceOutUp').fadeOut();
                        setTimeout(function () {
                            $('.mf_denglu').removeClass('bounceOutUp').addClass('animated bounceInDown').fadeIn();
                        }, 1500);
                    </script>";

                session(['emaillogin' => null]);
            }
         @endphp


        <!-- 表单验证插件代码开始 -->
        <script type="text/javascript"  src="/homes/public/templates/default/js/Validform_v5.3.2_min.js" tppabs="http://www.mfdemo.cn/public/templates/default/js/Validform_v5.3.2_min.js"></script>
        <script type="text/javascript">
            $(function(){
                var demo=$(".registerform").Validform({
                    btnSubmit:"#tijiao",
                    tiptype:function(msg,o,cssctl){
                        //msg：提示信息;
                        //o:{obj:*,type:*,curform:*}, obj指向的是当前验证的表单元素（或表单对象），type指示提示的状态，值为1、2、3、4， 1：正在检测/提交数据，2：通过验证，3：验证失败，4：提示ignore状态, curform为当前form对象;
                        //cssctl:内置的提示信息样式控制函数，该函数需传入两个参数：显示提示信息的对象 和 当前提示的状态（既形参o中的type）;

                        if(!o.obj.is("form")){
                            var objtip=o.obj.parents("label").next().find(".Validform_checktip");
                            cssctl(objtip,o.type);
                            objtip.text(msg);
                            var infoObj=o.obj.parents("label").next();
                            if(o.type==2){
                                infoObj.fadeOut(200);
                            }else{
                                if(infoObj.is(":visible")){return;}
                                var left=0,
                                    top=0;
                                infoObj.css({
                                    left:left+0,
                                    top:top-50
                                }).show().animate({
                                    top:top-33
                                },200);
                            }
                        }
                    },
                    beforeSubmit:function(curform){
                        var title=$("#zhuti").val();
                        var email=$("#Email").val();
                        var content=$("#content").val();
                        $.ajax({
                            url: "/templet/index/dofeedback",
                            type:"POST",
                            data:{title:title,email:email,content:content},
                            dataType:'json',
                            success: function(data){
                                if(data.result==0){
        //                            window.location.reload();
                                    $('.fankui').fadeIn(300);
                                    $('.fankuichengong').removeClass('bounceOutUp');
                                    $('.fankuichengong').addClass('animated bounceInDown').fadeIn();
                                    setTimeout(function(){
                                        $('body').css("overflow-y","auto");
                                        $('.fankui').fadeOut(300,function(){
                                            $('.fankuichengong').addClass('bounceOutUp').fadeOut();
                                        });
                                    }, 2000);
                                }else{
                                    alert(data.msg);
                                }
                            }
                        });
                        return false;
                    }

                });

            });
            $('.li_3').find('dl dd:last-child').addClass('lastItem');
        </script>
        <!-- 表单验证插件代码结束 -->
        @section('js')

        @show

    </body>
</html>