@extends('Admin.Public.layout')

@section('title', $title)

@section('content')

<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>{{$title}}</h5>
    </div>
    <div class="ibox-content">
        <div class="form-horizontal m-t" novalidate="novalidate">
            <div class="form-group">
                <label class="col-sm-1 control-label">详情：</label>
                <div class="col-sm-10">
                    <div type="text/plain" style="height:100%;border:1px solid #e7eaec;padding-top: 10px;padding-left: 45px;">{!!$rs->content!!}</div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1 col-sm-offset-1">
                    <a class="btn btn-primary" href="javascript:history.go(-1)" type="submit" >返回上一步</a>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('js')
    <script type="text/javascript">
        //改变导航条样式
        var show_details = $('.show_details').parents('li');
        $('.show_details a').css({'color':'#fff'});
        show_details.attr('class','active');

    </script>



@stop