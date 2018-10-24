@extends('Admin.Public.layout')

@section('content')
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>每日一语修改</h5>
    </div>
    <div class="ibox-content">
        <form class="form-horizontal m-t" id="signupForm" action="/admin/sentence/{{$sentence->id}}" method="post">
            <div class="form-group">
                <label class="col-sm-3 control-label">每日一语：</label>
                <div class="col-sm-6">
                    <input id="heart_sentence" name="heart_sentence" class="form-control" autocomplete="off" type="text" value="{{$sentence->heart_sentence}}" check-value="{{$sentence->heart_sentence}}">
                    <span class="help-block m-b-none mytitle">
                    	<!-- <i class="fa fa-info-circle"></i>请输入每日一语 -->
                    </span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3 col-sm-offset-3">
                	{{csrf_field()}}
                	{{method_field('PUT')}}
                    <button class="btn btn-info" onpaste="sentence($(this))" type="submit">修改</button>
                    <a href="{{session('uri')}}" class="btn btn-primary">返回</a>
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

	//验证每日一语
	function sentence(sent){
		var sentence_reg = /^[\u4e00-\u9fa5,\.。，a-zA-Z]{3,50}$/;
		flag = true;
		if(sent.val() == sent.attr('check-value')){
			flag = false;
			layer.alert('你当前未做任何修改',{title:'温馨提示',icon:'7'});
			return;			
		}
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
		// sentence($('#heart_sentence'));
	})
	$('#heart_sentence').keydown(function(){
		// sentence($('#heart_sentence'));
	})
	$('#heart_sentence').blur(function(){
		// sentence($('#heart_sentence'));
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