@extends('Admin.Public.layout')

@section('content')
<div class="ibox-title">
            <h5>{{$title}}</h5>                        
        </div>

<div class="ibox-content">
    @foreach($message as $k=>$v)
    <a href="#" class="btn-link">
        <h4>
               用户名: {{$v->homeuser['username']}}       
        </h4>
    </a>
    <div style="cursor:pointer;" class="comment-content clearfix">
       <b><img  src="{{$v->homeuser['face']}}" class="avatar avatar-72 photo" height="80" width="72" alt="头像">&nbsp;{{ $v->content }}</b>       
    </div>
    <br>
    <form action="/Admin/message/{{$v->id}}" method='post' style='display:inline'>                        
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
         <h4  class="text-right"><a>{{date('Y-m-d H:i:s ',$v->addtime)}}</a> &nbsp;
            <button class="btn btn-outline btn-danger">删除留言</button>
        </h4>
        
     </form>
     @endforeach
<div style="float: right;" class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
                
                {{$message->appends($request->all())->links()}}
</div>
</div>


@stop

@section('js')
<script>
    $('.mws-form-message').delay(3000).fadeOut(2000);

</script>
@stop