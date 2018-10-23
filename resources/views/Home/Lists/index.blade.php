@extends('Home.Public.layout')

@section('title',$title)

@section('content')

<div id="wrap" class="container clearfix">
    <section id="content" class="primary" role="main">
        @foreach($d_content as $k => $v)
        <article id="post-13827" class="content-excerpt post-19689 post type-post status-publish format-standard has-post-thumbnail hentry category-video category-popmusic tag-2853 tag-3298 tag-3472">
            <h2 class="post-title entry-title">
                <a href="https://www.mtyyw.com/13827/" rel="bookmark">
                    {{$v->title}}
                </a>
            </h2>
            <div class="postmeta">
                {{date('Y-m-d',$v->addtime)}}
            </div>
            <div class="entry clearfix">
                <blockquote>
                    <p>
                        {{$v->saying}}
                    </p>
                </blockquote>
                <p>
                    <img class="" src="{{$v->picstream}}"
                    align="absmiddle" />
                    <br />
                    简介:{{$v->describe}}
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
    </section>
@stop