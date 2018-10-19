@extends('Home.Public.layout')


@section('content')

<div id="comments">
    <h3 class="comments-title">
        <span>
            {{$num}} 条评论
        </span>
    </h3>
    <ul class="commentlist">
        <!-- #comment-## -->
        @foreach($user as $k=>$v)
        <li class="comment even thread-odd thread-alt depth-1" id="comment">
            <div id="div-comment-88618" class="comment-body">
                <div class="comment-author vcard clearfix">
                    <span class="fn">
                        {{$v->users['username']}}
                    </span>
                    <div class="comment-meta commentmetadata">
                        <a href="https://www.mtyyw.com/19564/#comment-88618">
                            {{date('Y-m-d H:i:s A',$v->addtime)}}
                        </a>
                    </div>
                </div>
                <div class="comment-content clearfix">
                    <img alt="" src="{{$v->users['face']}}"class="avatar avatar-72 photo" height="72" width="72">
                    <p>
                        {{$v->content}}
                    </p>
                </div>
                <div class="reply">
                    <a rel="nofollow" class="comment-reply-link" href="">
                        回复
                    </a>
                </div>
            </div>
        </li>
        
        @endforeach
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
                <textarea id="discuss" name="comment" cols="45" rows="8" maxlength="65525"
                required="required"></textarea>
            </p>
            <p class="form-submit">
                <input name="submit" type="submit" id="submit" class="submit" value="发表评论">
                <input type="hidden" name="did" value="1" id="uid">
                <input type="hidden" name="uid" value="1" id="did">
            </p>
            <p style="display: none;">
            </p>
            <p style="display: none;">
            </p>
        </form>
    </div>
    <!-- #respond -->
</div>

@stop

@section('js')
    
    <script type="text/javascript">

        var flag = false;

        $('#submit').click(function(){
            var comment = $('#discuss').val();

            $('#discuss').val('');

            var uid = $('#uid').val();

            var did = $('#did').val();

            $.post('/home/comment',{'content':comment,'hid':uid,'did':did,'_token':'{{ csrf_token() }}'},

                function(data){
                    
                    var New_li = Create_li(data['face'],data['username'],data['addtime'],comment);

                    $('.commentlist').prepend(New_li);

            },'json');

            return false;
        });

        function Create_li(face,username,addtime,content){
            var li = $(`<li class="comment even thread-odd thread-alt depth-1" id="comment-88618">
                            <div id="div-comment-88618" class="comment-body">
                                <div class="comment-author vcard clearfix">
                                    <span class="fn">
                                        `+username+`
                                    </span>
                                    <div class="comment-meta commentmetadata">
                                        <a href="https://www.mtyyw.com/19564/#comment-88618">
                                            `+addtime+`
                                        </a>
                                    </div>
                                </div>
                                <div class="comment-content clearfix">
                                    <img alt="" src="`+face+`"
                                    class="avatar avatar-72 photo" height="72" width="72">
                                    <p>
                                        `+content+`
                                    </p>
                                </div>
                                <div class="reply">
                                    <a rel="nofollow" class="comment-reply-link" href="https://www.mtyyw.com/19564/?replytocom=88618#respond"
                                    onclick="return addComment.moveForm( &quot;comment-88618&quot;, &quot;88618&quot;, &quot;respond&quot;, &quot;19564&quot; )"
                                    aria-label="回复给懒懒的">
                                        回复
                                    </a>
                                </div>
                            </div>
                        </li>`);

            return li;
        }

        $('.comment-reply-link').click(function(){
            
            $('#cancel-comment-reply-link').css('display','block');

            $respond = $('#respond');

            $(this).parents('li').after($respond);

            $name = $(this).parents('li').find('.fn').text();

            $('.as').text('回复'+$name);

            return false;
        });

        $('#cancel-comment-reply-link').click(function(){

            $(this).css('display','none');

            $('.commentlist').after($('#respond'));

            $('.as').text('发布评论');

            return false;
        });

    </script>

@stop