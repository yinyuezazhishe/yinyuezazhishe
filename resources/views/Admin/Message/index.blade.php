@extends('Admin.Public.layout')

@section('title',$title)

@section('content')
<div class="ibox-title">
            <h5>{{$title}}</h5>                        
        </div>

<div class="ibox-content">
    
    <a href="article.html" class="btn-link">
        <h2>
                 123214                
        </h2>
    </a>
    <br>
    <p>
        就算你敢带着 Apple Watch 下水游泳，它也不能记录你游了多少圈。 夏天刚来时就不停地听到有人提起“有没有在我游泳的时候可以帮忙数圈的设备”，今天 Misfit 终于赶在夏天结束之前推出可追踪游泳运动的新款 Shine。这款新设备是 Misfit 与泳衣品牌 Speedo （速比涛）合作推出，因此被命名为 Speedo Shine。
    </p>
    <br>
    <form action="#" method='post' style='display:inline'>
                                
                                {{csrf_field()}}
                                {{method_field('DELETE')}}

         <h4  class="text-right"><a>2018-10-15 14:52:11</a> &nbsp;<button type="button" class="btn btn-outline btn-danger">删除留言</button></h4>

     </form>
</div>

@stop

@section('js')
<script>
    $('.mws-form-message').delay(3000).fadeOut(2000);

</script>

@stop