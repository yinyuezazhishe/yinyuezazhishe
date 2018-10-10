@extends('Home.Public.layout')


@section('content')
<!-- <link href="/admins/css/bootstrap.min.css" rel="stylesheet">
<link href="/admins/css/bootstrap-fileinput.css" rel="stylesheet"> -->
<div id="wrap" class="container clearfix template-fullwidth">
    <section id="content-full" class="clearfix" role="main">
        <div class="post-11062 page type-page status-publish hentry">
            <h2 class="page-title">
                <span>
                    文字链接
                </span>
            </h2>
            <div class="entry clearfix">
                <ul>
                	@foreach($fontlinks as $k=>$v)
                    <li>
                        <a href="http://{{$v->links}}" target="_blank">
                            {{$v->title}}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="post-11062 page type-page status-publish hentry">
            <h2 class="page-title">
                <span>
                    图片链接
                </span>
            </h2>
            <div class="entry clearfix">
                <ul style="list-style:none;">
                	@foreach($imglinks as $k=>$v)                	
	                    <li style="width:30%;margin:10px;height:auto;display:inline-block;">
	                    	<div class="fileinput-new thumbnail" style="width: 200px;height: auto;max-height:130px;margin:0px auto;line-height:130px; ">
		                        <a href="http://{{$v->links}}" target="_blank" title="{{$v->title}}">
		                            	<img style="width: 100%;height: auto;max-height: 120px;vertical-align: middle;" src="{{$v->picture}}" alt="" />
		                        </a>
	                        </div>
	                    </li>                	
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
</div>
@stop