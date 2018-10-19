@extends('Admin.Public.layout')

@section('title',$title)

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

@stop