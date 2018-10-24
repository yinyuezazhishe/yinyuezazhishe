@extends('Home.Public.layout')

@section('title',session('homeuser')->username."的个人中心")


@section('head')
<meta name="keywords" content="{{session('homeuser')->username}}的个人中心"
/>
<meta name="description" content="{{session('homeuser')->username}}的个人中心"
/>
<style type="text/css">
    img.wp-smiley, img.emoji {
        display: inline !important;
        border: none !important;
        box-shadow: none !important;
        height: 1em !important;
        width: 1em !important;
        margin: 0 .07em !important;
        vertical-align: -0.1em !important;
        background: none !important;
        padding: 0 !important;
    }
    .up-img-cover {width: 100px;height: 100px;}
    .up-img-cover img{width: 100%;}
    .show{
        display: block !important;
    }
    .hide{
        display: none;
    }
    /*蓝色按钮,绝对定位*/
            .blueButton
            {
                position: relative;
                display: block;
                width: 160px;
                height: 40px;
                background-color: #009688;
                color: #fff;
                text-decoration: none;
                text-align: center;
                font:normal normal normal 16px/40px 'Microsoft YaHei';
                cursor: pointer;
                border-radius: 4px;
                float:left;
            }
            .blueButton:hover
            {
                text-decoration: none;
            }
            /*自定义上传,位置大小都和a完全一样,而且完全透明*/
            .myFileUpload,.myImgUpload
            {
                position: absolute;
                bottom:0px;
                display: block;
                width: 160px;
                height: 40px;
                opacity: 0;
            }
            .mybtn{
                display: inline-block;
                height: 38px;
                line-height: 38px;
                padding: 0 18px;
                background-color: #009688;
                color: #fff;
                white-space: nowrap;
                text-align: center;
                font-size: 14px;
                border: none;
                border-radius: 2px;
                cursor: pointer;
            }
