@extends('Admin.Public.layout')

@section('content')
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>每日一语添加</h5>
    </div>
    <div class="ibox-content">
        <form class="form-horizontal m-t" id="signupForm" action="/admin/sentence" method="post">
            <div class="form-group">
                <label class="col-sm-3 control-label">每日一语：</label>
                <div class="col-sm-6">
                    <input id="heart_sentence" name="heart_sentence" onpaste="sentence($(this))" class="form-control" autocomplete="off" type="text">
                    <span class="help-block m-b-none mytitle">
                    	<i class="fa fa-info-circle"></i>请输入每日一语
                    </span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3 col-sm-offset-3">
                	{{csrf_field()}}
                    <button class="btn btn-primary sentence-add" type="submit">添加</button>
                </div>
            </div>
        </form>
    </div>
</div>

@stop
@section('js')
<script type="text/javascript">
	//改变导航条样式
	var createSentence = $('.createSentence').parents('li');		
	$('.createSentence a').css({'color':'#fff'});
	createSentence.attr('class','active');
	//js验证每日一语
	//验证每日一语
	function sentence(sent){
		var sentence_reg = /^[\u4e00-\u9fa5,\.。，'a-zA-Z]{3,50}$/;
		flag = true;
		if(sent.val().length <= 0 ){
			$('.mytitle').css({"color":"red"}).html('<i class="fa fa-info-circle"></i>请输入每日一语');
			flag = false;
		}else if(sentence_reg.test(sent.val())){
			$('.mytitle').css({"color":"lightgreen"}).html('<i class="fa fa-check"></i>格式正确');
			flag = true;
		}else{
			$('.mytitle').css({"color":"red"}).html('<i class="fa fa-close"></i>每日一语字数最少3个字,最多50个字');
			flag = false;
		}
	}
	$('#heart_sentence').keyup(function(){
		sentence($('#heart_sentence'));
	})
	$('#heart_sentence').keydown(function(){
		sentence($('#heart_sentence'));
	})
	$('#heart_sentence').focus(function(){
		sentence($('#heart_sentence'));
	})
	$('form').submit(function(){
		sentence($('#heart_sentence'));
		if(flag){
			return flag;
		}
		return flag;
	})
</script>
@stop