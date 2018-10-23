@extends('Admin.Public.layout')

@section('content')

<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>{{$title}}</h5>
    </div>
    <div class="ibox-content">
        <form class="form-horizontal m-t" id="signupForm" action="/admin/details" novalidate="novalidate" id="uploadForm" enctype='multipart/form-data' method="post">
            <div class="form-group">
                <label class="col-sm-2 control-label">分类名称：</label>
                <div class="col-sm-8">
                    <style type="text/css">
                        select.input-sm{
                            height: 35px;
                        }
                    </style>
                    <div class="dataTables_length" id="DataTables_Table_0_length">
                        <select name="cid" aria-controls="DataTables_Table_0" class="form-control input-sm" >
                            <option value=''>请选择您的分类</option>
                            @foreach ($rs as $k => $v)
                                <?php
                                    $q[] = rtrim($v -> path, ',');
                                ?>
                            @endforeach
                            @foreach ($q as $k => $v)
                                <?php
                                    $m[] = ltrim(strrchr($v, ','), ',');
                                    $m = array_unique($m);
                                ?>
                            @endforeach
                            @foreach($rs as $k => $v)
                                <?php
                                    $n = substr_count($v -> path, ',') - 1;

                                    $v->catename = str_repeat('&nbsp;', $n * 8).'|--'.$v -> catename;
                                    if ($n < 0) {
                                        $n = 0;
                                    }
                                ?>
                            <option @if (old('cid') == $v -> id) selected @endif @if (in_array($v ->id, $m) == $v -> id) disabled @endif value='{{$v->id}}'>{{$v->catename}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">详情标题：</label>
                <div class="col-sm-8">
                    <input name="title" aria-required="true" aria-invalid="true" class="form-control" type="text" value="{{old('title')}}" class="error">
                    <span class="help-block m-b-none mytitle">
                    	<i class="fa fa-info-circle"></i>请输入详情标题
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">详情作者：</label>
                <div class="col-sm-8">
                    <input name="author" aria-required="true" aria-invalid="true" class="form-control" type="text" value="{{old('author')}}" class="error">
                    <span class="help-block m-b-none mytitle">
                        <i class="fa fa-info-circle"></i>请输入作者名称
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">详情语录：</label>
                <div class="col-sm-8">
                    <input name="saying" aria-required="true" aria-invalid="true" class="form-control" type="text" value="{{old('saying')}}" class="error">
                    <span class="help-block m-b-none mytitle">
                        <i class="fa fa-info-circle"></i>请输入详情语录
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">详情描述：</label>
                <div class="col-sm-8">
                    <textarea rows="4" id="area"  name="describe" onkeyup="javascript:checkWord(this);" onmousedown="javascript:checkWord(this);" aria-required="true" aria-invalid="true" class="form-control" class="error">{{old('describe')}}</textarea>
                    <span class="help-block m-b-none mytitle">
                        <i class="fa fa-info-circle"></i>请输入详情描述
                    </span>
                    <sapn id="sps"><i class="fa fa-info-circle" id="fa"></i>还可以输入<span style="font-family: Georgia; font-size: 20px;" id="wordCheck">200</span>个字符</sapn>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">图片欣赏：</label>
                <div class="col-sm-3">
                    <div class="form-group" style="margin-left:0px;" >
                        <div class="fileinput myfile fileinput-new" data-provides="fileinput"  id="exampleInputUpload">
                            <div class="fileinput-new thumbnail" style="width: 200px;height: auto;max-height:150px;">
                                <img id='picImg' style="width: 100%;height: auto;max-height: 140px;" src="/admins/img/noimage.png" alt="" />
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail thumb" style="max-width: 200px; max-height: 150px;"></div>
                            <div>
                                <span class="btn btn-primary btn-file">
                                    <span class="fileinput-new">选择文件</span>
                                    <span class="fileinput-exists">换一张</span>
                                    <input type="file" name="picstream" id="picID" accept="image/gif,image/jpeg,image/x-png">
                                </span>
                                <a href="javascript:;" class="btn btn-warning fileinput-exists" data-dismiss="fileinput">移除</a>
                            </div>
                            <span class="help-block m-b-none">
                                <i class="fa fa-info-circle"></i>请选择图片欣赏(该图片必须选)
                            </span>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">详情：</label>
                <div class="col-sm-10">
                    <script id="editor" name="content" value="" type="text/plain" style="height:450px;">{!!old('content')!!}</script>
                    <span class="help-block m-b-none">
                        <i class="fa fa-info-circle"></i>请输入详情
                    </span>
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
    <!-- <script src="/admins/js/demo/form-validate-demo.min.js"></script> -->
    <script src="/homes/js/sweetalert.min.js"></script>
	


    @if(session('errors'))
    <script type="text/javascript">
        swal("对不起!", "{{session('errors')}}", "error");
    </script>
    @endif
    
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            <script type="text/javascript">
                swal("对不起!", "{{$error}}","error");
            </script>
        @endforeach
    @endif

@stop