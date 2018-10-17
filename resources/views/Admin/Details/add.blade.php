@extends('Admin.Public.layout')

@section('content')

<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>{{$title}}</h5>
    </div>
    <div class="ibox-content">
        <form class="form-horizontal m-t" id="signupForm" action="/admin/role" novalidate="novalidate" id="uploadForm" enctype='multipart/form-data' method="post">
            <div class="form-group">
                <label class="col-sm-2 control-label">详情标题：</label>
                <div class="col-sm-8">
                    <input name="title" aria-required="true" aria-invalid="true" class="form-control" type="text" class="error">
                    <span class="help-block m-b-none mytitle">
                    	<i class="fa fa-info-circle"></i>请输入详情标题
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">详情作者：</label>
                <div class="col-sm-8">
                    <input name="author" aria-required="true" aria-invalid="true" class="form-control" type="text" class="error">
                    <span class="help-block m-b-none mytitle">
                        <i class="fa fa-info-circle"></i>请输入作者名称
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">详情语录：</label>
                <div class="col-sm-8">
                    <input name="saying" aria-required="true" aria-invalid="true" class="form-control" type="text" class="error">
                    <span class="help-block m-b-none mytitle">
                        <i class="fa fa-info-circle"></i>请输入详情语录
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">详情描述：</label>
                <div class="col-sm-8">
                    <textarea rows="4" id="area" name="describe" onkeyup="javascript:checkWord(this);" onmousedown="javascript:checkWord(this);" aria-required="true" aria-invalid="true" class="form-control" class="error"></textarea>
                    <span class="help-block m-b-none mytitle">
                        <i class="fa fa-info-circle"></i>请输入详情描述
                    </span>
                    <sapn id="sps"><i class="fa fa-info-circle" id="fa"></i>还可以输入<span style="font-family: Georgia; font-size: 20px;" id="wordCheck">200</span>个字符</sapn>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">详情：</label>
                <div class="col-sm-10">
                    <script id="editor" name="content" type="text/plain" style="height:450px;"></script>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3 col-sm-offset-2">
                	{{csrf_field()}}
                    <button class="btn btn-primary" type="submit">添加</button>
                </div>
            </div>
        </form>
    </div>
</div>

@stop

@section('js')
    
    <script type="text/javascript">  
   
        var maxstrlen = 200;
        function Q(s) { return document.getElementById(s); }  
   
        function checkWord(c) {  
            len = maxstrlen;  
            var str = c.value;  
            myLen = getStrleng(str);  
            var wck = Q("wordCheck");

            if (myLen > len) {
                wck.innerHTML = 0;
            }

            $('#sps').css({"color":"#676a6c"});

            if (myLen > len * 2) {  
                c.value = str.substring(0, i - 1);
                $('#fa').removeClass('fa fa-info-circle');
                $('#fa').addClass('fa fa-times-circle');
                $('#sps').css({"color":"#a94442"});
            }  
            else {
                $('#sps').css({"color":"#3c763d"});
                $('#fa').removeClass('fa fa-times-circle');
                $('#fa').addClass('fa fa-info-circle');
                wck.innerHTML = Math.floor((len * 2 - myLen) / 2);
            }
        }  
   
        function getStrleng(str) {  
            myLen = 0;  
            i = 0;  
            for (; (i < str.length) && (myLen <= maxstrlen * 2); i++) {  
                if (str.charCodeAt(i) > 0 && str.charCodeAt(i) < 128)  
                    myLen++;  
                else  
                    myLen += 2;  
            }  
            return myLen;  
        } 

		//改变导航条样式
		var create_details = $('.create_details').parents('li');
		$('.create_details a').css({'color':'#fff'});
		create_details.attr('class','active');

        //实例化编辑器
        //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
        var ue = UE.getEditor('editor');

	</script>

    <script src="/admins/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="/admins/js/plugins/validate/messages_zh.min.js"></script>
    <script src="/admins/js/demo/form-validate-demo.min.js"></script>
    <script src="/homes/js/sweetalert.min.js"></script>
	
	@if (count($errors) > 0)
    	@foreach ($errors->all() as $error)
            <script type="text/javascript">
			    swal("对不起!", "{{$error}}", "error");
			</script>
        @endforeach
	@endif

	@if(session('errors'))  
    <script type="text/javascript">
        swal("对不起!", "{{session('errors')}}", "error");
    </script>
    @endif

@stop