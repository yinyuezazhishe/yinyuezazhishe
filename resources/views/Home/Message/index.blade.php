@extends('Home.Public.layout')

@section('content')


<div id="wrap" class="container clearfix">
<section id="content" class="primary" role="main">
    <div id="post-389" class="post-389 page type-page status-publish hentry">
        <div class="post-389">
    <div class="entry clearfix">
        <div class="page-title entry-title">
            留言板
        </div>
        <div class="z-panel-body" style="padding: 15px;">
            <b>
                主人寄语
            </b>
            <hr>
                <img src="/homes/images/ai.jpeg" class="img-responsive" style="margin-left: auto; margin-right: auto;">
        </div>
            <h5 id="message-form" style="padding: 5px 5px;">
                发表您的留言
            </h5>

            <form action="{{ route('messages.store') }}" method="post" id="commentform" class="comment-form">
                 {{ csrf_field() }}
                <div class="form-group">
                    <textarea id="comment" name="content" cols="110" rows="8" maxlength="65525" placeholder="不超过120字" class="form-control">
                    </textarea>
                </div>
                <div id="warning" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                class="modal fade">
                    <div role="document" class="modal-dialog">
                       <!--  <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                                    <span aria-hidden="true">
                                        ×
                                    </span>
                                </button>
                                <h4 id="myModalLabel" class="modal-title">
                                    提示：
                                </h4>
                            </div>
                            <div class="modal-body">
                                请勿回复类似 “123” 这样的无意义的留言哦，否则将会被删除，谢谢~
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn btn-default">
                                    取消
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    确认
                                </button>
                            </div>
                        </div> -->
                    </div>
                </div>
                @if(Auth::check())
                <button style="width:80px;height:50px;" type="submit" class="btn btn-default">发表</button>
                @else
               <button style="width:80px;height:50px;" class="btn btn-primary weidengru1 lgtanchu shenyinclick" type="button">登陆后留言</button>
                @endif
            </form>

            <!-- 留言列表 -->
            <p style="padding-top: 30px;">
                <b>
                    留言
                </b></p>
            <hr>
        @foreach ($message as $message)
            <div class="z-comment">
                @if( $message->hid == 1)
                <p>
                    <b>
                        {{$message->user->name}}
                    </b>
                @else
                    <span style="float: right;">
                        {{ $message->id  }} 楼
                    </span>
                </p>
                @endif
                <p>
                    {{ $message->content }}
                </p>
                <p>
                    {{ $message->created_at }}
                    @if (Auth::check())
                        @if (Auth::id() === 1)
                            <a href="javascript:;" style="float:right" id="replyButton" data-message-id="{{ $message->id }}">回复</a>
                        @endif
                    @endif
                </p>
                <!-- 回复 -->
                <div class="reply" style="margin-left: 30px;">
                    <div id="replyLists1008" class="replyList">
                    </div>
                </div>
                <hr>
            </div>
        @endforeach

            <a href="/Home/message">
                我要留言
            </a>
        </div>
    </div>

<script>
$(document).ready(function(){
    // //显示回复框函数
    // $('a#replyButton').click(function(){
    //     //获取点击的 message id
    //     var message_id = $(this).attr('data-message-id');

    //     //显示相应的回复表单
    //     $('#replyForm' + message_id).show();
    // });
    //AJAX 回复
    $('a#replyAJAX').click(function(){
        //获取点击的 message id
        var message_id = $(this).attr('data-message-id');

        //获取表单值
        var form_data = $('#replyForm' + message_id).serialize();

        //AJAX 存储
        $.ajax({
            url: "{{ route('remessages.store') }}",
            type: "post",
            data: form_data,
            success: function(res){
                console.log(res);
                //刷新页面
                location.reload();
            },
            error: function(err){
                console.log(err.responseText);
            }
        });
    });

})
</script>
</section>

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
                     @foreach ($advertising as $k=>$v)
                    <aside id="text-8" class="widget widget_text clearfix">
                         <h3 class="widgettitle">
                            <span>
                                {{$v->title}}
                            </span>
                        </h3>
                        <div class="textwidget">
                            <a href="{{$v->links}}" title="{{$v->title}}" rel="nofollow" target="_blank">
                                <img src="{{$v->picture}}"
                                 width="350" height="337" class="alignnone size-full wp-image-11045"
                                />
                            </a>
                        </div>
                    </aside>
                    @endforeach
                </section>
</div>

@stop