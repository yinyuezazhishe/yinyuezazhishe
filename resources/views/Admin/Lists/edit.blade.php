@extends('Admin.Public.layout')

@section('content')

<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>{{$title}}</h5>
    </div>
    <div class="ibox-content">
        <form class="form-horizontal m-t" id="signupForm" action="/admin/lists/{{$res->id}}" novalidate="novalidate" id="uploadForm" enctype='multipart/form-data' method="post">
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
                            @foreach ($rs as $k => $v)
                                @php
                                    $q[] = rtrim($v -> path, ',');
                                @endphp
                            @endforeach
                            @foreach ($q as $k => $v)
                                @php
                                    $m[] = ltrim(strrchr($v, ','), ',');
                                    $m = array_unique($m);
                                @endphp
                            @endforeach
                            @foreach($rs as $k => $v)
                                @php
                                    $n = substr_count($v -> path, ',') - 1;

                                    $v->catename = str_repeat('&nbsp;', $n * 8).'|--'.$v -> catename;
                                    if ($n < 0) {
                                        $n = 0;
                                    }
                                @endphp
                            <option @if ($res->cid == $v -> id) selected @endif @if (in_array($v ->id, $m) == $v -> id) disabled @endif value='{{$v->id}}'>{{$v->catename}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1 col-sm-offset-2">
                    <a class="btn btn-primary" href="javascript:history.go(-1)" type="submit" >返回上一步</a>
                </div>
                <div class="col-sm-3" style="margin-left: 30px;">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <button class="btn btn-primary" type="submit">修改</button>     
                </div>
            </div>
        </form>
    </div>
</div>

@stop

@section('js')
    
    <script type="text/javascript">  

		//改变导航条样式
		var show_lists = $('.show_lists').parents('li');
		$('.show_lists a').css({'color':'#fff'});
		show_lists.attr('class','active');

	</script>

    <script src="/admins/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="/admins/js/plugins/validate/messages_zh.min.js"></script>
    <script src="/admins/js/demo/form-validate-demo.min.js"></script>
    <script src="/homes/js/sweetalert.min.js"></script>
	
    @if(session('errors'))  
    <script type="text/javascript">
        swal("对不起!", "{{session('errors')}}", "error");
    </script>
    @endif

	@if (count($errors) > 0)
    	@foreach ($errors->all() as $error)
            <script type="text/javascript">
			    swal("对不起!", "{{$error}}", "error");
			</script>
        @endforeach
	@endif

@stop