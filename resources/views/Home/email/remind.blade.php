@extends('Home.Public.layout')

@section('title','用户注册邮件提醒')

@section('content')
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
        <i class="fa fa-info-circle"></i> 信息
    </div>
    <div class="panel-body">
        <p>请访问注册时填写的邮箱, 进入收件箱进行激活账号, 以便进行登录</p>
    </div>
</div>

@stop