</style>
<link rel='stylesheet'  href='/homes/css/style.css' type='text/css' media='all' />
<link rel='stylesheet' href='/homes/css/lmlblog.css' type='text/css' media='all' />
<link rel='stylesheet'  href='/homes/css/all.css' type='text/css' media='all' />
<link rel="stylesheet" href="/homes/css/amazeui.min.css">
<link rel="stylesheet" href="/homes/css/amazeui.cropper.css">
<link rel="stylesheet" href="/homes/css/custom_up_img.css">
<link rel="stylesheet" href="/homes/css/setting.css"/>
@stop 
@section('contents')
<script type="text/javascript" src="/homes/public/templates/default/js/jQuery v1.7 .js"></script>
<div class="lmlblog-member-bg" style="">
    <div class="lmlblog-member-content" style="padding:0px;">
        <div style="background: url('/homes/picture/infobanner/1.jpg') no-repeat top center;background-size:100% 100%;width:100%;height:auto;" class="setting-set">
            <div style="position:relative;padding:20px 0px;">
                <div class="lmlblog-member-header">
                    <div class="lmlblog-member-avatar other up-img-cover"  id="up-img-touch">
                        <img src="{{session('homeface')}}" class="avatar am-circle" data-am-popover="{content: '点击上传头像', trigger: 'hover focus'}" id="oldface"/>
                        <i class="lmlblog-verify lmlblog-verify-a" title="{{session('homeuser')->username}}">
                        </i>
                    </div>
                    <div class="lmlblog-member-username">
                        <h1 id="user-id" user-id="{{session('homeuser')->id}}">
                            {{session('homeuser')->username}}
                        </h1>
                        <span class="lmlblog-mark 
                        @if(session('homeuser')->sex == '0')lmlblog-girl   
                        @elseif(session('homeuser')->sex =='1') lmlblog-boy
                        @else lmlblog-intersex
                        @endif
                        ">
                            @if(session('homeuser')->sex =='0' )
                            <i class="fa fa-venus">
                            </i>
                            @elseif( session('homeuser')->sex =='1')
                            <i class="fa fa-mars">
                            </i> 
                            @else
                                <i class="fa fa-intersex">
                                </i>
                            @endif
                        </span>
                        <span class="lmlblog-mark lmlblog-lv integral ismyintegral">
                            <i class="fa fa-diamond"></i>{{session('integral')}}
                        </span>
                        <h2 style="margin:10px;height:30px;line-height: 30px;">
                            <div id="sdasd" style="vertical-align:middle;display:inline-block;">
                            @if(!empty(session('sdasd'))) {{session('sdasd')}} @else 这家伙很懒,什么都没留下。@endif</div><i class="fa fa-edit select-sdasd" data-id="{{session('homeuser')->id}}" style="vertical-align:middle;padding-left:5px;line-height:30px;"></i>
                        </h2>
                    </div>
                    <!--图片上传框-->
                    <div class="am-modal am-modal-no-btn up-frame-bj " tabindex="-1" id="doc-modal-1" style="overflow-y:hidden;">
                      <div class="am-modal-dialog up-frame-parent up-frame-radius">
                        <div class="am-modal-hd up-frame-header">
                           <label>修改头像</label>
                          <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
                        </div>
                        <div class="am-modal-bd  up-frame-body">
                          <div class="am-g am-fl">
                            <div class="am-form-group am-form-file">
                              <div class="am-fl">
                                <button type="button" class="am-btn am-btn-default am-btn-sm">
                                  <i class="am-icon-cloud-upload"></i> 选择要上传的文件</button>
                              </div>
                              <input type="file" id="inputImage">
                            </div>
                          </div>
                          <div class="am-g am-fl" >
                            <div class="up-pre-before up-frame-radius">
                                <img alt="{{session('homeuser')->username}}的头像" src="{{session('homeface')}}" id="image" >
                            </div>
                            <div class="up-pre-after up-frame-radius">
                            </div>
                          </div>
                          <div class="am-g am-fl">
                            <div class="up-control-btns">
                                <span class="am-icon-rotate-left"  onclick="rotateimgleft()"></span>
                                <span class="am-icon-rotate-right" onclick="rotateimgright()"></span>
                                <span class="am-icon-check" id="up-btn-ok" url="/home/user/uploadface"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="lmlblog-member-follow-info" style="text-align:center;">
                        <a href="javascript:void(0)" id="sentence" rel="{{session('get_sentence_num')}}">
                            <span class="follow no opacity" style="margin-right: 0px;">
                                <i class="lmlblog-icon">
                                </i>
                                每日一语
                            </span>
                        </a>
                    </div>
                </div>
                <a href="/home/user/setting" class="hidden" style="display: none;">
                    <span class="lmlblog-mark fa fa-cog" style="font-size:20px;position:absolute;top:10px;right:10px;" title="设置个人信息"></span>
                </a>
            </div>
        </div>
        <div class="lmlblog-member-menu clear border-line tab-control">
            <li class="on">
                <a href="javascript:void(0)">我的主页</a>
            </li>
            <li>
                <a href="javascript:void(0)">
                    我的留言
                </a>
            </li>
            <li>
                <a href="javascript:void(0)">
                    我的评论
                </a>
            </li>
            <li>
                <a href="javascript:void(0)">
                    我的一语
                </a>
            </li>
            <li>
                <a href="javascript:void(0)">
                    我的背景音乐
                </a>
            </li>
        </div>
        <div class="lmlblog-member-content-list clear">
            <div class="lmlblog-member-left">
                <div class="lmlblog-member-left-follow clear border-line">
                    <li style="width:33%;">
                        <strong>
                            {{$like}}
                        </strong>
                        <span>
                           <i class="fa fa-heart-o"></i>我的喜欢
                        </span>
                    </li>
                    <li style="width:33%;">
                       <strong class="bigintegral">
                            {{session('integral')}}
                       </strong>
                       <span>
                           <i class="fa fa-diamond"></i>我的积分
                       </span>
                   </li>
                   <li style="width:33%;">
                       <strong>
                           {{count($discuss)}}
                       </strong>
                       <span>
                           <i class="fa fa-commenting-o"></i>我的评论
                       </span>
                   </li>
                </div>
                <div class="lmlblog-member-left-bg-music clear border-line">
                    <h3>
                        背景音乐
                    </h3>
                    <div id="lmlblog-memeber-bg-music" class="aplayer">
                    </div>
                    @if(session('homeuserMusic'))
                    <img src="{{session('homeuserMusic')->thumb_music}}" alt="{{session('homeuserMusic')->music_name}}" title="{{session('homeuserMusic')->music_name}}" style="height:auto;width:280px;">
                    <audio src="{{session('homeuserMusic')->music}}" controls autoplay="true">
                     你的浏览器不支持该播放器,请升级浏览器再来哦.
                    </audio>
                    @else
                    <img src="" alt="" title="" style="height:130px;width:auto;">
                    <audio src="" controls autoplay="true">
                     你的浏览器不支持该播放器,请升级浏览器再来哦.
                    </audio>
                    @endif
                </div>
                <div class="lmlblog-member-left-profile border-line">
                    <h3>
                        资料简介
                    </h3>
                    <li>
                        @if(session('homeuser')->sex =='0' )
                        <i class="fa fa-female">
                        </i>
                        性别：
                        <span>
                            女生
                            <span>
                            </span>
                        </span>
                        @elseif(session('homeuser')->sex =='1' )
                        <i class="fa fa-male">
                        </i>
                        性别：
                        <span>
                            男生
                            <span>
                            </span>
                        </span>
                        @else
                        <i class="fa fa-grav">
                        </i>
                        性别：
                        <span>
                            保密
                            <span>
                            </span>
                        </span>     
                        @endif
                    </li>
                    <li style="line-height:140%" class="sdasd" data-sdasd="{{session('sdasd')}}">
                        <i class="fa fa-smile-o">
                        </i>
                        签名：
                        <span>{{session('sdasd')}}
                        </span>
                    </li>
                    <li>
                        <i class="fa fa-qq">
                        </i>
                        Q Q：
                        <span>
                            {{session('homeuser')->qq}}
                            <span>
                            </span>
                        </span>
                    </li>
                    <li>
                        <i class="fa fa-heartbeat">
                        </i>
                        年龄：
                        <span>
                            {{session('homeuser')->age}}
                            <span>
                            </span>
                        </span>
                    </li>
                    <div class="lmlblog-member-left-profile-hide">
                        <li>
                            <i class="fa fa-envelope-o">
                            </i>
                            邮箱：
                            <span>
                                {{session('homeuser')->email}}
                                <span>
                                </span>
                            </span>
                        </li>
                        <li>
                            <i class="fa fa-phone" style="width:14.5px;">
                            </i>
                            电话：
                            <span>
                                {{session('homeuser')->tel}}
                                <span>
                                </span>
                            </span>
                        </li>
                        <li>
                            <i class="fa fa-calendar">
                            </i>
                            注册时间：
                            <span>
                                {{date('Y年m月d日',session('homeuser')->addtime)}}
                                <span>
                                </span>
                            </span>
                        </li>
                    </div>
                    <div class="lmlblog-member-left-profile-more">
                        查看更多
                        <i class="fa fa-angle-right">
                        </i>
                    </div>
                </div>
            </div>
            <div class="lmlblog-member-right show" id="insertLike">
                @if(!empty($infolike))
                @foreach($infolike as $k=>$v)
                <div class="lmlblog-post-list" mydata="1">
                    <div class="lmlblog-posts-list words border-line" style="background-image:url(/homes/images/058.png); "
                    data="4197">
                        <!-- 动态内容部分，包括列表 -->
                        <div class="lmlblog-post-user-info">
                            <div class="lmlblog-post-user-info-avatar" user-data="1">
                                <a href="javascript:void(0)" style="display: inline-block;">
                                    <span class="lmlblog-vip-icon">
                                    </span>
                                    <img src="{{session('homeface')}}" class="avatar face">
                                    <i class="lmlblog-verify lmlblog-verify-a" title="{{session('homeuser')->username}}">
                                    </i>
                                </a>
                                <!-- <div class="lmlblog-user-info-card">
                                    <div class="info_card_loading">
                                        <img src="/homes/picture/chat-loading.gif">
                                        <p>
                                            资料加载中...
                                        </p>
                                    </div>
                                </div> -->
                            </div>
                            <div class="lmlblog-post-user-info-name">
                                <a href="javascript:void(0)">
                                    <font style="color:#333;font-weight:600" class="indexuser">
                                        {{session('homeuser')->username}}
                                    </font>
                                </a>
                            </div>
                            <div class="lmlblog-post-user-info-time addtime" title="{{date('Y-m-d H:i:s',$v['addtime'])}}">
                               {{date('Y-m-d H:i:s',$v['addtime'])}}
                            </div>
                        </div>
                        <div class="lmlblog-post-content ">
                            <a class="post_list_link" href="/home/details/{{$v['did']}}">
                                <p>
                                    {{$v['title']}}
                                </p>
                                <p>
                                    {{$v['saying']}}
                                </p>
                            </a>
                        </div>
                        <div class="lmlblog-post-images-list clear">
                            <a href="{{$v['picstream']}}" data-fancybox="gallery" data-caption="<i class=&quot;fa fa-copyright&quot;></i> 音悦杂志社">
                                <img src="{{$v['picstream']}}" alt="{{$v['title']}}">
                            </a>
                        </div>
                        <div class="lmlblog-post-footer-bar">
                            <span title="{{date('Y-m-d H:i:s',$v['addtime'])}}" style="display: inline;">
                                {{date('Y-m-d H:i:s',$v['addtime'])}}
                            </span>
                            <span>
                                电脑端
                            </span>
                            <i class="lmlblog-icon" onclick="lmlblog_post_type_open();">
                                
                            </i>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="lmlblog-post-list hide" id="pagelike">
                    <div class="lmlblog-posts-list words border-line" style="background-image:url(/homes/images/058.png); "
                    data="4197">
                        <!-- 动态内容部分，包括列表 -->
                        <div class="lmlblog-post-user-info">
                            <div class="lmlblog-post-user-info-avatar" user-data="1">
                                <a href="javascript:void(0)" style="display: inline-block;">
                                    <span class="lmlblog-vip-icon">
                                    </span>
                                    <img src="{{session('homeface')}}" class="avatar face">
                                    <i class="lmlblog-verify lmlblog-verify-a" title="{{session('homeuser')->username}}">
                                    </i>
                                </a>
                                <!-- <div class="lmlblog-user-info-card">
                                    <div class="info_card_loading">
                                        <img src="/homes/picture/chat-loading.gif">
                                        <p>
                                            资料加载中...
                                        </p>
                                    </div>
                                </div> -->
                            </div>
                            <div class="lmlblog-post-user-info-name">
                                <a href="javascript:void(0)">
                                    <font style="color:#333;font-weight:600" class="indexuser">
                                        {{session('homeuser')->username}}
                                    </font>
                                </a>
                            </div>
                            <div class="lmlblog-post-user-info-time addtime" title="{{date('Y-m-d H:i:s',$v['addtime'])}}">
                               {{date('Y-m-d H:i:s',$v['addtime'])}}
                            </div>
                        </div>
                        <div class="lmlblog-post-content ">
                            <a class="post_list_link" href="/home/details/{{$v['id']}}">
                                <p>
                                    {{$v['title']}}
                                </p>
                                <p>
                                    {{$v['saying']}}
                                </p>
                            </a>
                        </div>
                        <div class="lmlblog-post-images-list clear">
                            <a href="{{$v['picstream']}}" data-fancybox="gallery" data-caption="<i class=&quot;fa fa-copyright&quot;></i> 音悦杂志社">
                                <img src="{{$v['picstream']}}" alt="{{$v['title']}}">
                            </a>
                        </div>
                        <div class="lmlblog-post-footer-bar">
                            <span title="{{date('Y-m-d H:i:s',$v['addtime'])}}" style="display: inline;">
                                {{date('Y-m-d H:i:s',$v['addtime'])}}
                            </span>
                            <span>
                                电脑端
                            </span>
                            <i class="lmlblog-icon" onclick="lmlblog_post_type_open();">
                                
                            </i>
                        </div>
                    </div>
                </div>
                @else
                    <div class="border-line" style="width:100%;height:500px;margin-bottom:10px;padding:18px 0px 5px;">
                        <p style="text-align: center;padding-top: 96px;">还没有点赞的文章,赶快去点赞吧!</p>
                        <p style="text-align: center;padding-top: 20px;width:100%;">
                            <a href="/" style="border-radius: 2px;font-size: 15px;padding: 6px 20px;background-color: #fa7d3c;border: 1px solid #fa7d3c;color:#fff;">Let's go like</a>
                        </p>
                    </div>
                @endif
            </div>
            <!--我的留言--> 
            <div class="lmlblog-member-right  hide">
                @if(!empty($message))
                @foreach($message  as $k=>$v)
                <div class=" border-line" style="margin-bottom:10px;padding:18px 0px 5px;">
                    <!-- 动态内容部分，包括列表 -->
                    <div class="lmlblog-post-user-info">
                        <div class="lmlblog-post-user-info-avatar" user-data="1">
                            <a href="#1" style="display: inline-block;">
                                <span class="lmlblog-vip-icon">
                                </span>
                                <img src="{{session('homeface')}}" class="avatar face">
                                <i class="lmlblog-verify lmlblog-verify-a" title="{{session('homeuser')->username}}">
                                </i>
                            </a>
                        </div>
                        <div class="lmlblog-post-user-info-name">
                            <a href="#1">
                                <font style="color:#333;font-weight:600" class="indexuser">
                                    {{session('homeuser')->username}}
                                </font>
                            </a>
                            <span class="lmlblog-mark lmlblog-lv integral">
                                 <i class="fa fa-diamond"></i>{{session('integral')}}
                            </span>
                        </div>
                        <div class="lmlblog-post-user-info-time" title="{{date('Y-m-d H:i:s',$v['addtime'])}}">
                            {{date('Y-m-d H:i:s',$v['addtime'])}}
                        </div>
                    </div>
                    <div class="lmlblog-post-content ">
                        <a class="post_list_link" href="javascript:void(0)">
                            <p>
                                {{$v['content']}}
                            </p>
                        </a>
                    </div>
                </div>
                @endforeach
                @else
                    <div class="border-line" style="width:100%;height:500px;margin-bottom:10px;padding:18px 0px 5px;">
                        <p style="text-align: center;padding-top: 96px;">还没有留言,赶快去发布留言吧!</p>
                        <p style="text-align: center;padding-top: 20px;width:100%;">
                            <a href="/Home/message" style="border-radius: 2px;font-size: 15px;padding: 6px 20px;background-color: #fa7d3c;border: 1px solid #fa7d3c;color:#fff;">发表留言</a>
                        </p>
                    </div>
                @endif
            </div>
            <!--我的评论--> 
            <div class="lmlblog-member-right  hide">
                <ul class="commentlist" style="margin:0px;">
                    @if(!empty($discuss))
                    @foreach($discuss as $k=>$v)
                    <li class="comment even thread-even depth-1 " style="margin:0px;margin-bottom: 10px;">
                        <div class="comment-body">
                            <div class="comment-author vcard clearfix">
                                <span class="fn">
                                    {{session('homeuser')->username}}
                                </span>
                                <div class="comment-meta commentmetadata">
                                    <a href="javascript:void(0)">
                                       {{date('Y-m-d H:i:s',$v['addtime'])}}
                                    </a>
                                </div>
                            </div>
                            <div class="comment-content clearfix">
                                <img alt="{{session('home')}}" src="{{session('homeface')}}" class="avatar avatar-72 photo face" height="72" width="72">
                                <p>
                                    {{$v['content']}}
                                </p>
                            </div>
                        </div>
                    </li>
                    @endforeach
                    @else
                    <div class="border-line" style="width:100%;height:500px;margin-bottom:10px;padding:18px 0px 5px;">
                        <p style="text-align: center;padding-top: 96px;">还没有评论,赶快去发表你的评论吧!</p>
                        <p style="text-align: center;padding-top: 20px;width:100%;">
                            <a href="/Home/message" style="border-radius: 2px;font-size: 15px;padding: 6px 20px;background-color: #fa7d3c;border: 1px solid #fa7d3c;color:#fff;">发表评论</a>
                        </p>
                    </div>                       
                    @endif
                </ul>
            </div>
            <!--我的一语-->  
            <div class="lmlblog-member-right hide" id="mySentence">
                @foreach($sentence as $k=>$v)
                <div class="border-line"  style="margin-bottom:10px;padding:18px 0px 5px;">
                    <!-- 动态内容部分，包括列表 -->
                    <div class="lmlblog-post-user-info">
                        <div class="lmlblog-post-user-info-avatar" user-data="1">
                            <a href="#1" style="display: inline-block;">
                                <span class="lmlblog-vip-icon">
                                </span>
                                <img src="{{session('homeface')}}" class="avatar face">
                                <i class="lmlblog-verify lmlblog-verify-a" title="{{session('homeuser')->username}}">
                                </i>
                            </a>
                        </div>
                        <div class="lmlblog-post-user-info-name">
                            <a href="#1">
                                <font style="color:#333;font-weight:600" class="indexuser">
                                    {{session('homeuser')->username}}
                                </font>
                            </a>
                            <span class="lmlblog-mark lmlblog-lv integral">
                                 <i class="fa fa-diamond"></i>{{session('integral')}}
                            </span>
                        </div>
                        <div class="lmlblog-post-user-info-time" title="{{date('Y-m-d H:i:s',$v->addtime)}}">
                            {{date('Y-m-d H:i:s',$v->addtime)}}
                        </div>
                    </div>
                    <div class="lmlblog-post-content ">
                        <a class="post_list_link" href="javascript:void(0)">
                            <p>
                                @if($v->status == 1)
                                该每日一语已被禁用
                                @else
                                {{$v->heart_sentence}}
                                @endif                               
                            </p>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="border-line hide" id="hide" style="margin-bottom:10px;padding:18px 0px 5px;">
                <!-- 动态内容部分，包括列表 -->
                <div class="lmlblog-post-user-info">
                    <div class="lmlblog-post-user-info-avatar" user-data="1">
                        <a href="#1" style="display: inline-block;">
                            <span class="lmlblog-vip-icon">
                            </span>
                            <img src="{{session('homeface')}}" class="avatar face">
                            <i class="lmlblog-verify lmlblog-verify-a" title="{{session('homeuser')->username}}">
                            </i>
                        </a>
                    </div>
                    <div class="lmlblog-post-user-info-name">
                        <a href="#1">
                            <font style="color:#333;font-weight:600" class="indexuser">
                                {{session('homeuser')->username}}
                            </font>
                        </a>
                        <span class="lmlblog-mark lmlblog-lv integral">
                             <i class="fa fa-diamond"></i>{{session('integral')}}
                        </span>
                    </div>
                    <div class="lmlblog-post-user-info-time sentence-time" title="">
                        <!-- 每日一语获得时间 -->
                    </div>
                </div>
                <div class="lmlblog-post-content ">
                    <a class="post_list_link" href="javascript:void(0)">
                        <p>
                            <!-- 每日一语内容 -->
                        </p>
                    </a>
                </div>
            </div>
            <!--我的背景音乐-->
            <div class="lmlblog-member-right border-line hide">
                <div class="lmlblog-post-list">
                    <div class="lmlblog-posts-list words">
                        <!-- 动态内容部分，包括列表 -->
                        <div class="lmlblog-post-user-info">
                            <form action="/home/user/music" method="post" enctype="multipart/form-data">
                                @if(!empty(session('homeuserMusic')))
                                <div class="zhuce1-3-1" style="margin-bottom:10px;">
                                    <label>
                                        <h6 style="padding:10px;padding-left:0px;">音乐名:</h6>
                                        <input type="text" value="{{session('homeuserMusic')->music_name}}" name="music_name" style="box-sizing: border-box;text-align: left;" autocomplete="off" class="tel form-put" placeholder="音乐名">
                                    </label>
                                </div>                 
                                <div class="zhuce1-3-1" style="margin-bottom:10px;position: relative;">
                                    <label style="margin-bottom: 0px;">
                                        <h6 style="padding:10px;padding-left:0px;">上传音频:</h6>
                                        <a href='javascript:void(0);' class="blueButton" style='color:#fff;'>修改音频</a>
                                        <input type="file" class="myFileUpload" name="music" style="padding-left: 15px; padding-right: 15px"/>
                                        <div class="show-Music" style="display: block;width:500px;height:40px;float:left;line-height:40px;">{{session('homeuserMusic')->music_name}}{{strrchr(session('homeuserMusic')->music,'.')}}</div>
                                        <div style="clear:both;"></div>
                                        <input type="hidden" name="oldmusic" value="{{session('homeuserMusic')->music}}">
                                    </label>
                                </div>
                                <div class="zhuce1-3-1" style="margin-bottom:10px;position: relative;">
                                    <label style="margin-bottom: 0px;">
                                        <h6 style="padding:10px;padding-left:0px;">上传音乐预览图:</h6>
                                        <a href='javascript:void(0);' class="blueButton" style='color:#fff;'>修改图片</a>
                                        <input type="file" class="myImgUpload" name="thumb_music"/>
                                        <div class="show-Img" style="display: block;width:500px;height:40px;float:left;line-height:40px;">{{session('homeuserMusic')->music_name}}{{strrchr(session('homeuserMusic')->thumb_music,'.')}}</div>
                                        <div style="clear:both;"></div>
                                        <input type="hidden" name="oldthumb_music" value="{{session('homeuserMusic')->thumb_music}}">
                                    </label>
                                </div>
                                @else
                                <div class="zhuce1-3-1" style="margin-bottom:10px;">
                                    <label for="music">
                                        <h6 style="padding:10px;padding-left:0px;">音乐名:</h6>
                                        <input type="text" name="music_name"  style="width:160px;border:1px solid #aaa;display: block;height:40px;padding:5px;box-sizing: border-box;border-radius:5px;" autocomplete="off" />
                                    </label>
                                </div>   
                                <div class="zhuce1-3-1" style="margin-bottom:10px;position: relative;">
                                    <label style="margin-bottom: 0px;">
                                        <h6 style="padding:10px;padding-left:0px;">上传音频:</h6>
                                        <a href='javascript:void(0);' class="blueButton" style='color:#fff;'>选择音频</a>
                                        <input type="file" class="myFileUpload" name="music"/>
                                        <div class="show-Music" style="display: block;width:500px;height:40px;float:left;line-height:40px;"></div>
                                        <div style="clear:both;"></div>
                                    </label>
                                </div>
                                <div class="zhuce1-3-1" style="margin-bottom:10px;position: relative;">
                                    <label style="margin-bottom: 0px;">
                                        <h6 style="padding:10px;padding-left:0px;">上传音乐预览图:</h6>
                                        <a href='javascript:void(0);' class="blueButton" style='color:#fff;'>选择图片</a>
                                        <input type="file" class="myImgUpload" name="thumb_music"/>
                                        <div class="show-Img" style="display: block;width:500px;height:40px;float:left;line-height:40px;"></div>
                                        <div style="clear:both;"></div>
                                    </label>
                                </div>
                                @endif
                                {{csrf_field()}}
                                <input type="hidden" name="uid" value="{{session('homeuser')->id}}">
                                <button type="submit" class="mybtn" style="margin-top: 10px;">@if(!empty(session('homeuserMusic'))) 修改上传 @else 开始上传 @endif</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop



