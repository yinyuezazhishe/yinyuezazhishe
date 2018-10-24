@extends('Home.Public.layout')

@section('title',$title)

@section('content')

<div id="wrap" class="container clearfix">
    <section id="content" class="primary" role="main">
        <article class="post-17838 post type-post status-publish format-standard has-post-thumbnail hentry category-feizhuliuyinyue category-wenzi tag-bebe tag-1393 tag-2716 tag-3091 tag-1194">
            <h2 class="post-title entry-title">
                {{$details->details_content->title}}
            </h2>
            <div class="postmeta">
                <span class="meta-date">
                    <a href="https://www.mtyyw.com/17838/" title="8:57 下午" rel="bookmark">
                        <time class="entry-date published updated" datetime="2017-07-25T20:57:38+00:00">
                            {{date('Y-m-d',$details->details_content->addtime)}}
                        </time>
                    </a>
                </span>
                <span class="meta-author sep">
                    <span class="author vcard">
                        <a class="fn" href="https://www.mtyyw.com/author/admin/" title="View all posts by 林中有鬼"
                        rel="author">
                            {{$details->details_content->author}}
                        </a>
                    </span>
                </span>
                <span class="meta-comments sep">
                    <a href="https://www.mtyyw.com/17838/#comments">
                        <span class="nums">{{$num}}</span>评论
                    </a>
                </span>
            </div>
            <div class="entry clearfix">
                <blockquote>
                    <p>
                        {{$details->details_content->saying}}
                    </p>
                </blockquote>
                <p>
                    <img src="{{$details->details_content->picstream}}" alt="bebe"
                    width="400" height="400" class="alignnone size-full wp-image-17840" sizes="(max-width: 400px) 100vw, 400px" />
                    <br />
                    简介:{{$details->details_content->describe}}
                    <br />
                </p>
                {!!$details->details_content->content!!}
                <!-- 百度分享开始 -->
                <div class="bdsharebuttonbox" style="float: left">
                    <a href="#" class="bds_more" data-cmd="more">
                    </a>
                    <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间">
                    </a>
                    <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博">
                    </a>
                    <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博">
                    </a>
                    <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网">
                    </a>
                    <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信">
                    </a>
                    
                </div>
                <!-- 百度分享结束 -->
                <!-- 点赞开始 -->
                <div style="text-align: right;">
                    <a style="margin-right: 2px;" href="{{$details->details_content->id}}" id="praise" action-type="fl_like" action-data="version=mini&amp;qid=heart&amp;mid=4295726709690699&amp;loc=profile&amp;cuslike=1" title="赞" suda-uatrack="key=profile_feed&amp; value=like">
                        <span class="pos">
                            <span class="line S_line1">
                                <span node-type="like_status" class="">
                                    喜欢点个赞吧
                                    <em @if(!empty($pr)) @if($pr->u_id != session('homeuser')->id) class="fa fa-thumbs-o-up" @elseif($pr->u_id == session('homeuser')->id) class="fa fa-thumbs-up" @endif @endif class="fa fa-thumbs-o-up"></em>
                                    <span id="sum" value="{{count($praise)}}">{{count($praise)}}</span>
                                </span>
                            </span>
                        </span>
                    </a>
                </div>
                <!-- 点赞结束 -->
            </div>
        </article>
        <!-- Begin Yuzo -->
        <div class="yuzo_related_post style-1" data-version="5.12.81">
            <!-- with result -->
            <div class="yuzo_clearfixed yuzo__title">
                <h4 class="post-title entry-title">
                    猜你喜欢
                </h4>
            </div>
            <div class="yuzo_wraps">
                @foreach ($detail as $k => $v)
                <div class="relatedthumb relatedpost-18577" style="width: 230px; margin: 10px; float: left; overflow: hidden; height: 202px;">
                    <span class="equalizer-inner" style="display:block;">
                        <a href="/home/details/{{$v->did}}" title="{{$v->title}}">
                            <div class="yuzo-img-wrap ">
                                <div class="yuzo-img" style="background:url('{{$v->picstream}}') 50% 50% no-repeat;width: 230px;;max-width:100%;height:160px;margin-bottom: 5px;background-size: cover; ">
                                </div>
                            </div>
                            <span class="yuzo__text--title" style="font-size:13px;">
                                {{$v->title}}
                            </span>
                        </a>
                    </span>
                </div>
                @endforeach
            </div>
            <!-- end wrap -->
        </div>
        <!-- End Yuzo :) -->

        <div id="comments">
            <div id="respond" class="comment-respond">
                <h3 id="reply-title" class="comment-reply-title">
                    <span class="as">发表评论</span>
                    <small>
                        <a rel="nofollow" id="cancel-comment-reply-link" href=""
                        style="display:none;">
                            取消回复
                        </a>
                    </small>
                </h3>
                <form action="" method="post"id="commentform" class="comment-form">
                    <p class="comment-form-comment">
                        <label for="comment">
                            评论
                        </label>
                        <textarea id="discuss" name="comment" cols="45"  onkeydown="checknum(100)" onkeyup="checknum(100)"  rows="8" maxlength="65525"
                        required="required"></textarea>
                        <span id="in"/>
                        </span>
                    </p>
                    <p class="form-submit" style="text-align: right;">
                        <input name="submit" type="submit" id="submit" class="submit" value="发表评论" style="display: inline;">
                        <input type="hidden" id="did" value="{{$d_content->id}}">
                        <input type="hidden" name="uid" value="@if(!empty(session('homeuser'))) {{session('homeuser')->id}} @endif" id="uid">
                    </p>
                    <p style="display: none;">
                    </p>
                    <p style="display: none;">
                    </p>
                </form>
            </div>
            
            <ul class="commentlist">
                <!-- #comment-## -->
                @foreach($user as $k=>$v)
                
                <li class="comment even thread-odd thread-alt depth-1" id="comment">
                    <div class="comment-body">
                        <div class="comment-author vcard clearfix">
                            <span class="fn">
                                {{$v->users['username']}}
                            </span>
                            <div class="comment-meta commentmetadata">
                                    {{date('Y-m-d H:i:s A',$v->addtime)}}
                            </div>
                        </div>
                        <div class="comment-content clearfix">
                            <img alt="" src="{{$v->users['face']}}"class="avatar avatar-72 photo" height="72" width="72">
                            <p class="con">
                                {{$v->content}}
                            </p>
                        </div>
                        <div class="reply">
                            <a rel="nofollow"  cid="{{$v->id}}" class="comment-reply-link" href="javascript:void(0)">
                                回复
                            </a>
                        </div>
                    </div>
                    @foreach($reply as $kk=>$vv)
                        @if($vv->cid == $v->id)
                            <ul class="children">
                                <li class="comment even 2 depth-2">
                                    <div class="comment-body">
                                        <div class="comment-author vcard clearfix">
                                            <span class="fn">
                                                {{$vv->users['username']}}
                                            </span>
                                            <div class="comment-meta commentmetadata">
                                                     {{date('Y-m-d H:i:s A',$vv->addtime)}}
                                            </div>
                                        </div>
                                        <div class="comment-content clearfix">
                                            <img alt="" src="{{$vv->users['face']}}"class="avatar avatar-72 photo" height="72" width="72">
                                            <p class="con">
                                                {{$vv->content}}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @endif
                    @endforeach
                </li>
                @endforeach
                <li class="comment even depth-1" id="centent_clone" style="display: none">
                    <div class="comment-body">
                        <div class="comment-author vcard clearfix">
                            <span class="fn">
                                
                            </span>
                            <div class="comment-meta commentmetadata">
                                    
                            </div>
                        </div>
                        <div class="comment-content clearfix">
                            <img alt="" src="" class="avatar avatar-72 photo" height="72" width="72">
                            <p class="con">
                                
                            </p>
                        </div>
                        <div class="reply">
                            <a rel="nofollow"  cid="" class="comment-reply-link" href="javascript:void(0)">
                                回复
                            </a>
                        </div>
                    </div>
                </li>
                <ul class="children_clone" style="display: none;">
                    <li class="comment even depth-1">
                    <div class="comment-body">
                        <div class="comment-author vcard clearfix">
                            <span class="fn">
                                
                            </span>
                            <div class="comment-meta commentmetadata">
                                    
                            </div>
                        </div>
                        <div class="comment-content clearfix">
                            <img alt="" src=""class="avatar avatar-72 photo" height="72" width="72">
                            <p class="con">
                                
                            </p>
                        </div>
                    </div>
                    </li>
                </ul>
            </ul>
            <h3 class="comments-title" style="text-align: right;">
                <span id="nums" class="nums">{{$num}}</span>条评论
                
            </h3>
        </div>        
        <!-- #respond -->
    </section>

