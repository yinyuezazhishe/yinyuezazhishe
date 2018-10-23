@extends('Home.Public.layout')

@section('title','该活动已结束或页面不存在')


@section('contents')
<style type="text/css">
	
	.panel {
		border-color: #5ca05f;
	    position: relative;
		min-height: 1px;
		margin: 90px auto;
		width: 550px;
	}

	.panel-info>.panel-heading {
	    background-color: #5ca05f;
	    border-color: #5ca05f;
	    color: #fff;
	    text-align: center;

	}

	.panel-heading {
	    padding: 10px 15px;
	    border-bottom: 1px solid transparent;
	    border-top-left-radius: 3px;
	    border-top-right-radius: 3px;
	}

	p {
	    display: block;
	    margin-block-start: 1em;
	    margin-block-end: 1em;
	    margin-inline-start: 0px;
	    margin-inline-end: 0px;
	    letter-spacing: 2px;
	    font-size: 15px;
	    text-align: center;
	}

	.panel-body {
		border: 1px #5ca05f solid;
	}

</style>
	<div class="panel panel-info">
	    <div class="panel-heading">
	        <i class="fa fa-info-circle"></i>温馨提示
	    </div>
	    <div class="panel-body">
	        <p>该活动已结束或页面不存在</p>
	    </div>
	</div>
@stop