@extends('Admin.Public.layout')

@section('title',$title)

@section('content')

<div class="col-sm-12">
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>{{$title}}</h5>
    </div>
    <div class="ibox-content">
        <form method="post" class="form-horizontal" enctype='multipart/form-data' action="/admin/user">
            <div class="form-group">
                <label class="col-sm-2 control-label">旧密码</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="oldpass" id="oldpass" placeholder="请输入用户原密码" value="{{old('username')}}">
                    <span class="help-block m-b-none title"></span>
                </div>
            </div>

            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-2 control-label">密码</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="password" id="password" placeholder="请输入6-12位密码">
                </div>
            </div>

            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-2 control-label">确认密码</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="repass" id="repass" placeholder="请再次输入密码" ">
                </div>
            </div>
            
            {{ csrf_field() }}
             <div class="form-group">
                <div class="col-sm-10 col-md-offset-2">
                    <button class="btn btn-primary" id="sub" type="submit">修改</button>
                    <a href="/admin/user" class="btn btn-warning">取消</a>
                </div>
            </div>
            
        </form>
    </div>  
</div>          
</div>

@stop

@section('js')

<script type="text/javascript">



</script>

@stop