@stop

@section('js')

@php
    if (session('homeuser') && !$pr == '') {
        echo "<script type='text/javascript'>
            $('#praise').find('em').removeClass('fa-thumbs-o-up');
        </script>";
    }
@endphp

<script>
    // 百度分享 js 开始 
    window._bd_share_config = {
        "common": {
            "bdSnsKey": {},
            "bdText": "",
            "bdMini": "2",
            "bdMiniList": false,
            "bdPic": "",
            "bdStyle": "1",
            "bdSize": "24"
        },
        "share": {},
        "image": {
            "viewList": ["qzone", "tsina", "tqq", "renren", "weixin"],
            "viewText": "分享到：",
            "viewSize": "16"
        },
        "selectShare": {
            "bdContainerClass": null,
            "bdSelectMiniList": ["qzone", "tsina", "tqq", "renren", "weixin"]
        }
    };
    with(document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~ ( - new Date() / 36e5)];
    // 百度分享 js 结束

    // console.log($('#praise'));
    $('#praise').click(function ()
    {
        var id = $(this).attr('href');
        // var praise = '';
        // if ($(this).find('.fa-thumbs-o-up').attr('class') == 'fa fa-thumbs-o-up') {
        //     praise = 0;
        // } else {
        //     praise = 1;
        // }

        var pr = $(this);

        // console.log(praise);

        $.ajax({
            url: "/home/praise",
            data: {id: id},
            type: "GET",
            dataType: "json",
            success: function (data) {
                if (data == 0) {
                    swal("恭喜你!", "点赞成功!", "success");
                    pr.find('em').removeClass('fa fa-thumbs-o-up');
                    pr.find('em').addClass('fa fa-thumbs-up');
                    pr.find('#sum').html(parseInt(pr.find('#sum').html()) + 1);
                } else if (data == 1) {
                    swal("对不起!", "点赞失败!", "error");
                } else if (data == 2) {
                    swal("恭喜你!", "取消点赞成功!", "success");
                    pr.find('em').removeClass('fa fa-thumbs-up');
                    pr.find('em').addClass('fa fa-thumbs-o-up');
                    pr.find('#sum').html(parseInt(pr.find('#sum').html()) - 1);
                    // console.log($('#sum').attr('value'));
                } else if (data == 3) {
                    swal("对不起!", "取消点赞失败!", "error");
                } else if (data == 4) {
                    swal("对不起!", "您还未登陆, 请登陆后再点赞!", "error");
                    $('.zhuce').addClass('bounceOutUp').fadeOut();
                    setTimeout(function () {
                        $('.mf_denglu').removeClass('bounceOutUp').addClass('animated bounceInDown').fadeIn();
                    }, 1500);
                }
            },
            error: function(){
                swal("对不起!", "点赞失败!", "error");
            },
            async: true
        });

        return false;
    })
