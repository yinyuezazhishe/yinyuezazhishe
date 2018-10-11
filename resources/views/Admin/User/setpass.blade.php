@extends('Admin.Public.layout')

@section('title',$title)

@section('content')

<div class="col-sm-12">
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>{{$title}}</h5>

    </div>
    <div class="ibox-content">
        <form method="post" class="form-horizontal" enctype='multipart/form-data' action="/admin/doPass">
            <div class="form-group">
                <label class="col-sm-2 control-label">旧密码</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control pwd" name="oldpass" placeholder="请输入用户原密码" value="{{old('username')}}">
                    <span class="help-block m-b-none title"></span>
                    <span class="help-block m-b-none title"></span>
                </div>
            </div>

            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-2 control-label">密码</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control pwd" name="password" id="password"  placeholder="请输入6-12位密码">
                    <span class="help-block m-b-none title"></span>

                </div>
            </div>

            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-2 control-label">确认密码</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control pwd" name="repass" id="repass" placeholder="请再次输入密码" ">
                    <span class="help-block m-b-none title"></span>
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

    var flag = false;

    $('.pwd').each(function(){

        $(this).blur(function(){
            
            var reg = /^\S{6,12}$/;

            var val = $(this).val();

            // console.log(reg.test(val));

            if (val == '') {

                $(this).next().html('<i class="fa fa-info-circle"></i>不能为空').css('color','red');
                flag = false;
            } else if (!reg.test(val)) {

                $(this).next().html('<i class="fa fa-info-circle"></i>密码格式不正确').css('color','red');
                flag = false;
            } else {
                $(this).next().html('');
                flag = true;
            }
        });

    });
    
    $('#repass').blur(function(){

        // console.log($(this).val());
        // console.log($('#password').val());

        if ($(this).val() != $('#password').val()){

            flag = false;
            $(this).next().html('<i class="fa fa-info-circle"></i>两次密码不一致').css('color','red');

        } else if ($(this).val() == '') {
            flag = false;
            $(this).next().html('<i class="fa fa-info-circle"></i>不能为空').css('color','red');
        } else {

            $(this).next().html('');
            flag = true;
        }

    });

    $('#sub').click(function(){

        return flag;
    });
</script>

@stop