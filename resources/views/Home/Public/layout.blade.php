﻿<!DOCTYPE html>
<!-- HTML 5 -->
<html lang="zh-CN">
    <meta charset="UTF-8" />
        <title> @yield('title') </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="applicable-device" content="pc,mobile">
        <meta name="keywords" content="小众音乐,小清新,民谣,最好听的歌" />
        <meta name="description" content="用音乐和文字温暖生活，微信公众号“麦音乐”。小众音乐、有声电台、独立音乐、民谣、摇滚、爵士、欧美音乐、轻音乐。推荐最好的音乐，不管它是什么类型。"
        />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="/admins/`/logo.ico">
        <link type="text/css" media="all" href="/homes/css/autoptimize_92080519133b963b934f14202138607c.css" rel="stylesheet" />

        <link rel="stylesheet" href="/admins/js/plugins/layer/skin/layer.css" id="layui_layer_skinlayercss" style="">

        <script src="/homes/js/sweetalert.min.js"></script>

        </script>
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
        <link href="/homes/public/templates/default/style/font-awesome.min.css" tppabs="http://www.mfdemo.cn/public/templates/default/style/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- 公用样式代码 结束 -->
        <script type="text/javascript" src="/homes/public/templates/default/js/jQuery v1.7 .js" tppabs="http://www.mfdemo.cn/public/templates/default/js/jQuery v1.7 .js"></script>
        <!-- 公用js库链接代码 结束 -->

        <!-- 动画代码 开始 -->
        <link  href="/homes/public/templates/default/style/animate.css" tppabs="http://www.mfdemo.cn/public/templates/default/style/animate.css" rel="stylesheet" type="text/css" />
        <!-- 动画代码 结束 -->

        <link href="/homes/public/templates/default/style/Validform.css" tppabs="http://www.mfdemo.cn/public/templates/default/style/Validform.css" rel="stylesheet" type="text/css" /><!-- Validform表单验证代码 结束 -->
        <link href="/homes/public/templates/default/style/fankui.css" tppabs="http://www.mfdemo.cn/public/templates/default/style/fankui.css" rel="stylesheet" type="text/css" /><!-- 反馈样式代码 结束 -->
        <link href="/homes/public/templates/default/style/anniutexiao.css" tppabs="http://www.mfdemo.cn/public/templates/default/style/anniutexiao.css" rel="stylesheet" type="text/css" /><!-- 按钮特效代码 结束 -->

        <link  href="/homes/public/templates/default/style/logintan.css" tppabs="http://www.mfdemo.cn/public/templates/default/style/logintan.css" rel="stylesheet" type="text/css" /><!-- 登录代码 结束 --> 

        <link rel="stylesheet" href="/homes/css/menu.css" type="text/css" />
        <script src="/homes/js/jquery-1.4.2.js" type="text/javascript"></script>
        <script src="/homes/js/jquery.backgroundpos.js" type="text/javascript"></script>
        <script src="/homes/js/menu.js" type="text/javascript"></script>

        <!-- advertising 样式  -->
        <link rel="stylesheet" type="text/css" href="/homes/css/advertising.css">
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
            body {
                /*background-color: #eee ; */
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
                // dd($cate);
            ?>
        <div id="wrapper" class="hfeed">
            <!-- 代码 开始 -->
            
            <div class="header">
                <ul class="menus" margin: 0px;>
                    <li class="current first">
                        <a href="/" target="_self">首页</a>
                    </li>
                    @foreach ($cate as $k => $v)
                    <li class="li_3">
                        <a class="noclick" href="/home/lists/{{$v->id}}" target="_self">{{$v -> catename}}</a>
                        <dl style="margin:0px; padding: 0px;" class="li_3_content">
                            <dt></dt>
                            @foreach ($v->sub as $kk=>$vv)

                            <dd style="margin:0px; padding: 0px;"><a href="home/lists/{{$vv->id}}" target="_self"><span>{{$vv -> catename}}</span></a></dd>
                           
                            @endforeach
                        </dl>
                    </li>
                    @endforeach

                    <li class="li_3">
                        <a class="noclick" href="/Home/message" target="_blank">留言板</a>
                        <dl style="margin:0px; padding: 0px;" class="li_3_content">
                            <dt></dt>
                        </dl>
                    </li>
                </ul>
                
                <a href="http://sc.chinaz.com/">
                    <img title="MIUI" class="miui_logo" src="/admins/img/yinyuelogo.png" width="200" alt="网站logo" /></a>
                @if(empty(session('homeuser')))
                <p class="language">
                    <a style="display: inline;cursor:pointer;" class="weidengru1 lgtanchu shenyinclick">登录</a>
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
            @section('content')
            <?php
                $pictures = \App\Model\Home\Banner::BanNer();
             ?>
            
            <!-- banner start -->
            <div id="banner_tabs" style="margin:0px;padding:0px" class="flexslider">
                <ul class="slides">
                    @foreach ($pictures as $k => $v)
                    <li>
                        <a title="{{$v->title}}" target="_blank" href="#">
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
                    @foreach($details as $k => $v)
                    <article id="post-13827" class="content-excerpt post-13827 post type-post status-publish format-standard has-post-thumbnail sticky hentry category-nomusic tag-t">
                        <h2 class="post-title entry-title">
                            <a href="https://www.mtyyw.com/13827/" rel="bookmark">
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
                                <img class="" src="{{$v->details_content->picstream}}"
                                align="absmiddle" />
                                <br />
                                简介:{{$v->details_content->describe}}
                            </p>
                            <a href="/home/details/{{$v->id}}" class="more-link">
                                查看全部
                            </a>
                        </div>
                        <div class="postinfo clearfix">
                            <span class="meta-category">
                                <ul class="post-categories">
                                    <li>
                                        <a href="https://www.mtyyw.com/nomusic/" rel="category tag">
                                            无关音乐
                                        <a href="https://www.mtyyw.com/feizhuliuyinyue/" rel="category tag">
                                            小众音乐
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.mtyyw.com/wenzi/" rel="category tag">
                                            文字
                                        </a>
                                    </li>
                                </ul>
                            </span>
                        </div>
                    </article>
                    @endforeach
                    <div class="post-pagination clearfix">
                        <span aria-current='page' class='page-numbers current'>
                            1
                        </span>
                        <a class='page-numbers' href='https://www.mtyyw.com/page/2/'>
                            2
                        </a>
                        <a class='page-numbers' href='https://www.mtyyw.com/page/3/'>
                            3
                        </a>
                        <span class="page-numbers dots">
                            &hellip;
                        </span>
                        <a class='page-numbers' href='https://www.mtyyw.com/page/530/'>
                            530
                        </a>
                        <a class="next page-numbers" href="https://www.mtyyw.com/page/2/">
                            &raquo;
                        </a>
                    </div>
                </section>
                @show

                <section id="sidebar" class="secondary clearfix" role="complementary">
                    <aside id="search-8" class="widget widget_search clearfix">
                        <h3 class="widgettitle">
                            <span>
                                搜索
                            </span>
                        </h3>
                        <form role="search" method="get" class="search-form" action="https://www.mtyyw.com/">
                            <label>
                                <span class="screen-reader-text">
                                    Search for:
                                </span>
                                <input type="search" class="search-field" placeholder="Search &hellip;"
                                value="" name="s">
                            </label>
                            <button type="submit" class="search-submit">
                                <span class="fa fa-search" style="color: #aaa;">
                                </span>
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
                                        <a href="#dynamicnews_tabbed_content-6-tabbed-2">
                                            最新评论
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
                                    <li class="widget-thumb">
                                        <a href="https://www.mtyyw.com/19564/" title="只要现在欢乐，赵照《舍不得过》唱到你心里">
                                        </a>
                                        <a href="https://www.mtyyw.com/19564/" title="只要现在欢乐，赵照《舍不得过》唱到你心里">
                                            只要现在欢乐，赵照《舍不得过》唱到你心里
                                        </a>
                                        <div class="widget-postmeta">
                                            <span class="widget-date">
                                                2018-09-26
                                            </span>
                                        </div>
                                    </li>
                                    <li class="widget-thumb">
                                        <a href="https://www.mtyyw.com/19561/" title="我沉迷于秋日 &#8211; 纣王老胡">
                                            <img width="75" height="75" src="/homes/images/fengshou-fangao-75x75.jpg"
                                            class="attachment-widget_post_thumb size-widget_post_thumb wp-post-image"
                                            alt="丰收©️文森特·梵高"
                                            sizes="(max-width: 75px) 100vw, 75px" />
                                        </a>
                                        <a href="https://www.mtyyw.com/19561/" title="我沉迷于秋日 &#8211; 纣王老胡">
                                            我沉迷于秋日 &#8211; 纣王老胡
                                        </a>
                                        <div class="widget-postmeta">
                                            <span class="widget-date">
                                                2018-09-25
                                            </span>
                                        </div>
                                    </li>
                                    <li class="widget-thumb">
                                        <a href="https://www.mtyyw.com/19558/" title="秋天的老狼 | 李志">
                                            <img width="75" height="75" src="homes/images/A-token-of-friendship©️Arthur-Collingridge-75x75.jpg"
                                            class="attachment-widget_post_thumb size-widget_post_thumb wp-post-image"
                                            alt="A token of friendship©️Arthur Collingridge" 
                                            sizes="(max-width: 75px) 100vw, 75px" />
                                        </a>
                                        <a href="https://www.mtyyw.com/19558/" title="秋天的老狼 | 李志">
                                            秋天的老狼 | 李志
                                        </a>
                                        <div class="widget-postmeta">
                                            <span class="widget-date">
                                                2018-09-23
                                            </span>
                                        </div>
                                    </li>
                                    <li class="widget-thumb">
                                        <a href="https://www.mtyyw.com/19556/" title="吉他发烧曲《那些花儿》">
                                            <img width="75" height="75" src="/homes/images/Undergrowth-with-Two-Figures-75x75.jpg"
                                            class="attachment-widget_post_thumb size-widget_post_thumb wp-post-image"
                                            alt="Undergrowth with Two Figures©️梵高"
                                            sizes="(max-width: 75px) 100vw, 75px" />
                                        </a>
                                        <a href="https://www.mtyyw.com/19556/" title="吉他发烧曲《那些花儿》">
                                            吉他发烧曲《那些花儿》
                                        </a>
                                        <div class="widget-postmeta">
                                            <span class="widget-date">
                                                2018-09-21
                                            </span>
                                        </div>
                                    </li>
                                    <li class="widget-thumb">
                                        <a href="https://www.mtyyw.com/19553/" title="天色未暗 夜已不远 Not Dark Yet &#8211; Bob Dylan">
                                            <img width="75" height="75" src="/homes/images/The-Passing-of-the-Train-700px-75x75.jpg"
                                            class="attachment-widget_post_thumb size-widget_post_thumb wp-post-image"
                                            alt="The Passing of the Train©️Darío de Regoyos" 
                                            sizes="(max-width: 75px) 100vw, 75px" />
                                        </a>
                                        <a href="https://www.mtyyw.com/19553/" title="天色未暗 夜已不远 Not Dark Yet &#8211; Bob Dylan">
                                            天色未暗 夜已不远 Not Dark Yet &#8211; Bob Dylan
                                        </a>
                                        <div class="widget-postmeta">
                                            <span class="widget-date">
                                                2018-09-20
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div id="dynamicnews_tabbed_content-6-tabbed-2" class="tabdiv">
                                <ul class="widget-tabbed-comments">
                                    <li class="widget-avatar">
                                        <a href="https://www.mtyyw.com/guestbook/comment-page-74/#comment-88587">
                                            <img alt='' src='/homes/images/f39d6848fa2f97b4944f99f1f9ad70f4.jpg' class='avatar avatar-55 photo' height='55' width='55' />
                                        </a>
                                        袁辉 on
                                        <a href="https://www.mtyyw.com/guestbook/comment-page-74/#comment-88587">
                                            留言本
                                        </a>
                                    </li>
                                    <li class="widget-avatar">
                                        <a href="https://www.mtyyw.com/19350/comment-page-1/#comment-88586">
                                            <img alt='' src=''
                                            class='avatar avatar-55 photo' height='55' width='55' />
                                        </a>
                                        可可 on
                                        <a href="https://www.mtyyw.com/19350/comment-page-1/#comment-88586">
                                            2018北京麦田音乐节地点、门票、时间表、阵容(薛之谦、吴青峰、陈粒等)
                                        </a>
                                    </li>
                                    <li class="widget-avatar">
                                        <a href="https://www.mtyyw.com/19350/comment-page-1/#comment-88585">
                                            <img alt='' src=''                                        
                                            class='avatar avatar-55 photo' height='55' width='55' />
                                        </a>
                                        杨超 on
                                        <a href="https://www.mtyyw.com/19350/comment-page-1/#comment-88585">
                                            2018北京麦田音乐节地点、门票、时间表、阵容(薛之谦、吴青峰、陈粒等)
                                        </a>
                                    </li>
                                    <li class="widget-avatar">
                                        <a href="https://www.mtyyw.com/guestbook/comment-page-74/#comment-88584">
                                            <img alt='' src=''
                                            class='avatar avatar-55 photo' height='55' width='55' />
                                        </a>
                                        张张 on
                                        <a href="https://www.mtyyw.com/guestbook/comment-page-74/#comment-88584">
                                            留言本
                                        </a>
                                    </li>
                                    <li class="widget-avatar">
                                        <a href="https://www.mtyyw.com/19350/comment-page-1/#comment-88583">
                                            <img alt='' src=''
                                            class='avatar avatar-55 photo' height='55' width='55' />
                                        </a>
                                        高明月 on
                                        <a href="https://www.mtyyw.com/19350/comment-page-1/#comment-88583">
                                            2018北京麦田音乐节地点、门票、时间表、阵容(薛之谦、吴青峰、陈粒等)
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div id="dynamicnews_tabbed_content-6-tabbed-3" class="tabdiv">
                                <ul>
                                    <li class="widget-thumb">
                                        <a href="https://www.mtyyw.com/8911/" title="十大气势背景音乐，小心脏颤抖了！">
                                            <img width="75" height="75" src="/homes/images/Of_Fire_by_FallingToPieces_500-75x75.jpg"
                                            class="attachment-widget_post_thumb size-widget_post_thumb wp-post-image"
                                            alt="" 
                                            sizes="(max-width: 75px) 100vw, 75px" />
                                        </a>
                                        <a href="https://www.mtyyw.com/8911/" title="十大气势背景音乐，小心脏颤抖了！">
                                            十大气势背景音乐，小心脏颤抖了！
                                        </a>
                                        <div class="widget-postmeta">
                                            <span class="widget-date">
                                                2014-09-19
                                            </span>
                                        </div>
                                    </li>
                                    <li class="widget-thumb">
                                        <a href="https://www.mtyyw.com/6694/" title="麦田的T恤，你会买账吗 (“拖延症”趣味T恤上架)">
                                            <img width="75" height="47" src="/homes/images/yinbi.jpg"
                                            class="attachment-widget_post_thumb size-widget_post_thumb wp-post-image"
                                            sizes="(max-width: 75px) 100vw, 75px" />
                                        </a>
                                        <a href="https://www.mtyyw.com/6694/" title="麦田的T恤，你会买账吗 (“拖延症”趣味T恤上架)">
                                            麦田的T恤，你会买账吗 (“拖延症”趣味T恤上架)
                                        </a>
                                        <div class="widget-postmeta">
                                            <span class="widget-date">
                                                2013-03-21
                                            </span>
                                        </div>
                                    </li>
                                    <li class="widget-thumb">
                                        <a href="https://www.mtyyw.com/353/" title="世界三大禁曲之《黑色星期天》">
                                            <img width="75" height="54" src="/homes/images/Gloomy-Sunday_2.jpg"
                                            class="attachment-widget_post_thumb size-widget_post_thumb wp-post-image"
                                            alt="黑色星期天原版"
                                            sizes="(max-width: 75px) 100vw, 75px" />
                                        </a>
                                        <a href="https://www.mtyyw.com/353/" title="世界三大禁曲之《黑色星期天》">
                                            世界三大禁曲之《黑色星期天》
                                        </a>
                                        <div class="widget-postmeta">
                                            <span class="widget-date">
                                                2008-01-25
                                            </span>
                                        </div>
                                    </li>
                                    <li class="widget-thumb">
                                        <a href="https://www.mtyyw.com/7013/" title="寒门再难出贵子">
                                            <img width="60" height="75" src="/homes/images/12-91616-0.png"
                                            class="attachment-widget_post_thumb size-widget_post_thumb wp-post-image"
                                            alt="寒门再难出贵子"
                                            sizes="(max-width: 60px) 100vw, 60px" />
                                        </a>
                                        <a href="https://www.mtyyw.com/7013/" title="寒门再难出贵子">
                                            寒门再难出贵子
                                        </a>
                                        <div class="widget-postmeta">
                                            <span class="widget-date">
                                                2013-07-11
                                            </span>
                                        </div>
                                    </li>
                                    <li class="widget-thumb">
                                        <a href="https://www.mtyyw.com/615/" title="大话西游片尾曲-一生所爱">
                                            <img width="75" height="75" src="/homes/images/dhxy22-75x75.jpg"
                                            class="attachment-widget_post_thumb size-widget_post_thumb wp-post-image"
                                            sizes="(max-width: 75px) 100vw, 75px" />
                                        </a>
                                        <a href="https://www.mtyyw.com/615/" title="大话西游片尾曲-一生所爱">
                                            大话西游片尾曲-一生所爱
                                        </a>
                                        <div class="widget-postmeta">
                                            <span class="widget-date">
                                                2008-07-01
                                            </span>
                                        </div>
                                    </li>
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
                        <div class="textwidget" id="divs">
                            <a href="{{$v->links}}" rel="nofollow" target="_blank">
                                <img src="{{$v->picture}}"
                                 width="350" height="337" class="alignnone size-full wp-image-11045"
                                />
                            </a>
                            <img width="25px" src="/admins/uploads/gg/gg1.png" onclick="closed();" />
                        </div>
                         @endforeach
                    </aside>
                   
                </section>
            </div>
            <script>
               function closed()
               {
                
                var divs = document.getElementById('divs');
                divs.style.display = 'none';
               }

            </script>
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
                                            站长QQ群:906524423 微信:保密
                                            <br />
                                            <a href="https://www.weibo.com/" tar>
                                                新浪微博
                                            </a>
                                        </p>
                                    </div>
                                </aside>
                            </div>
                            <div class="footer-widget-column">
                                <aside id="text-6" class="widget widget_text">
                                    <h3 class="widgettitle">
                                        <span>
                                            微信群“音悦杂志社”
                                        </span>
                                    </h3>
                                    <div class="textwidget">
                                        <p>
                                            <img src=""
                                            alt="音悦杂志社微信群" width="220" height="220" class="alignnone size-full wp-image-11032"
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
                                            <a href="/Home/Message">
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
                                            <li id="menu-item-13839" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-13839">
                                                <a href="https://www.mtyyw.com/13600/">
                                                    《Faded》当神电音遇上空灵女声
                                                </a>
                                            </li>
                                            <li id="menu-item-11094" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-11094">
                                                <a href="https://www.mtyyw.com/8911/">
                                                    十大气势背景音乐
                                                </a>
                                            </li>
                                            <li id="menu-item-13256" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-13256">
                                                <a href="https://www.mtyyw.com/13248/">
                                                    抖腿神曲，停不下来的节奏
                                                </a>
                                            </li>
                                            <li id="menu-item-11095" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-11095">
                                                <a href="https://www.mtyyw.com/353/">
                                                    魔曲《黑色星期天》
                                                </a>
                                            </li>
                                            <li id="menu-item-11352" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-11352">
                                                <a href="https://www.mtyyw.com/12949/">
                                                    世界上最动听的歌-新世纪音乐
                                                </a>
                                            </li>
                                            <li id="menu-item-13212" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-13212">
                                                <a href="https://www.mtyyw.com/tag/music-stroy/">
                                                    有故事的歌
                                                </a>
                                            </li>
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

<script src="/homes/public/templates/default/js/JCheck.js" tppabs="http://www.mfdemo.cn/public/templates/default/js/JCheck.js"></script>
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
                <svg version="1.1" id="图层_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="23px" height="23px" viewBox="175.364 -61.823 23 23" enable-background="new 175.364 -61.823 23 23" tppabs="http://www.mfdemo.cn/new 175.364 -61.823 23 23" xml:space="preserve"><path fill="#846045" d="M186.88-49.493l-3.995,3.995l-0.407,0.407l-0.813-0.813l0.406-0.407l3.995-3.997l-3.995-3.997l-0.406-0.406 l0.813-0.813l0.407,0.406l3.995,3.996l3.996-3.996l0.407-0.406l0.813,0.813l-0.407,0.406l-3.995,3.997l3.995,3.997l0.407,0.407 l-0.813,0.813l-0.407-0.407L186.88-49.493z M186.864-38.823c6.351,0,11.5-5.149,11.5-11.5s-5.149-11.5-11.5-11.5 s-11.5,5.149-11.5,11.5S180.514-38.823,186.864-38.823z"/></svg>
            </div>

            <div class="mf_denglu1">
                <div class="mf_denglu1-1" style="margin-top: 26px">
                    <a href="#"><img src="/admins/img/yinyuelogo-1.png" tppabs="" width="48"/></a>
                </div>
                <div class="mf_denglu1-2">音悦杂志社</div>

                <div class="mf_denglu1-3">

                    <form id="form1" name="form1" action="/home/dologin"  class="denglufrom" method="post">
                        {{csrf_field()}}

                        <div class="zhuce1-3-1">
                            <label> </label>
                            <input type="text" name="username" class="tel form-put" nullmsg="请输入您的用户名!" errormsg="中文、数字、字母,且不能少三多十!" datatype="u3" placeholder="输入您的用户名">
                            <div class="Validform_checktip"></div>
                        </div>

                        <div class="zhuce1-3-2">
                            <label></label>
                            <input type="password" name="password" class="mima form-put" placeholder="输入您的登录密码"
                                   datatype="z6" nullmsg="请填写登录密码！" errormsg="必须有数字字母,且不能少六多十六！"/>
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

                        <!-- <div class="mf_denglu1-3-4">
                            <p><label class="u-checkbox z-checked">

                                <input id="remember" name="mf_login_remember" type="checkbox" value="1" checked="checked">
                                
                                <input type="hidden" id="is_remember" value="">
                                <i class="icon shenyinclick"></i>

                            </label></p>
                            <span style="margin-top: 7px;">在此计算机上记住密码</span>
                        </div> -->
                    </form>

                </div>

                <div class="mf_denglu1-4 shenyinclick"><a href="Javascript:;">忘记密码</a></div>
            </div>

            <div class="mf_denglu2">
                <div class="mf_denglu2-1">

                    <p><a class=" fa fa-qq" href="javascript:if(confirm(%27https://graph.qq.com/oauth2.0/authorize?client_id=101359580&redirect_uri=http%3A%2F%2Fmfdemo.cn%2Findex.php%3Fg%3Dapi%26m%3Doauth%26a%3Dcallback%26type%3Dqq&response_type=code&scope=get_user_info%2Cadd_share  \n\nThis file was not retrieved by Teleport Pro, because it is addressed using an unsupported protocol (e.g., gopher).  \n\nDo you want to open it from the server?%27))window.location=%27https://graph.qq.com/oauth2.0/authorize?client_id=101359580&redirect_uri=http%3A%2F%2Fmfdemo.cn%2Findex.php%3Fg%3Dapi%26m%3Doauth%26a%3Dcallback%26type%3Dqq&response_type=code&scope=get_user_info%2Cadd_share%27" tppabs="http://www.mfdemo.cn/api/oauth/login/type/qq/callback/"  target="_blank"></a></p>
                    <span><a class="fa fa-wechat" href="javascript:if(confirm(%27https://open.weixin.qq.com/connect/qrconnect?appid=wxd022e70fbd30c73e&redirect_uri=http%3A%2F%2Fmfdemo.cn%2Findex.php%3Fg%3Dapi%26m%3Doauth%26a%3Dcallback%26type%3Dweixin&response_type=code&scope=snsapi_login  \n\nThis file was not retrieved by Teleport Pro, because it is addressed using an unsupported protocol (e.g., gopher).  \n\nDo you want to open it from the server?%27))window.location=%27https://open.weixin.qq.com/connect/qrconnect?appid=wxd022e70fbd30c73e&redirect_uri=http%3A%2F%2Fmfdemo.cn%2Findex.php%3Fg%3Dapi%26m%3Doauth%26a%3Dcallback%26type%3Dweixin&response_type=code&scope=snsapi_login%27" tppabs="http://www.mfdemo.cn/api/oauth/login/type/weixin/callback/"></a></span>

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
                    <a href="#"><img src="/admins/img/yinyuelogo-1.png" tppabs="" width="48"/></a>
                </div>
                <div class="mf_denglu1-2">音悦杂志社</div>

                <div class="zhuce1-3">
                    <form class="zhucezhanghu" method="post" action="/home/doregister">
                        {{csrf_field()}}

                        <div class="zhuce1-3-1">
                            <label> </label>
                            <input id="reg_tel" type="text" name="username" class="tel form-put" nullmsg="请输入您的用户名!" errormsg="中文、数字、字母,且不能少三多十!" datatype="u3" placeholder="输入您的用户名">
                            <div class="Validform_checktip"></div>
                        </div>

                        <div class="zhuce1-3-1">
                            <label> </label>
                            <input type="tex" id="reg_yzm" name="email" class="tel form-put" errormsg="邮箱格式不正确!" placeholder="输入邮箱" datatype="e" nullmsg="请填写邮箱！"/>
                                <div class="Validform_checktip"></div>
                        </div>

                        <div class="zhuce1-3-2">
                            <label></label>
                            <input type="password" id="reg_mima" name="password" class="mima form-put" placeholder="输入您的登录密码"
                                   datatype="z6" nullmsg="请填写登录密码！" errormsg="必须有数字字母,且不能少六多十六！"/>
                            <div class="Validform_checktip"></div>
                        </div>

                        <div class="zhuce1-3-2"><label></label>
                            <input type="password" id="reg_mima2" name="repassword" class="mima2 form-put" placeholder="重复登录密码"
                                   datatype="*" recheck="password" nullmsg="请再输入一次密码！" errormsg="您两次输入的账号密码不一致！"/>
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

                    <p><a class=" fa fa-qq" href="javascript:if(confirm(%27https://graph.qq.com/oauth2.0/authorize?client_id=101359580&redirect_uri=http%3A%2F%2Fmfdemo.cn%2Findex.php%3Fg%3Dapi%26m%3Doauth%26a%3Dcallback%26type%3Dqq&response_type=code&scope=get_user_info%2Cadd_share  \n\nThis file was not retrieved by Teleport Pro, because it is addressed using an unsupported protocol (e.g., gopher).  \n\nDo you want to open it from the server?%27))window.location=%27https://graph.qq.com/oauth2.0/authorize?client_id=101359580&redirect_uri=http%3A%2F%2Fmfdemo.cn%2Findex.php%3Fg%3Dapi%26m%3Doauth%26a%3Dcallback%26type%3Dqq&response_type=code&scope=get_user_info%2Cadd_share%27" tppabs="http://www.mfdemo.cn/api/oauth/login/type/qq/callback/"  target="_blank"></a></p>
                    <span><a class="fa fa-wechat" href="javascript:if(confirm(%27https://open.weixin.qq.com/connect/qrconnect?appid=wxd022e70fbd30c73e&redirect_uri=http%3A%2F%2Fmfdemo.cn%2Findex.php%3Fg%3Dapi%26m%3Doauth%26a%3Dcallback%26type%3Dweixin&response_type=code&scope=snsapi_login  \n\nThis file was not retrieved by Teleport Pro, because it is addressed using an unsupported protocol (e.g., gopher).  \n\nDo you want to open it from the server?%27))window.location=%27https://open.weixin.qq.com/connect/qrconnect?appid=wxd022e70fbd30c73e&redirect_uri=http%3A%2F%2Fmfdemo.cn%2Findex.php%3Fg%3Dapi%26m%3Doauth%26a%3Dcallback%26type%3Dweixin&response_type=code&scope=snsapi_login%27" tppabs="http://www.mfdemo.cn/api/oauth/login/type/weixin/callback/"></a></span> 

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
                    <a href="#"><img src="/admins/img/yinyuelogo-1.png" tppabs="" width="48"/></a>
                </div>
                <div class="mf_denglu1-2">音悦杂志社</div>

                <div class="mf_chongzhi1-3">
                    <form class="chongzhimima" method="post" action="/home/forgetpass">
                        {{csrf_field()}}

                        <div class="zhuce1-3-1">
                            <label> </label>
                            <input type="tex" id="cz_email" name="email" class="tel form-put" errormsg="邮箱格式不正确!" placeholder="输入邮箱" datatype="e" nullmsg="请填写邮箱！"/>
                            <div class="Validform_checktip"></div>
                        </div>

                        <div class="mf_chongzhi1-3-3 yy_chongzhi">
                           <div class="mf_chongzhi1-3-3-1"><label></label>
                                <input type="text" name="code" class="yzm form-put" placeholder="输入验证码" datatype="*" nullmsg="请填写验证码！" errormsg="验证码错误">
                                <div class="Validform_checktip"></div>
                            </div>
                            <i class="button--wayra">获取</i>
                        </div>

                        <div class="mf_chongzhi1-3-2">
                            <label></label>
                            <input type="password" name="password" class="mima form-put" placeholder="输入您的新密码" datatype="z6" nullmsg="请填写新密码！" errormsg="必须有数字字母,且不能少六多十六！"/>
                            <div class="Validform_checktip"></div>
                        </div>

                        <div class="mf_chongzhi1-3-2">
                            <label></label>
                            <input type="password" name="repassword" class="mima2 form-put" placeholder="重复新密码" datatype="*" recheck="password" nullmsg="请再输入一次密码！" errormsg="您两次输入的账号密码不一致！"/>
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

        <div class="chongzhichenggong">
            <div class="chongzhichenggong1"><img src="/homes/public/templates/default/images/gou.png" tppabs="http://www.mfdemo.cn/public/templates/default/images/gou.png" width="30" height="29"/>
            </div>

            <div class="chongzhichenggong2">重置成功</div>

            <div class="chongzhichenggong3"><p>3</p><span>s后返回登录</span></div>

        </div>


        <script type="text/javascript">

             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

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
                                            swal("对不起!", "您输入的的邮箱未在本网站登录过, 请核对后再输入!", "error");
                                        } else if (data == 2) {
                                            swal("对不起!", "您输入的的邮箱未在本网站注册验证成功, 请前往您注册时的邮箱进行验证再修改密码!", "error");
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
                    // "z8": /^(?![^a-zA-Z]+$)(?!\D+$).{8}/,
                    // "m": /^13[0-9]{9}$|14[0-9]{9}|15[0-9]{9}$|18[0-9]{9}|17[0-9]{9}$|18[0-9]{9}|18[0-9]{9}$|18[0-9]{9}$/,
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
                //弹出登录

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
        </script>
        <!-- 表单验证插件代码结束 -->
        @section('js')

        @show

    </body>
</html>