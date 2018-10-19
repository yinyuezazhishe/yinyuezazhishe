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
                            <span>
                                2 条评论
                            </span>
                        </h3>
                        <ul class="commentlist">
                            <li class="comment even thread-even depth-1" id="comment-86498">
                                <div id="div-comment-86498" class="comment-body">
                                    <div class="comment-author vcard clearfix">
                                        <span class="fn">
                                            batooblessed
                                        </span>
                                        <div class="comment-meta commentmetadata">
                                            <a href="https://www.mtyyw.com/17838/#comment-86498">
                                                2017-09-20 11:05 下午
                                            </a>
                                        </div>
                                    </div>
                                    <div class="comment-content clearfix">
                                        <img alt='' src='https://secure.gravatar.com/avatar/bde67f3bb62ffcec7ed18c6a0703daa3?s=72&#038;d=monsterid&#038;r=g'
                                        srcset='https://secure.gravatar.com/avatar/bde67f3bb62ffcec7ed18c6a0703daa3?s=144&#038;d=monsterid&#038;r=g 2x'
                                        class='avatar avatar-72 photo' height='72' width='72' />
                                        <p>
                                            配图好看
                                        </p>
                                    </div>
                                    <div class="reply">
                                        <a rel='nofollow' class='comment-reply-link' href='https://www.mtyyw.com/17838/?replytocom=86498#respond'
                                        onclick='return addComment.moveForm( "comment-86498", "86498", "respond", "17838" )'
                                        aria-label='回复给batooblessed'>
                                            回复
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <!-- #comment-## -->
                            <li class="comment odd alt thread-odd thread-alt depth-1" id="comment-86132">
                                <div id="div-comment-86132" class="comment-body">
                                    <div class="comment-author vcard clearfix">
                                        <span class="fn">
                                            蓝月光
                                        </span>
                                        <div class="comment-meta commentmetadata">
                                            <a href="https://www.mtyyw.com/17838/#comment-86132">
                                                2017-07-29 8:56 上午
                                            </a>
                                        </div>
                                    </div>
                                    <div class="comment-content clearfix">
                                        <img alt='' src='https://secure.gravatar.com/avatar/9dc0f2c8aa46b7eaf8c6aefb2a940b01?s=72&#038;d=monsterid&#038;r=g'
                                        srcset='https://secure.gravatar.com/avatar/9dc0f2c8aa46b7eaf8c6aefb2a940b01?s=144&#038;d=monsterid&#038;r=g 2x'
                                        class='avatar avatar-72 photo' height='72' width='72' />
                                        <p>
                                            好听！希望来一场清清扬扬的小雨
                                        </p>
                                    </div>
                                    <div class="reply">
                                        <a rel='nofollow' class='comment-reply-link' href='https://www.mtyyw.com/17838/?replytocom=86132#respond'
                                        onclick='return addComment.moveForm( "comment-86132", "86132", "respond", "17838" )'
                                        aria-label='回复给蓝月光'>
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
                                    <a rel="nofollow" id="cancel-comment-reply-link" href="/17838/#respond"
                                    style="display:none;">
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
                                    required='required' />
                                </p>
                                <p class="comment-form-email">
                                    <label for="email">
                                        电子邮件
                                        <span class="required">
                                            *
                                        </span>
                                    </label>
                                    <input id="email" name="email" type="text" value="" size="30" maxlength="100"
                                    aria-describedby="email-notes" required='required' />
                                </p>
                                <p class="form-submit">
                                    <input name="submit" type="submit" id="submit" class="submit" value="发表评论"
                                    />
                                    <input type='hidden' name='comment_post_ID' value='17838' id='comment_post_ID'
                                    />
                                    <input type='hidden' name='comment_parent' id='comment_parent' value='0'
                                    />
                                </p>
                                <p style="display: none;">
                                    <input type="hidden" id="akismet_comment_nonce" name="akismet_comment_nonce"
                                    value="ba2adcdaff" />
                                </p>
                                <p style="display: none;">
                                    <input type="hidden" id="ak_js" name="ak_js" value="22" />
                                </p>
                            </form>
                        </div>
                        <!-- #respond -->

    </section>
@stop