</script>
                
</section>

<script type="text/javascript">

    var id

    var cid = '';

    var flag = 'comment';

    $('#submit').click(function(){

        var sub = $(this);

        var comment = $('#discuss').val();

        $('#discuss').val('');

        var uid = $('#uid').val();

        var did = $('#did').val();

        if (uid == '') {

            swal("温馨提示!", "请您先登录", "error");

            $('.zhuce').addClass('bounceOutUp').fadeOut();

            setTimeout(function () {
                $('.mf_denglu').removeClass('bounceOutUp').addClass('animated bounceInDown').fadeIn();
            }, 1500);
            return false;
        }

        if (comment == '') {

            swal("温馨提示!", "内容不能为空", "error");
            return false;
        }

        if(flag == 'comment'){

            $.post('/home/comment',{'content':comment,'hid':uid,'did':did,'_token':'{{ csrf_token() }}'},

                function(data){

                    console.log(uid);

                    swal("恭喜你!", "评论成功!", "success");

                    checknum(100);

                    var New_li = $('#centent_clone').clone(true);

                    New_li.attr('id','');

                    New_li.css('display','block');

                    New_li.find('.commentmetadata').text(data.addtime);

                    New_li.find('.fn').text(data.username);

                    New_li.find('.avatar').attr('src',data.face);

                    New_li.find('.con').text(comment);

                    New_li.find('.comment-reply-link').attr('cid',data.id);

                    $('.commentlist').prepend(New_li);

                    num();

                },'json');

            return false;

        } else {

            $.post('/home/reply',{'content':comment,'hid':uid,'cid':cid,'did':did,'_token':'{{ csrf_token() }}'},

            function(data){
                checknum(100);

                swal("恭喜你!", "回复成功!", "success");

                var New_ul = $('.children_clone').clone(true);

                New_ul.removeClass('children_clone');

                New_ul.css('display','block');

                New_ul.find('.commentmetadata').text(data.addtime);

                New_ul.find('.fn').text(data.username);

                New_ul.find('.avatar').attr('src',data.face);

                New_ul.find('.con').text(comment);

                New_ul.find('.comment-reply-link').attr('cid',data.id);

                sub.parents('li').eq(0).append(New_ul);

                flag = 'comment';

                $('#cancel-comment-reply-link').css('display','none');

                $('.as').text('发布评论');

                num();

            },'json');

        }
            
    });


    $('.comment-reply-link').click(function(){
        
        flag = 'reply';

        var name = '';

        rid = $(this).prev().val();

        cid = $(this).attr('cid');

        $('#cancel-comment-reply-link').css('display','block');

        $respond = $('#respond');

        $(this).before($respond);

        name = $(this).parent().prev().prev().find('.fn').text();

        $('.as').text('回复'+name);

        return false;
    });
   

    $('#cancel-comment-reply-link').click(function(){

        flag = 'comment';

        cid = '';

        $(this).css('display','none');

        $('.commentlist').before($('#respond'));

        $('.as').text('发布评论');

        return false;
    });


    function checknum(num){
        var nMax = num;
        var textDom =  document.getElementById("discuss");
        var len =textDom.value.length;    
        if(len>nMax){
            textDom.value = textDom.value.substring(0,nMax);
            return;
        }
        document.getElementById("in").innerHTML="你还可以输入<span style='color:red'>"+(nMax-len)+"</span>个字";
    }
    checknum(100);


    function num() {
        $nums = Number($('#nums').text()) + 1;

        $('.nums').text($nums);

        $('.commentlist').before($('#respond'));
    }
</script>

@stop