@section('js')
    <!-- 返回顶部 -->
<a href="javascript:returnTop();" class="cd-top"></a>
<script type="text/javascript">
var sdelay=0;
function returnTop() {
 window.scrollBy(0,-100);//Only for y vertical-axis
 if(document.body.scrollTop>0) { 
  sdelay= setTimeout('returnTop()',50);
 }
}
</script>
<script type='text/javascript' src='/homes/js/base.js'></script>
<script type='text/javascript' src='/homes/js/all.js'></script>
<script type='text/javascript' src='/homes/js/plupload.full.min.js'></script>
<script type="text/javascript" src="/layer/layer.js"></script>
<script type='text/javascript' src='/layui/layui.js'></script>
<script type="text/javascript" src="/homes/js/sdasd.js"></script>
<script src="/homes/js/amazeui.min.js" charset="utf-8"></script>
<script src="/homes/js/cropper.min.js" charset="utf-8"></script>
<script src="/homes/js/custom_up_img.js" charset="utf-8"></script>
<!-- <script type="text/javascript" src="/homes/js/sentence.js" charset="utf-8"></script> -->
<script>
jQuery(document).ready(function($) {
    //懒加载
    var page = 7;
    var pagelike = 4;
    var isloading = false;  
    var mylikes = $('.lmlblog-member-right').find('div').attr('mydata');
    $(window).scroll(function(){
        var sH = $(document).height();
        var cH = $(window).height();
        var sT = $(window).scrollTop();
        if(sH - cH - sT <= 390){
            if(isloading) return;
            isloading = true;
            if(mylikes){
                $.get('/home/user/ajaxlike',{'pagelike':pagelike},function(data){  
                    //判断返回对象是否为空
                    if(!jQuery.isEmptyObject(data)){
                        var myLike = $('#pagelike').clone(true);
                        for(var i=0;i<data.length;i++){
                            myLike.find('.addtime').attr('title',timestampToTime(data[i].addtime));
                            myLike.find('.addtime').html(timestampToTime(data[i].addtime));
                            myLike.removeClass('hide');
                            myLike.find('a.post_list_link').attr('href','/home/details/'+data[i].did);
                            myLike.find('a.post_list_link p:eq(0)').html(data[i].saying);
                            myLike.find('a.post_list_link p:eq(1)').html(data[i].title);
                            myLike.find('a.clear').attr('href',data[i].picstream);
                            myLike.find('div.lmlblog-post-images-list img').attr('src',data[i].picstream);
                            myLike.find('div.lmlblog-post-images-list img').attr('alt',data[i].alt);
                            myLike.find('div.lmlblog-post-footer-bar span:eq(0)').attr('title',timestampToTime(data[i].addtime));
                            myLike.find('div.lmlblog-post-footer-bar span:eq(0)').html(timestampToTime(data[i].addtime));
                            $('#insertLike').append(myLike);
                        }
                        
                    }
                })
            }
            $.get('/home/user/ajaxsentence',{'page':page},function(data){
                //判断返回对象是否为空
                if(!jQuery.isEmptyObject(data)){
                    for(var i = 0;i<data.length;i++){
                        myElement = $('#hide').clone(true);
                        myElement.removeClass('hide');
                        myElement.removeAttr('hide');
                        myElement.find('.sentence-time').html(timestampToTime(data[i].addtime));
                        myElement.find('.sentence-time').attr('title',timestampToTime(data[i].addtime));
                        myElement.find('p').html(data[i].heart_sentence);
                        $('#mySentence').append(myElement);
                    }
                }else{
                    page = page+7;
                }
            });
        }
    })
    //转换时间搓
    $('.lmlblog-member-left .lmlblog-member-left-follow li').click(function(){
        return false;
    })
    function timestampToTime(timestamp) {
        var date = new Date();
        var Y = date.getFullYear() + '-';
        var M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-';
        var D = (date.getDate() < 10 ? '0' + (date.getDate()) : date.getDate()) + ' ';
        var h = (date.getHours() < 10 ? '0' + date.getHours() : date.getHours()) + ':';
        var m = (date.getMinutes() <10 ? '0' + date.getMinutes() : date.getMinutes()) + ':';
        var s = (date.getSeconds() <10 ? '0' + date.getSeconds() : date.getSeconds());
        return Y+M+D+h+m+s;
    }
    $('.setting-set').hover(function(){
        $('.hidden').show();
    },function(){
        $('.hidden').hide();
    })
    var musicFlag = true;
    $('.am-popover-inner').css({"fontSize":"10px"});
    $('.tab-control li a:odd').css({"color":"#555"});
    //选项卡
    $('.tab-control li').click(function(){
        $(this).each(function(){
            index = $(this).index();
            $(this).addClass('on').siblings().removeClass('on');
            $(".lmlblog-member-right").eq(index).addClass('show').siblings('.lmlblog-member-right').removeClass('show').addClass('hide');
        });
    })
    $('input[name="music_name"]').blur(function(){
        checkMusicName($(this));
    })
    //文件名称
    function checkMusicName(ths){
        if(ths.val().length <= 0){
            ths.css({"border":"1px red solid"});
            swal("温馨提示","音乐名不能为空","error");    
            musicFlag = false;
        }else{
            ths.css({"border":"1px lightgreen solid"});
        }
    }
    //音乐文件
    $(".myFileUpload").change(function(){
            var arrs=$(this).val().split('\\');
            var filename=arrs[arrs.length-1];
            $(".show-Music").html(filename);
   });
    /*  
     * 判断音乐类型  
     */    
    $('input[name="music"]').change(function(){
        checkMusicType($(this));
    })
    function checkMusicType(ths){    
        if (ths.val() == "") {    
            swal("温馨提示","请选择音频文件","error");    
            musicFlag = false;   
        } else {    
            if (!/\.(mp3|wma|wav|ogg)$/i.test(ths.val())) {    
                swal("温馨提示","音频类型必须是.mp3,wma,wav,ogg中的一种","error");    
                ths.val('');
                $('.show-Music').text('');
                musicFlag = false; 
            }    
        }    
    }
    //图片文件
    $(".myImgUpload").change(function(){
        var arrs=$(this).val().split('\\');
        var filename=arrs[arrs.length-1];
        $(".show-Img").html(filename);
    })
    /*  
     * 判断图片类型  
     */    
    $('input[name="thumb_music"]').change(function(){
        checkImgType($(this));
    })
    function checkImgType(ths){    
        if (ths.val() == "") {    
            swal("温馨提示","请选择图片文件","error");    
           musicFlag = false;
        } else {    
            if (!/\.(gif|jpg|jpeg|png|GIF|JPG|PNG)$/.test(ths.val())) {    
                swal("温馨提示","图片类型必须是.gif,jpeg,jpg,png中的一种","error");    
                ths.val('');
                $('.show-Img').text('');
                musicFlag = false;
            }    
        }     
    }
    $('form').submit(function(){
        checkImgType($("input[name='thumb_music']"));
        checkMusicType($("input[name='music']"));
        checkMusicName($("input[name='music_name']"));
        if(musicFlag){
            return musicFlag;
        }
        return musicFlag;
    })
    //每日一语
    var id = $('input[name="uid"]').attr('value');
    $('#sentence').click(function(){
        var sentence = $(this);
        if($('.integral').text() == '0'){
            swal("温馨提示",'当前积分不足','error');
        }else if(sentence.attr('rel') >= 6){
            swal("温馨提示",'你当天已经获得过6次了哦','error');
        }else{
            $.post('/home/user/sentence',{"_token":"{{csrf_token()}}","uid":id},function(data){
                if(data == '101'){
                    swal("温馨提示",'你当天已经获得过6次了哦','error');
                }else if(data == '1'){
                    swal("温馨提示","每日一语获取失败",'error');
                }else if(data == '100'){
                    swal("温馨提示",'当前积分不足','error');
                }else if(data == '9'){
                    swal("温馨提示",'已无每日一语','error');
                }else{
                    swal("每日一语",data.heart_sentence,'success');
                    myElement = $('#hide').clone(true);
                    sentence.attr('rel',data.get_sentence_num);
                    myElement.removeClass('hide');
                    myElement.removeAttr('hide');
                    myElement.find('.sentence-time').html(timestampToTime(data.addtime));
                    myElement.find('.sentence-time').attr('title',timestampToTime(data.addtime));
                    myElement.find('p').html(data.heart_sentence);
                    $('.integral').html('<i class="fa fa-diamond"></i>'+data.integral);
                    $('.bigintegral').html(data.integral);
                    myElement.find('.integral').html('<i class="fa fa-diamond"></i>'+data.integral);
                    $('#mySentence').prepend(myElement);
                }
            })
        }
    })
});
</script>   
@stop
