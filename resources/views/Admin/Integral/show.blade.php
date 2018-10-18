@extends('Admin.Public.layout')

@section('content')
	<div class="col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>日常积分</h5>
            </div>
            <div class="ibox-content">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>会员名</th>
                            <th>会员头像</th>
                            <th>总积分</th>
                            <th>当天登录获得积分</th>
                            <th>当天评论获得积分</th>
                            <th>当天回复获得积分</th>
                            <th>当天留言获得积分</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$nowuser->username}}</td>
                            <td><img src="{{$nowuser->face}}" style="width:50px;"/></td>
                            <td>{{$nowuser->integral}}</td>
                            <td>{{$nowday->hid_num}}</td>
                            <td>{{$nowday->did_num}}</td>
                            <td>{{$nowday->mid_num}}</td>
                            <td>{{$nowday->rid_num}}</td>
                        </tr>
                </table>
            </div>
            <div class="ibox-title">
                <h5>活动积分</h5>
            </div>
            @if($integral)
            <div class="ibox-content">
                <table class="table table-bordered">
                    <tr>
                        <th>会员名</th>
                        <th>会员头像</th>
                        <th>活动名称</th>
                        <th>活动获得积分</th>
                    </tr>
                	@foreach($integral as $k=>$v)
                    <tr>
                        <td>{{$nowuser->username}}</td>
                        <td><img src="{{$nowuser->face}}" style="width:50px;"/></td>
                        <td>
                        	@php
                        		$title = \App\Model\Admin\AdminActivity::where('id',$v->aid)->pluck('title');	
                        		echo $title[0];
                           	@endphp
                        </td>
                        <td>{{$v->activity_num}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
            @else
            <div class="ibox-content">
            </div>
            @endif
            <a class="btn btn-info" href="javascript:history.back()">返回</a>
        </div>
    </div>
@stop
@section('js')
<script type="text/javascript">
	//改变导航条样式
	var showintegral = $('.showintegral').parents('li');		
	$('.showintegral a').css({'color':'#fff'});
	showintegral.attr('class','active');
</script>
@stop