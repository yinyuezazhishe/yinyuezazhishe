@extends('Admin.Public.layout')

@section('content')
<div class="ibox-title">
            <h5>{{$title}}</h5>                        
        </div>
@foreach($message as $k=>$v)
<div class="ibox-content">
    
    <a href="#" class="btn-link">
        <h4>
               用户名: {{$v->homeuser['username']}}         
        </h4>
    </a>
    <br>
    <div style="cursor:pointer;" class="comment-content clearfix">
        <img  src="{{$v->homeuser['face']}}" class="avatar avatar-72 photo" height="72" width="72" alt="头像">&nbsp;&nbsp;{{ $v->content }}
    </div>
    <br>
    <form action="/Admin/message/{{$v->id}}" method='post' style='display:inline'>                        
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
         <h4  class="text-right"><a>{{date('Y-m-d H:i:s ',$v->addtime)}}</a> &nbsp;
            <button type="button" class="btn btn-outline btn-danger">删除留言</button>
        </h4>

     </form>
</div>
@endforeach
@stop

@section('js')
<script>
    $('.mws-form-message').delay(3000).fadeOut(2000);

</script>

<div class="ibox-content">
    <a href="article.html" class="btn-link">
        <h2>
                想知道宁泽涛每天游多少圈？送他 Misfit 最新款 Speedo Shine
            </h2>
    </a>
    <div class="small m-b-xs">
        <strong>高 晨</strong> <span class="text-muted"><i class="fa fa-clock-o"></i> 3 小时前</span>
    </div>
    <p>
        就算你敢带着 Apple Watch 下水游泳，它也不能记录你游了多少圈。 夏天刚来时就不停地听到有人提起“有没有在我游泳的时候可以帮忙数圈的设备”，今天 Misfit 终于赶在夏天结束之前推出可追踪游泳运动的新款 Shine。这款新设备是 Misfit 与泳衣品牌 Speedo （速比涛）合作推出，因此被命名为 Speedo Shine。
    </p>
</div>
@stop