@extends('Home.Public.layout')

@section('title',$title)

@section('content')

<div id="wrap" class="container clearfix">
    <section id="content" class="primary" role="main">
        @foreach($d_content as $k => $v)
        <article id="post-13827" class="content-excerpt post-19689 post type-post status-publish format-standard has-post-thumbnail hentry category-video category-popmusic tag-2853 tag-3298 tag-3472">
            <h2 class="post-title entry-title">
                <a href="/home/details/{{$v->id}}" rel="bookmark">
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
                    <a href="/home/details/{{$v->details_content->id}}" title="{{$v->details_content->title}}">
                        <img style="width: 350px; height: auto;" src="{{$v->details_content->picstream}}"
                        align="absmiddle" />
                        <br />
                        <div style="width: 700px;">
                            <span style="color: black;">简 介:</span> &nbsp;&nbsp; <span style="letter-spacing: 3.5px; line-height: 30px;">{{$v->details_content->describe}}
                            </span>
                        </span>
                        </div>
                    </a>
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
                            </a>
                        </li>
                    </ul>
                </span>
            </div>
        </article>
        @endforeach
        <style>
            /*分页样式*/  
            .pagination{text-align:center;margin-bottom: 20px; line-height:37px;}  
            .pagination li{margin:0px 10px; width:41.75px; height:40px; border:1px solid #ddd;display: inline-block;; cursor: pointer;}
            .pagination .active{margin-top: 20px;background-color: #0e90d2;color: #fff;border-radius: 5px} 
            .pagination .active:hover{background-color: #23abf0;color: #fff;} 
            .pagination li:hover{background-color:#ddd;}
            .pagination a{width:41.75px; height:40px;display:block; text-decoration:none;}
        </style>
        <div> {{$d_content->links()}} </div>
        <div style='clear:both;'></div>
    </section>
@stop