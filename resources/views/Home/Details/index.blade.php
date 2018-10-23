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
                        2 评论
                    </a>
                </span>
                <span class="meta-comments sep">
                    1,019次
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
                <div class="relatedthumb relatedpost-18577" style="width: 230px; float: left; overflow: hidden; height: 202px;">
                    <span class="equalizer-inner" style="display:block;">
                        <a href="https://www.mtyyw.com/18577/">
                            <div class="yuzo-img-wrap ">
                                <div class="yuzo-img" style="background:url('https://www.mtyyw.com/wp-content/uploads/2018/03/Cfl817XZ8YRTAuxaPjR_xw3D3D2F6666339000125434-1-360x360.jpg') 50% 50% no-repeat;width: 230px;;max-width:100%;height:160px;margin-bottom: 5px;background-size: cover; ">
                                </div>
                            </div>
                            <span class="yuzo__text--title" style="font-size:13px;">
                                “诗魔”洛夫去世。我走了，走了一半又停住……...
                            </span>
                        </a>
                    </span>
                </div>
                <div class="relatedthumb relatedpost-18492" style="width: 230px; float: left; overflow: hidden; height: 202px;">
                    <span class="equalizer-inner" style="display:block;">
                        <a href="https://www.mtyyw.com/18492/">
                            <div class="yuzo-img-wrap ">
                                <div class="yuzo-img" style="background:url('https://www.mtyyw.com/wp-content/uploads/2018/02/0BesfgoyjLhIH9aowbw6bg3D3D2F2532175279873656-360x360.jpg') 50% 50% no-repeat;width: 230px;;max-width:100%;height:160px;margin-bottom: 5px;background-size: cover; ">
                                </div>
                            </div>
                            <span class="yuzo__text--title" style="font-size:13px;">
                                别爱上像我这样的人
                            </span>
                        </a>
                    </span>
                </div>
                <div class="relatedthumb relatedpost-18468" style="width: 230px; float: left; overflow: hidden; height: 202px;">
                    <span class="equalizer-inner" style="display:block;">
                        <a href="https://www.mtyyw.com/18468/">
                            <div class="yuzo-img-wrap ">
                                <div class="yuzo-img" style="background:url('https://www.mtyyw.com/wp-content/uploads/2018/02/71jdIcEuQYL._SL1200_-360x360.jpg') 50% 50% no-repeat;width: 230px;;max-width:100%;height:160px;margin-bottom: 5px;background-size: cover; ">
                                </div>
                            </div>
                            <span class="yuzo__text--title" style="font-size:13px;">
                                深夜，陈旧的事物会发光
                            </span>
                        </a>
                    </span>
                </div>
            </div>
            <!-- end wrap -->
        </div>
        <!-- End Yuzo :) -->
        <div id="comments">
            <h3 class="comments-title">
                <span>
                    22 条评论
                </span>
            </h3>
            <ul class="commentlist">
                <li class="comment even thread-even depth-1" id="comment-87724">
                    <div id="div-comment-87724" class="comment-body">
                        <div class="comment-author vcard clearfix">
                            <span class="fn">
                                修行者
                            </span>
                            <div class="comment-meta commentmetadata">
                                <a href="https://www.mtyyw.com/7/#comment-87724">
                                    2018-04-14 8:11 下午
                                </a>
                            </div>
                        </div>
                        <div class="comment-content clearfix">
                            <img alt="" src="https://secure.gravatar.com/avatar/3bd651f897d1ca6ee32a8ca3363bc726?s=72&amp;d=monsterid&amp;r=g"
                            srcset="https://secure.gravatar.com/avatar/3bd651f897d1ca6ee32a8ca3363bc726?s=144&amp;d=monsterid&amp;r=g 2x"
                            class="avatar avatar-72 photo" height="72" width="72">
                            <p>
                                慢慢开始，有下载也是极好的；
                            </p>
                        </div>
                        <div class="reply">
                            <a rel="nofollow" class="comment-reply-link" href="https://www.mtyyw.com/7/?replytocom=87724#respond"
                            onclick="return addComment.moveForm( &quot;comment-87724&quot;, &quot;87724&quot;, &quot;respond&quot;, &quot;7&quot; )"
                            aria-label="回复给修行者">
                                回复
                            </a>
                        </div>
                    </div>
                </li>
                <!-- #comment-## -->
                <li class="comment odd alt thread-odd thread-alt depth-1" id="comment-72242">
                    <div id="div-comment-72242" class="comment-body">
                        <div class="comment-author vcard clearfix">
                            <span class="fn">
                                萍果味幸福
                            </span>
                            <div class="comment-meta commentmetadata">
                                <a href="https://www.mtyyw.com/7/#comment-72242">
                                    2016-01-28 4:56 下午
                                </a>
                            </div>
                        </div>
                        <div class="comment-content clearfix">
                            <img alt="" src="https://secure.gravatar.com/avatar/?s=72&amp;d=monsterid&amp;r=g"
                            srcset="https://secure.gravatar.com/avatar/?s=144&amp;d=monsterid&amp;r=g 2x"
                            class="avatar avatar-72 photo avatar-default" height="72" width="72">
                            <p>
                                第一次听麦田的歌就喜欢上了这里，喜欢的东西，就在继续！
                            </p>
                        </div>
                        <div class="reply">
                            <a rel="nofollow" class="comment-reply-link" href="https://www.mtyyw.com/7/?replytocom=72242#respond"
                            onclick="return addComment.moveForm( &quot;comment-72242&quot;, &quot;72242&quot;, &quot;respond&quot;, &quot;7&quot; )"
                            aria-label="回复给萍果味幸福">
                                回复
                            </a>
                        </div>
                    </div>
                </li>
                <!-- #comment-## -->
                <li class="comment even thread-even depth-1" id="comment-70729">
                    <div id="div-comment-70729" class="comment-body">
                        <div class="comment-author vcard clearfix">
                            <span class="fn">
                                lijinchen6502
                            </span>
                            <div class="comment-meta commentmetadata">
                                <a href="https://www.mtyyw.com/7/#comment-70729">
                                    2015-09-19 11:19 下午
                                </a>
                            </div>
                        </div>
                        <div class="comment-content clearfix">
                            <img alt="" src="https://secure.gravatar.com/avatar/?s=72&amp;d=monsterid&amp;r=g"
                            srcset="https://secure.gravatar.com/avatar/?s=144&amp;d=monsterid&amp;r=g 2x"
                            class="avatar avatar-72 photo avatar-default" height="72" width="72">
                            <p>
                                我决定从头翻一遍
                            </p>
                        </div>
                        <div class="reply">
                            <a rel="nofollow" class="comment-reply-link" href="https://www.mtyyw.com/7/?replytocom=70729#respond"
                            onclick="return addComment.moveForm( &quot;comment-70729&quot;, &quot;70729&quot;, &quot;respond&quot;, &quot;7&quot; )"
                            aria-label="回复给lijinchen6502">
                                回复
                            </a>
                        </div>
                    </div>
                </li>
                <!-- #comment-## -->
                <li class="comment odd alt thread-odd thread-alt depth-1" id="comment-62905">
                    <div id="div-comment-62905" class="comment-body">
                        <div class="comment-author vcard clearfix">
                            <span class="fn">
                                在路上的娃
                            </span>
                            <div class="comment-meta commentmetadata">
                                <a href="https://www.mtyyw.com/7/#comment-62905">
                                    2014-08-28 9:07 上午
                                </a>
                            </div>
                        </div>
                        <div class="comment-content clearfix">
                            <img alt="" src="https://secure.gravatar.com/avatar/92e590fdac7b35715adf516705649b2c?s=72&amp;d=monsterid&amp;r=g"
                            srcset="https://secure.gravatar.com/avatar/92e590fdac7b35715adf516705649b2c?s=144&amp;d=monsterid&amp;r=g 2x"
                            class="avatar avatar-72 photo" height="72" width="72">
                            <p>
                                很早就想从头开始翻起，主要是为了听歌，文字，共鸣的是大多是悲和凉~受老鬼大哥启发，决定也开个摄影主题的博客，记录成长的路径
                            </p>
                        </div>
                        <div class="reply">
                            <a rel="nofollow" class="comment-reply-link" href="https://www.mtyyw.com/7/?replytocom=62905#respond"
                            onclick="return addComment.moveForm( &quot;comment-62905&quot;, &quot;62905&quot;, &quot;respond&quot;, &quot;7&quot; )"
                            aria-label="回复给在路上的娃">
                                回复
                            </a>
                        </div>
                    </div>
                </li>
                <!-- #comment-## -->
                <li class="comment even thread-even depth-1" id="comment-56211">
                    <div id="div-comment-56211" class="comment-body">
                        <div class="comment-author vcard clearfix">
                            <span class="fn">
                                王淑葶
                            </span>
                            <div class="comment-meta commentmetadata">
                                <a href="https://www.mtyyw.com/7/#comment-56211">
                                    2013-08-08 10:04 上午
                                </a>
                            </div>
                        </div>
                        <div class="comment-content clearfix">
                            <img alt="" src="https://secure.gravatar.com/avatar/?s=72&amp;d=monsterid&amp;r=g"
                            srcset="https://secure.gravatar.com/avatar/?s=144&amp;d=monsterid&amp;r=g 2x"
                            class="avatar avatar-72 photo avatar-default" height="72" width="72">
                            <p>
                                呼呼，我以为只有自己，原来好多人都从第一页看起了。最近心情不好，决定周末出去走走，喜欢这个网站好久了，断断续续一直到今天，老鬼很棒的说
                            </p>
                        </div>
                        <div class="reply">
                            <a rel="nofollow" class="comment-reply-link" href="https://www.mtyyw.com/7/?replytocom=56211#respond"
                            onclick="return addComment.moveForm( &quot;comment-56211&quot;, &quot;56211&quot;, &quot;respond&quot;, &quot;7&quot; )"
                            aria-label="回复给王淑葶">
                                回复
                            </a>
                        </div>
                    </div>
                </li>
                <!-- #comment-## -->
                <li class="comment odd alt thread-odd thread-alt depth-1" id="comment-54550">
                    <div id="div-comment-54550" class="comment-body">
                        <div class="comment-author vcard clearfix">
                            <span class="fn">
                                夜神月
                            </span>
                            <div class="comment-meta commentmetadata">
                                <a href="https://www.mtyyw.com/7/#comment-54550">
                                    2013-05-03 1:48 下午
                                </a>
                            </div>
                        </div>
                        <div class="comment-content clearfix">
                            <img alt="" src="https://secure.gravatar.com/avatar/89fdc50f4ea7003ba72a7722fa273a1b?s=72&amp;d=monsterid&amp;r=g"
                            srcset="https://secure.gravatar.com/avatar/89fdc50f4ea7003ba72a7722fa273a1b?s=144&amp;d=monsterid&amp;r=g 2x"
                            class="avatar avatar-72 photo" height="72" width="72">
                            <p>
                                喜欢麦田很久了，最近有空，决定把所有歌都听一遍
                            </p>
                        </div>
                        <div class="reply">
                            <a rel="nofollow" class="comment-reply-link" href="https://www.mtyyw.com/7/?replytocom=54550#respond"
                            onclick="return addComment.moveForm( &quot;comment-54550&quot;, &quot;54550&quot;, &quot;respond&quot;, &quot;7&quot; )"
                            aria-label="回复给夜神月">
                                回复
                            </a>
                        </div>
                    </div>
                </li>
                <!-- #comment-## -->
                <li class="comment even thread-even depth-1" id="comment-38029">
                    <div id="div-comment-38029" class="comment-body">
                        <div class="comment-author vcard clearfix">
                            <span class="fn">
                                已凉
                            </span>
                            <div class="comment-meta commentmetadata">
                                <a href="https://www.mtyyw.com/7/#comment-38029">
                                    2011-03-07 9:02 上午
                                </a>
                            </div>
                        </div>
                        <div class="comment-content clearfix">
                            <img alt="" src="https://secure.gravatar.com/avatar/625e4ba83dcb94fc2a3cdb6f54969e69?s=72&amp;d=monsterid&amp;r=g"
                            srcset="https://secure.gravatar.com/avatar/625e4ba83dcb94fc2a3cdb6f54969e69?s=144&amp;d=monsterid&amp;r=g 2x"
                            class="avatar avatar-72 photo" height="72" width="72">
                            <p>
                                总有些歌会让你想起一些人，回忆一些事，从第一首歌开始听，是因为无意间闯进了这片独自的麦田。
                            </p>
                        </div>
                        <div class="reply">
                            <a rel="nofollow" class="comment-reply-link" href="https://www.mtyyw.com/7/?replytocom=38029#respond"
                            onclick="return addComment.moveForm( &quot;comment-38029&quot;, &quot;38029&quot;, &quot;respond&quot;, &quot;7&quot; )"
                            aria-label="回复给已凉">
                                回复
                            </a>
                        </div>
                    </div>
                </li>
                <!-- #comment-## -->
                <li class="comment odd alt thread-odd thread-alt depth-1" id="comment-37495">
                    <div id="div-comment-37495" class="comment-body">
                        <div class="comment-author vcard clearfix">
                            <span class="fn">
                                偏执狂人
                            </span>
                            <div class="comment-meta commentmetadata">
                                <a href="https://www.mtyyw.com/7/#comment-37495">
                                    2011-02-02 11:27 上午
                                </a>
                            </div>
                        </div>
                        <div class="comment-content clearfix">
                            <img alt="" src="https://secure.gravatar.com/avatar/0d1ded5b8d92603af044bd1cab34fc4a?s=72&amp;d=monsterid&amp;r=g"
                            srcset="https://secure.gravatar.com/avatar/0d1ded5b8d92603af044bd1cab34fc4a?s=144&amp;d=monsterid&amp;r=g 2x"
                            class="avatar avatar-72 photo" height="72" width="72">
                            <p>
                                认识这网站一年了，今天从第一首开始，在电脑上开个文件夹，就叫麦田
                            </p>
                        </div>
                        <div class="reply">
                            <a rel="nofollow" class="comment-reply-link" href="https://www.mtyyw.com/7/?replytocom=37495#respond"
                            onclick="return addComment.moveForm( &quot;comment-37495&quot;, &quot;37495&quot;, &quot;respond&quot;, &quot;7&quot; )"
                            aria-label="回复给偏执狂人">
                                回复
                            </a>
                        </div>
                    </div>
                </li>
                <!-- #comment-## -->
                <li class="comment even thread-even depth-1" id="comment-35420">
                    <div id="div-comment-35420" class="comment-body">
                        <div class="comment-author vcard clearfix">
                            <span class="fn">
                                时尚老太太
                            </span>
                            <div class="comment-meta commentmetadata">
                                <a href="https://www.mtyyw.com/7/#comment-35420">
                                    2010-10-10 7:23 下午
                                </a>
                            </div>
                        </div>
                        <div class="comment-content clearfix">
                            <img alt="" src="https://secure.gravatar.com/avatar/d526f2adb8c08ccc02d604139431b048?s=72&amp;d=monsterid&amp;r=g"
                            srcset="https://secure.gravatar.com/avatar/d526f2adb8c08ccc02d604139431b048?s=144&amp;d=monsterid&amp;r=g 2x"
                            class="avatar avatar-72 photo" height="72" width="72">
                            <p>
                                偶然路过，听了，非常喜欢，于是从第一叶翻起
                            </p>
                        </div>
                        <div class="reply">
                            <a rel="nofollow" class="comment-reply-link" href="https://www.mtyyw.com/7/?replytocom=35420#respond"
                            onclick="return addComment.moveForm( &quot;comment-35420&quot;, &quot;35420&quot;, &quot;respond&quot;, &quot;7&quot; )"
                            aria-label="回复给时尚老太太">
                                回复
                            </a>
                        </div>
                    </div>
                </li>
                <!-- #comment-## -->
                <li class="comment odd alt thread-odd thread-alt depth-1" id="comment-32598">
                    <div id="div-comment-32598" class="comment-body">
                        <div class="comment-author vcard clearfix">
                            <span class="fn">
                                kevinstar
                            </span>
                            <div class="comment-meta commentmetadata">
                                <a href="https://www.mtyyw.com/7/#comment-32598">
                                    2010-06-18 9:48 下午
                                </a>
                            </div>
                        </div>
                        <div class="comment-content clearfix">
                            <img alt="" src="https://secure.gravatar.com/avatar/c712b68fb75489d30302bd49b37dccd1?s=72&amp;d=monsterid&amp;r=g"
                            srcset="https://secure.gravatar.com/avatar/c712b68fb75489d30302bd49b37dccd1?s=144&amp;d=monsterid&amp;r=g 2x"
                            class="avatar avatar-72 photo" height="72" width="72">
                            <p>
                                原来大家都是这么好奇的从第一首歌曲开始啊~
                                <br>
                                我也准备好从第一页开始了~
                                <br>
                                谢谢老鬼~
                            </p>
                        </div>
                        <div class="reply">
                            <a rel="nofollow" class="comment-reply-link" href="https://www.mtyyw.com/7/?replytocom=32598#respond"
                            onclick="return addComment.moveForm( &quot;comment-32598&quot;, &quot;32598&quot;, &quot;respond&quot;, &quot;7&quot; )"
                            aria-label="回复给kevinstar">
                                回复
                            </a>
                        </div>
                    </div>
                </li>
                <!-- #comment-## -->
                <li class="comment even thread-even depth-1" id="comment-31198">
                    <div id="div-comment-31198" class="comment-body">
                        <div class="comment-author vcard clearfix">
                            <span class="fn">
                                CarrieJ
                            </span>
                            <div class="comment-meta commentmetadata">
                                <a href="https://www.mtyyw.com/7/#comment-31198">
                                    2010-05-05 6:21 下午
                                </a>
                            </div>
                        </div>
                        <div class="comment-content clearfix">
                            <img alt="" src="https://secure.gravatar.com/avatar/ed450aebc7e8acedab5974d318fadaaf?s=72&amp;d=monsterid&amp;r=g"
                            srcset="https://secure.gravatar.com/avatar/ed450aebc7e8acedab5974d318fadaaf?s=144&amp;d=monsterid&amp;r=g 2x"
                            class="avatar avatar-72 photo" height="72" width="72">
                            <p>
                                一共103页，那么。。好吧。。
                            </p>
                        </div>
                        <div class="reply">
                            <a rel="nofollow" class="comment-reply-link" href="https://www.mtyyw.com/7/?replytocom=31198#respond"
                            onclick="return addComment.moveForm( &quot;comment-31198&quot;, &quot;31198&quot;, &quot;respond&quot;, &quot;7&quot; )"
                            aria-label="回复给CarrieJ">
                                回复
                            </a>
                        </div>
                    </div>
                    <ul class="children">
                        <li class="comment byuser comment-author-admin bypostauthor odd alt depth-2"
                        id="comment-31201">
                            <div id="div-comment-31201" class="comment-body">
                                <div class="comment-author vcard clearfix">
                                    <span class="fn">
                                        林中有鬼
                                    </span>
                                    <div class="comment-meta commentmetadata">
                                        <a href="https://www.mtyyw.com/7/#comment-31201">
                                            2010-05-05 7:15 下午
                                        </a>
                                    </div>
                                </div>
                                <div class="comment-content clearfix">
                                    <img alt="" src="https://secure.gravatar.com/avatar/e8b72ebfb96ee1338d96713342e1aa13?s=72&amp;d=monsterid&amp;r=g"
                                    srcset="https://secure.gravatar.com/avatar/e8b72ebfb96ee1338d96713342e1aa13?s=144&amp;d=monsterid&amp;r=g 2x"
                                    class="avatar avatar-72 photo" height="72" width="72">
                                    <p>
                                        好奇心很强嘛
                                    </p>
                                </div>
                                <div class="reply">
                                    <a rel="nofollow" class="comment-reply-link" href="https://www.mtyyw.com/7/?replytocom=31201#respond"
                                    onclick="return addComment.moveForm( &quot;comment-31201&quot;, &quot;31201&quot;, &quot;respond&quot;, &quot;7&quot; )"
                                    aria-label="回复给林中有鬼">
                                        回复
                                    </a>
                                </div>
                            </div>
                        </li>
                        <!-- #comment-## -->
                    </ul>
                    <!-- .children -->
                </li>
                <!-- #comment-## -->
                <li class="comment even thread-odd thread-alt depth-1" id="comment-29850">
                    <div id="div-comment-29850" class="comment-body">
                        <div class="comment-author vcard clearfix">
                            <span class="fn">
                                128绿123
                            </span>
                            <div class="comment-meta commentmetadata">
                                <a href="https://www.mtyyw.com/7/#comment-29850">
                                    2010-04-02 8:18 下午
                                </a>
                            </div>
                        </div>
                        <div class="comment-content clearfix">
                            <img alt="" src="https://secure.gravatar.com/avatar/9d066b9068752e531fe1f66addb2837e?s=72&amp;d=monsterid&amp;r=g"
                            srcset="https://secure.gravatar.com/avatar/9d066b9068752e531fe1f66addb2837e?s=144&amp;d=monsterid&amp;r=g 2x"
                            class="avatar avatar-72 photo" height="72" width="72">
                            <p>
                                无意中发现的网站，总体浏览了一下，很是喜欢。
                                <br>
                                从第一首歌开始听。
                            </p>
                        </div>
                        <div class="reply">
                            <a rel="nofollow" class="comment-reply-link" href="https://www.mtyyw.com/7/?replytocom=29850#respond"
                            onclick="return addComment.moveForm( &quot;comment-29850&quot;, &quot;29850&quot;, &quot;respond&quot;, &quot;7&quot; )"
                            aria-label="回复给128绿123">
                                回复
                            </a>
                        </div>
                    </div>
                    <ul class="children">
                        <li class="comment odd alt depth-2" id="comment-29854">
                            <div id="div-comment-29854" class="comment-body">
                                <div class="comment-author vcard clearfix">
                                    <span class="fn">
                                        林中有鬼
                                    </span>
                                    <div class="comment-meta commentmetadata">
                                        <a href="https://www.mtyyw.com/7/#comment-29854">
                                            2010-04-02 9:41 下午
                                        </a>
                                    </div>
                                </div>
                                <div class="comment-content clearfix">
                                    <img alt="" src="https://secure.gravatar.com/avatar/c7aa99b7c1ed9b602eec8f8930531bfa?s=72&amp;d=monsterid&amp;r=g"
                                    srcset="https://secure.gravatar.com/avatar/c7aa99b7c1ed9b602eec8f8930531bfa?s=144&amp;d=monsterid&amp;r=g 2x"
                                    class="avatar avatar-72 photo" height="72" width="72">
                                    <p>
                                        哈哈，真会挖掘啊
                                    </p>
                                </div>
                                <div class="reply">
                                    <a rel="nofollow" class="comment-reply-link" href="https://www.mtyyw.com/7/?replytocom=29854#respond"
                                    onclick="return addComment.moveForm( &quot;comment-29854&quot;, &quot;29854&quot;, &quot;respond&quot;, &quot;7&quot; )"
                                    aria-label="回复给林中有鬼">
                                        回复
                                    </a>
                                </div>
                            </div>
                        </li>
                        <!-- #comment-## -->
                    </ul>
                    <!-- .children -->
                </li>
                <!-- #comment-## -->
                <li class="comment even thread-even depth-1" id="comment-26037">
                    <div id="div-comment-26037" class="comment-body">
                        <div class="comment-author vcard clearfix">
                            <span class="fn">
                                JK
                            </span>
                            <div class="comment-meta commentmetadata">
                                <a href="https://www.mtyyw.com/7/#comment-26037">
                                    2009-11-15 9:27 下午
                                </a>
                            </div>
                        </div>
                        <div class="comment-content clearfix">
                            <img alt="" src="https://secure.gravatar.com/avatar/0ac108bcd5e67cb1715fafdeeb9178fb?s=72&amp;d=monsterid&amp;r=g"
                            srcset="https://secure.gravatar.com/avatar/0ac108bcd5e67cb1715fafdeeb9178fb?s=144&amp;d=monsterid&amp;r=g 2x"
                            class="avatar avatar-72 photo" height="72" width="72">
                            <p>
                                喜欢麦田的界面和颜色 喜欢这里的音乐 喜欢这里的气氛 也喜欢这里的人 一直订阅 打开reader 听麦田里的旋律 有些是再熟悉不过的 有些是生命中错过的
                                有些是带有惊喜的 更多是给生活带来美好的~~~喜欢音乐:-)
                            </p>
                        </div>
                        <div class="reply">
                            <a rel="nofollow" class="comment-reply-link" href="https://www.mtyyw.com/7/?replytocom=26037#respond"
                            onclick="return addComment.moveForm( &quot;comment-26037&quot;, &quot;26037&quot;, &quot;respond&quot;, &quot;7&quot; )"
                            aria-label="回复给JK">
                                回复
                            </a>
                        </div>
                    </div>
                </li>
                <!-- #comment-## -->
                <li class="comment odd alt thread-odd thread-alt depth-1" id="comment-22669">
                    <div id="div-comment-22669" class="comment-body">
                        <div class="comment-author vcard clearfix">
                            <span class="fn">
                                小小番茄
                            </span>
                            <div class="comment-meta commentmetadata">
                                <a href="https://www.mtyyw.com/7/#comment-22669">
                                    2009-08-09 9:54 上午
                                </a>
                            </div>
                        </div>
                        <div class="comment-content clearfix">
                            <img alt="" src="https://secure.gravatar.com/avatar/fac8e10b908ea3ff645e6c0f62422f06?s=72&amp;d=monsterid&amp;r=g"
                            srcset="https://secure.gravatar.com/avatar/fac8e10b908ea3ff645e6c0f62422f06?s=144&amp;d=monsterid&amp;r=g 2x"
                            class="avatar avatar-72 photo" height="72" width="72">
                            <p>
                                不知不觉，麦田有3年了。谢谢老鬼一直默默的给我们的paradise.
                            </p>
                        </div>
                        <div class="reply">
                            <a rel="nofollow" class="comment-reply-link" href="https://www.mtyyw.com/7/?replytocom=22669#respond"
                            onclick="return addComment.moveForm( &quot;comment-22669&quot;, &quot;22669&quot;, &quot;respond&quot;, &quot;7&quot; )"
                            aria-label="回复给小小番茄">
                                回复
                            </a>
                        </div>
                    </div>
                </li>
                <!-- #comment-## -->
                <li class="comment even thread-even depth-1" id="comment-20467">
                    <div id="div-comment-20467" class="comment-body">
                        <div class="comment-author vcard clearfix">
                            <span class="fn">
                                king
                            </span>
                            <div class="comment-meta commentmetadata">
                                <a href="https://www.mtyyw.com/7/#comment-20467">
                                    2009-06-21 2:23 上午
                                </a>
                            </div>
                        </div>
                        <div class="comment-content clearfix">
                            <img alt="" src="https://secure.gravatar.com/avatar/eb2bcfa60dcd891d4a9707ac9fc3176c?s=72&amp;d=monsterid&amp;r=g"
                            srcset="https://secure.gravatar.com/avatar/eb2bcfa60dcd891d4a9707ac9fc3176c?s=144&amp;d=monsterid&amp;r=g 2x"
                            class="avatar avatar-72 photo" height="72" width="72">
                            <p>
                                真的很喜歡麥田，所以決定重新從第一首歌開始聽，哈哈~
                            </p>
                        </div>
                        <div class="reply">
                            <a rel="nofollow" class="comment-reply-link" href="https://www.mtyyw.com/7/?replytocom=20467#respond"
                            onclick="return addComment.moveForm( &quot;comment-20467&quot;, &quot;20467&quot;, &quot;respond&quot;, &quot;7&quot; )"
                            aria-label="回复给king">
                                回复
                            </a>
                        </div>
                    </div>
                </li>
                <!-- #comment-## -->
                <li class="comment odd alt thread-odd thread-alt depth-1" id="comment-10934">
                    <div id="div-comment-10934" class="comment-body">
                        <div class="comment-author vcard clearfix">
                            <span class="fn">
                                vivian
                            </span>
                            <div class="comment-meta commentmetadata">
                                <a href="https://www.mtyyw.com/7/#comment-10934">
                                    2008-12-13 11:18 下午
                                </a>
                            </div>
                        </div>
                        <div class="comment-content clearfix">
                            <img alt="" src="https://secure.gravatar.com/avatar/81ddea3b82dd54c87d1da7ebe8ec5896?s=72&amp;d=monsterid&amp;r=g"
                            srcset="https://secure.gravatar.com/avatar/81ddea3b82dd54c87d1da7ebe8ec5896?s=144&amp;d=monsterid&amp;r=g 2x"
                            class="avatar avatar-72 photo" height="72" width="72">
                            <p>
                                thanks soooooo much for giving us sooooooo many wonderful songs .....xoxo
                                <br>
                                i love it
                                <br>
                                嘿嘿嘿
                            </p>
                        </div>
                        <div class="reply">
                            <a rel="nofollow" class="comment-reply-link" href="https://www.mtyyw.com/7/?replytocom=10934#respond"
                            onclick="return addComment.moveForm( &quot;comment-10934&quot;, &quot;10934&quot;, &quot;respond&quot;, &quot;7&quot; )"
                            aria-label="回复给vivian">
                                回复
                            </a>
                        </div>
                    </div>
                </li>
                <!-- #comment-## -->
                <li class="comment even thread-even depth-1" id="comment-9339">
                    <div id="div-comment-9339" class="comment-body">
                        <div class="comment-author vcard clearfix">
                            <span class="fn">
                                流浪麦田
                            </span>
                            <div class="comment-meta commentmetadata">
                                <a href="https://www.mtyyw.com/7/#comment-9339">
                                    2008-11-08 9:05 下午
                                </a>
                            </div>
                        </div>
                        <div class="comment-content clearfix">
                            <img alt="" src="https://secure.gravatar.com/avatar/1e8fd3850b80405daba396da7c14e718?s=72&amp;d=monsterid&amp;r=g"
                            srcset="https://secure.gravatar.com/avatar/1e8fd3850b80405daba396da7c14e718?s=144&amp;d=monsterid&amp;r=g 2x"
                            class="avatar avatar-72 photo" height="72" width="72">
                            <p>
                                天使的婚礼，不够浪漫和甜蜜
                            </p>
                        </div>
                        <div class="reply">
                            <a rel="nofollow" class="comment-reply-link" href="https://www.mtyyw.com/7/?replytocom=9339#respond"
                            onclick="return addComment.moveForm( &quot;comment-9339&quot;, &quot;9339&quot;, &quot;respond&quot;, &quot;7&quot; )"
                            aria-label="回复给流浪麦田">
                                回复
                            </a>
                        </div>
                    </div>
                </li>
                <!-- #comment-## -->
                <li class="comment odd alt thread-odd thread-alt depth-1" id="comment-7420">
                    <div id="div-comment-7420" class="comment-body">
                        <div class="comment-author vcard clearfix">
                            <span class="fn">
                                小Q
                            </span>
                            <div class="comment-meta commentmetadata">
                                <a href="https://www.mtyyw.com/7/#comment-7420">
                                    2008-09-15 9:33 下午
                                </a>
                            </div>
                        </div>
                        <div class="comment-content clearfix">
                            <img alt="" src="https://secure.gravatar.com/avatar/27aac2101dd6f419a6a509b77849a047?s=72&amp;d=monsterid&amp;r=g"
                            srcset="https://secure.gravatar.com/avatar/27aac2101dd6f419a6a509b77849a047?s=144&amp;d=monsterid&amp;r=g 2x"
                            class="avatar avatar-72 photo" height="72" width="72">
                            <p>
                                今天很有收获哦 挖到一个好网站
                                <br>
                                谢谢老鬼
                            </p>
                        </div>
                        <div class="reply">
                            <a rel="nofollow" class="comment-reply-link" href="https://www.mtyyw.com/7/?replytocom=7420#respond"
                            onclick="return addComment.moveForm( &quot;comment-7420&quot;, &quot;7420&quot;, &quot;respond&quot;, &quot;7&quot; )"
                            aria-label="回复给小Q">
                                回复
                            </a>
                        </div>
                    </div>
                </li>
                <!-- #comment-## -->
                <li class="comment even thread-even depth-1" id="comment-3400">
                    <div id="div-comment-3400" class="comment-body">
                        <div class="comment-author vcard clearfix">
                            <span class="fn">
                                笑呵呵
                            </span>
                            <div class="comment-meta commentmetadata">
                                <a href="https://www.mtyyw.com/7/#comment-3400">
                                    2008-05-27 3:20 下午
                                </a>
                            </div>
                        </div>
                        <div class="comment-content clearfix">
                            <img alt="" src="https://secure.gravatar.com/avatar/9a07b7cd0c8c8e41b7d434b49cd8fe57?s=72&amp;d=monsterid&amp;r=g"
                            srcset="https://secure.gravatar.com/avatar/9a07b7cd0c8c8e41b7d434b49cd8fe57?s=144&amp;d=monsterid&amp;r=g 2x"
                            class="avatar avatar-72 photo" height="72" width="72">
                            <p>
                                这音乐听起来让人有点紧张，难道天使的婚礼是这个气氛的？
                            </p>
                        </div>
                        <div class="reply">
                            <a rel="nofollow" class="comment-reply-link" href="https://www.mtyyw.com/7/?replytocom=3400#respond"
                            onclick="return addComment.moveForm( &quot;comment-3400&quot;, &quot;3400&quot;, &quot;respond&quot;, &quot;7&quot; )"
                            aria-label="回复给笑呵呵">
                                回复
                            </a>
                        </div>
                    </div>
                </li>
                <!-- #comment-## -->
                <li class="comment odd alt thread-odd thread-alt depth-1" id="comment-3038">
                    <div id="div-comment-3038" class="comment-body">
                        <div class="comment-author vcard clearfix">
                            <span class="fn">
                                三门岛主
                            </span>
                            <div class="comment-meta commentmetadata">
                                <a href="https://www.mtyyw.com/7/#comment-3038">
                                    2008-05-13 1:49 下午
                                </a>
                            </div>
                        </div>
                        <div class="comment-content clearfix">
                            <img alt="" src="https://secure.gravatar.com/avatar/ce051971a8a57547a892af512c462c8a?s=72&amp;d=monsterid&amp;r=g"
                            srcset="https://secure.gravatar.com/avatar/ce051971a8a57547a892af512c462c8a?s=144&amp;d=monsterid&amp;r=g 2x"
                            class="avatar avatar-72 photo" height="72" width="72">
                            <p>
                                音乐很好听
                            </p>
                        </div>
                        <div class="reply">
                            <a rel="nofollow" class="comment-reply-link" href="https://www.mtyyw.com/7/?replytocom=3038#respond"
                            onclick="return addComment.moveForm( &quot;comment-3038&quot;, &quot;3038&quot;, &quot;respond&quot;, &quot;7&quot; )"
                            aria-label="回复给三门岛主">
                                回复
                            </a>
                        </div>
                    </div>
                </li>
                <!-- #comment-## -->
            </ul>
            <div id="respond" class="comment-respond">
                <h3 id="reply-title" class="comment-reply-title">
                    发表评论
                    <small>
                        <a rel="nofollow" id="cancel-comment-reply-link" href="/7/#respond" style="display:none;">
                            取消回复
                        </a>
                    </small>
                </h3>
                <form action="https://www.mtyyw.com/wp-comments-post.php" method="post"
                id="commentform" class="comment-form">
                    <p class="comment-notes">
                        <span id="email-notes">
                            电子邮件地址不会被公开。
                        </span>
                        必填项已用
                        <span class="required">
                            *
                        </span>
                        标注
                    </p>
                    <p class="comment-form-comment">
                        <label for="comment">
                            评论
                        </label>
                        <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525"
                        required="required">
                        </textarea>
                    </p>
                    <p class="comment-form-author">
                        <label for="author">
                            姓名
                            <span class="required">
                                *
                            </span>
                        </label>
                        <input id="author" name="author" type="text" value="" size="30" maxlength="245"
                        required="required">
                    </p>
                    <p class="comment-form-email">
                        <label for="email">
                            电子邮件
                            <span class="required">
                                *
                            </span>
                        </label>
                        <input id="email" name="email" type="text" value="" size="30" maxlength="100"
                        aria-describedby="email-notes" required="required">
                    </p>
                    <p class="form-submit">
                        <input name="submit" type="submit" id="submit" class="submit" value="发表评论">
                        <input type="hidden" name="comment_post_ID" value="7" id="comment_post_ID">
                        <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                    </p>
                    <p style="display: none;">
                        <input type="hidden" id="akismet_comment_nonce" name="akismet_comment_nonce"
                        value="ebf58f7e8c">
                    </p>
                    <p style="display: none;">
                    </p>
                    <input type="hidden" id="ak_js" name="ak_js" value="1539912618917">
                </form>
            </div>
            <!-- #respond -->
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
<!-- 百度分享 js 开始 -->
<script>
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
<!-- 百度分享 js 结束 -->

@stop