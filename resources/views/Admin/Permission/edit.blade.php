@extends('Admin.Public.layout')

@section('title', $title)

@section('content')

<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>{{$title}}</h5>
    </div>
    <div class="ibox-content">
        <form class="form-horizontal m-t" id="signupForm" action="/admin/permission/{{$rs['id']}}" novalidate="novalidate" id="uploadForm" enctype='multipart/form-data' method="post">
            <div class="form-group">
                <label class="col-sm-3 control-label">权限名称：</label>
                <div class="col-sm-3">
                    <input id="per_name" name="per_name" aria-required="true" aria-invalid="true" value="{{$rs['per_name']}}" class="form-control" type="text" class="error">
                    <span class="help-block m-b-none mytitle">
                    	<i class="fa fa-info-circle"></i>请输入权限名称
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">url地址：</label>
                <div class="col-sm-3">
                    <input id="urls" name="urls" aria-required="true" aria-invalid="true" class="form-control" value="{{$rs['urls']}}" type="text" class="error">
                    <span class="help-block m-b-none mytitle">
                        <i class="fa fa-info-circle"></i>请输入url地址
                    </span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3 col-sm-offset-3">
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
		var show_permission = $('.show_permission').parents('li');
		$('.show_permission a').css({'color':'#fff'});
		show_permission.attr('class','active');
	</script>

    <!-- <script src="/admins/js/content.min.js?v=1.0.0"></script> -->
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
			    swal("对不起!", "{{ $error }}", "error");
			</script>
        @endforeach
	@endif

@stop