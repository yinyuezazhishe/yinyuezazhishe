@extends('Admin.Public.layout')

@section('title', $title)

@section('content')

<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>{{$title}}</h5>
    </div>
    <div class="ibox-content">
        <form class="form-horizontal m-t" id="signupForm" action="/admin/r_p_update?id={{$role->id}}" novalidate="novalidate" id="uploadForm" enctype='multipart/form-data' method="post">
            <div class="form-group">
                <label class="col-sm-2 control-label">角色名称：</label>
                <div class="col-sm-3">
                    <input id="role_name" disabled name="role_name" aria-required="true" aria-invalid="true" value="{{$role->role_name}}" class="form-control" type="text" class="error">
                </div>
            </div>
            <link rel="stylesheet" href="/admins/css/jquery-labelauty.css">
            <style>
                ul { list-style-type: none;}
                li { display: inline-block;}
                input.labelauty + label { font: 12px "Microsoft Yahei";}
            </style>
            
            <div class="form-group">
                <label class="col-sm-2 control-label">角色名：</label>
                <div class="col-sm-10">
                     <ul class="dowebok" style="margin: 0px; padding:0px;">
                        @foreach($per as $k=>$v)
                            <li>
                                <input type="checkbox" name="per_id[]" value="{{$v->id}}" data-labelauty="{{$v->per_name}}" @if(in_array($v->id, $arr)) checked @endif>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-2 col-sm-offset-2">
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
		//改变导航条样式
		var show_role = $('.show_role').parents('li');
		$('.show_role a').css({'color':'#fff'});
		show_role.attr('class','active');
	</script>

    <!-- <script src="/admins/js/content.min.js?v=1.0.0"></script> -->
    <script src="/admins/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="/admins/js/plugins/validate/messages_zh.min.js"></script>
    <script src="/admins/js/demo/form-validate-demo.min.js"></script>
    <script src="/homes/js/sweetalert.min.js"></script>
    <script src="/admins/js/jquery-labelauty.js"></script>
    <script>
        $(function(){
            $(':input').labelauty();
        });
    </script>
	
	@if (count($errors) > 0)
    	@foreach ($errors->all() as $error)
            <script type="text/javascript">
			    swal("对不起!", "{{ $error }}", "error");
			</script>
        @endforeach
	@endif

	@if(session('errors'))  
    <script type="text/javascript">
        swal("对不起!", "{{session('errors')}}", "error");
    </script>
    @endif
@stop