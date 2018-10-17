@extends('Admin.Public.layout')

@section('title',$title)

@section('content')
<div class="ibox-title">
            <h5>{{$title}}</h5>                        
        </div>
@foreach($rs as $k=>$v)
<div class="ibox-content">
    
    <a href="#" class="btn-link">
        <h2>
               {{$v->hid}}         
        </h2>
    </a>
    <br>
    <p>
        {{$v->content}}
    </p>
    <br>
    <form action="/Admin/message/{{$v->id}}" method='post' style='display:inline'>
                                
                                {{csrf_field()}}
                                {{method_field('DELETE')}}

         <h4  class="text-right"><a>2018-10-15 14:52:11</a> &nbsp;<button type="button" class="btn btn-outline btn-danger">删除留言</button></h4>

     </form>
</div>
@endforeach
@stop

@section('js')
<script>
    $('.mws-form-message').delay(3000).fadeOut(2000);

</script>

@stop