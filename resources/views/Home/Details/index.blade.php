@extends('Home.Public.layout')

@section('title',$title)

@section('content')

<div id="wrap" class="container clearfix">
    <section id="content" class="primary" role="main">
        <article class="post-17838 post type-post status-publish format-standard has-post-thumbnail hentry category-feizhuliuyinyue category-wenzi tag-bebe tag-1393 tag-2716 tag-3091 tag-1194">
            <h2 class="post-title entry-title">
                {{$d_content->title}}
            </h2>
            <div class="postmeta">
                <span class="meta-date">
                    <a href="https://www.mtyyw.com/17838/" title="8:57 下午" rel="bookmark">
                        <time class="entry-date published updated" datetime="2017-07-25T20:57:38+00:00">
                            {{date('Y-m-d',$d_content->addtime)}}
                        </time>
                    </a>
                </span>
                <span class="meta-author sep">
                    <span class="author vcard">
                        <a class="fn" href="https://www.mtyyw.com/author/admin/" title="View all posts by 林中有鬼"
                        rel="author">
                            {{$d_content->author}}
                        </a>
                    </span>
                </span>
                <span class="meta-comments sep">
                    <a href="https://www.mtyyw.com/17838/#comments">
                        <span class="nums">{{$num}}</span>评论
                    </a>
                </span>
                <span class="meta-comments sep">
                    1,019次
                </span>
            </div>
            <div class="entry clearfix">
                <blockquote>
                    <p>
                        {{$d_content->saying}}
                    </p>
                </blockquote>
                <p>
                    <img src="{{$d_content->picstream}}" alt="bebe"
                    width="400" height="400" class="alignnone size-full wp-image-17840" sizes="(max-width: 400px) 100vw, 400px" />
                    <br />
                    简介:{{$d_content->describe}}
                    <br />
                    
                </p>
                {!!$d_content->content!!}
            </div>
        </article>

        <!-- Begin Yuzo -->
                    <div class='yuzo_related_post style-1' data-version='5.12.81'>
                        <!-- with result -->
                        <div class='yuzo_clearfixed yuzo__title'>
                            <h4 class="post-title entry-title">
                                猜你喜欢
                            </h4>
                        </div>
                        <div class='yuzo_wraps'>
                            <div class="relatedthumb relatedpost-18859 " style="width:230px;float:left;overflow:hidden;">
                                <a href="https://www.mtyyw.com/18859/">
                                    <div class="yuzo-img-wrap ">
                                        <div class="yuzo-img" style="background:url('https://www.mtyyw.com/wp-content/uploads/2018/05/La-mala-costumbre-360x360.jpg') 50% 50% no-repeat;width: 230px;;max-width:100%;height:160px;margin-bottom: 5px;background-size: cover; ">
                                        </div>
                                    </div>
                                    <span class="yuzo__text--title" style="font-size:13px;">
                                        【母亲节歌曲推荐】我们有个坏习惯，对于亲密的人不愿去表达...
                                    </span>
                                </a>
                            </div>
                            <div class="relatedthumb relatedpost-18562 " style="width:230px;float:left;overflow:hidden;">
                                <a href="https://www.mtyyw.com/18562/">
                                    <div class="yuzo-img-wrap ">
                                        <div class="yuzo-img" style="background:url('https://www.mtyyw.com/wp-content/uploads/2018/03/Armik-360x360.jpg') 50% 50% no-repeat;width: 230px;;max-width:100%;height:160px;margin-bottom: 5px;background-size: cover; ">
                                        </div>
                                    </div>
                                    <span class="yuzo__text--title" style="font-size:13px;">
                                        一个普通人
                                    </span>
                                </a>
                            </div>
                            <div class="relatedthumb relatedpost-18529 " style="width:230px;float:left;overflow:hidden;">
                                <a href="https://www.mtyyw.com/18529/">
                                    <div class="yuzo-img-wrap ">
                                        <div class="yuzo-img" style="background:url('https://www.mtyyw.com/wp-content/uploads/2018/03/Carla-Morrison-mtyyw-360x360.jpg') 50% 50% no-repeat;width: 230px;;max-width:100%;height:160px;margin-bottom: 5px;background-size: cover; ">
                                        </div>
                                    </div>
                                    <span class="yuzo__text--title" style="font-size:13px;">
                                        说是总有那么一天，你的身体成了我极熟的地方...
                                    </span>
                                </a>
                            </div>
                        </div>
                        <!-- end wrap -->
                    </div>
                    <!-- End Yuzo :) -->
                    <div id="comments">
                        <h3 class="comments-title">
                            <span id="nums" class="nums">{{$num}}</span>条评论
                            
                        </h3>
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
                                <p class="form-submit">
                                    <input name="submit" type="submit" id="submit" class="submit" value="发表评论">
                                    <input type="hidden" id="did" value="{{$d_content->id}}">
                                    <input type="hidden" name="uid" value="{{session('homeuser')->id}}" id="uid">
                                </p>
                                <p style="display: none;">
                                </p>
                                <p style="display: none;">
                                </p>
                            </form>
                        </div>
                        <!-- #respond -->
                    </div>
                    
    </section>
@stop

@section('js')
    
    <script type="text/javascript">

        var id

        var cid = '';

        var flag = 'comment';

        $('#submit').click(function(){

            var sub = $(this);

            var comment = $('#discuss').val();

            if (comment == '') {return false}

            $('#discuss').val('');

            var uid = $('#uid').val();

            var did = $('#did').val();

            if(flag == 'comment'){

                $.post('/home/comment',{'content':comment,'hid':uid,'did':did,'_token':'{{ csrf_token() }}'},

                function(data){

                    console.log(data);

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
                    // var flag = true;
                    // console.log(data);
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

            $(this).after($respond);

            name = $(this).parent().prev().prev().find('.fn').text();

            $('.as').text('回复'+name);

            return false;
        });
       

        $('#cancel-comment-reply-link').click(function(){

            flag = 'comment';

            cid = '';

            $(this).css('display','none');

            $('.commentlist').after($('#respond'));

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

            $('.commentlist').after($('#respond'));
        }
    </script>

@stop