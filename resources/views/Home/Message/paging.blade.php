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
            <br>
            <!-- 留言列表 -->
        @foreach ($paging as $k => $v)

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
                        <img  src="{{$v->homeuser['face']}}" class="avatar avatar-72 photo" height="72" width="72" alt="头像"><p>&nbsp;&nbsp;<br>{{ $v->content }}<br></p>
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
                查看更多
          </a>
    </div>

</div>
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