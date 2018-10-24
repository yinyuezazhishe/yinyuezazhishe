@extends('Home.Public.layout')

@section('title',$title)

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

            <form action="/Home/message" method="post" id="commentform" class="comment-form">
                 {{ csrf_field() }}
                <div class="form-group">
                    <textarea id="comment" name="content" cols="110" rows="8" maxlength="65525" placeholder="不超过120字" class="form-control"></textarea>
                </div>
                @if(empty(session('homeuser')))
               <input style="display: block;border: 0;margin-top: 1em;padding: 1em 4em;text-decoration: none;color: #fff;background: #55a753;" type="submit" class="btn publish btn-default " value="请登录后留言">
               @else
               <input name="submit" type="submit" id="submit" class="submit publish" value="发表"> 
             
               @endif
            </form>
            <br>
            <!-- 留言列表 -->
        @foreach ($messages as $k => $v)

            <li style="list-style:none;" class="comment even thread-even depth-1" id="comment-88322">
                <div id="div-comment-88322" calss="comment-body">
                    <div class="comment-author vcard clearfix">
                        <span style="cursor:pointer;" class="fn">{{$v->homeuser['username']}}</span>
                        <div class="comment-meta commentmetadata">
                         <a href="">{{date('Y-m-d H:i:s ',$v->addtime)}}</a>
                     </div>
                        <a href="" style="float: right;">{{ $v->id  }} 楼</a>
                    </div>

                    <div style="cursor:pointer;" class="comment-content clearfix">
                        <img  src="{{$v->homeuser['face']}}" class="avatar avatar-72 photo" height="72" width="72" alt="头像">&nbsp;&nbsp;{{ $v->content }}
                    </div>
                    <br>
                </div>
            </li>
        @endforeach
            <a href="/Home/message">
                我要留言
            </a>
        </div>
         <a href="/Home/message/{{$v->id}}" class="more-link">
                查看全部留言
          </a>
    </div>
    </div>
<script>

$(document).ready(function(){
    //显示回复框函数
    // $('a#replyButton').click(function(){
        //获取点击的 message id
        var message_id = $(this).attr('data-message-id');

        //显示相应的回复表单
        // $('#replyForm' + message_id).show();
    // });
        // console.log($('#comment').value());


    //AJAX 留言
    $('.publish').click(function(){

        // console.log(this);
        @if(empty(session('homeuser')))
            swal('对不起', '您还没有登录, 请登录后留言', 'error');
             $('.zhuce').addClass('bounceOutUp').fadeOut();
                setTimeout(function () {
                    $('.mf_denglu').removeClass('bounceOutUp').addClass('animated bounceInDown').fadeIn();
                }, 400);
            return false;
        @endif
        var comment = $('#comment').val();
        if(comment == ''){
            swal('对不起', '留言不能为空', 'error');
            return false;
        }
        var pub = $(this);
        //AJAX 存储
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/Home/message",
            type: "POST",
            data: {content: comment},
            success: function(data){
                location.reload();
                if (data == 0) {
                    swal('恭喜你', '留言成功', 'success');
                } else if (data == 1) {
                    swal('对不起', '留言失败', 'error');
                } else if (data == 2) {
                    swal('对不起', '您还没有登录, 请登录后留言', 'error');
                    $('.zhuce').addClass('bounceOutUp').fadeOut();
                    setTimeout(function () {
                        $('.mf_denglu').removeClass('bounceOutUp').addClass('animated bounceInDown').fadeIn();
                    }, 400);
                } else if (data == 3) {
                    swal('对不起', '内容不能为空', 'error');
                } else if (data ==4) {
                    swal('对不起', '内容不少于10个字符', 'error');
                }
            },
            error: function(err){

                swal('对不起', '留言失败', '请登录后留言', 'error');
                $('.zhuce').addClass('bounceOutUp').fadeOut();
                    setTimeout(function () {
                 $('.mf_denglu').removeClass('bounceOutUp').addClass('animated bounceInDown').fadeIn();
                }, 400);
            },

        });

        return false;
    });

});
</script>

</section>

            <script>
               function closed()
               {
                
                var divs = document.getElementById('divs');
                divs.style.cursor = 'hand';
                divs.style.display = 'none';
               }

            </script>
@stop