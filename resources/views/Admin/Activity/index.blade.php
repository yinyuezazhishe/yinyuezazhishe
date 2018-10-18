@extends('Admin.Public.layout')

@section('content')
<div class="col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>查看活动</h5>
            </div>
            <div class="ibox-content">
                <div class="row">
                	<form action="/admin/activity" method="get">
	                    <div class="col-sm-5 m-b-xs">
	                        <select class="input-sm form-control input-s-sm inline" name="status" style="height:31px;">
	                        	<option value="">活动状态</option>
	                            <option value="0" @if($request->status == '0')selected @endif>已开启</option>
	                            <option value="1" @if($request->status == '1')selected @endif>未开启</option>
	                            <option value="2" @if($request->status == '2')selected @endif>已结束</option>
	                        </select>
	                    </div>
	                    <div class="col-sm-4 m-b-xs">
	                        
	                    </div>
	                    <div class="col-sm-3">
	                        <div class="input-group">
	                            <input type="text" name="title" value="{{$request->title}}" placeholder="请输入活动名称" class="input-sm form-control"> <span class="input-group-btn">
	                                <button type="submit" class="btn btn-sm btn-primary"> 搜索</button> </span>
	                        </div>
	                    </div>
                	</form>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>活动名称</th>
                                <th>活动路由</th>
                                <th>活动开始时间</th>
                                <th>活动结束时间</th>
                                <th>活动创建时间</th>
                                <th>活动状态</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($activity as $k=>$v)
                            <tr>
                                <td>{{$v['title']}}</td>
                                <td>{{$v['route_link']}}</td>
                                <td>{{$v['begintime']}} 00:00:00</td>
                                <td>{{$v['stoptime']}} 00:00:00</td>
                                <td>{{$v['addtime']}}</td>
                                <td>
                                	@if($v['status'] == 0)
                                	已开启
                                	@elseif($v['status'] == 1)
									未开启
                                	@else
									已结束
                                	@endif
                                </td>
                                <td>
                                	@if($v['status'] == 2)
                                	<form action="/admin/activity/{{$v['id']}}" method="get" style="display: inline;">
                                		<a href="/admin/activity/{{$v['id']}}/edit" class="btn btn-info noedit">查看</a>
                                	</form>
                                	@elseif($v['status'] == 1)
									<a href="/admin/activity/{{$v['id']}}/edit" class="btn btn-info">修改</a>
									<form action="/admin/activity/{{$v['id']}}" method="get" style="display: inline;">
										<button class="btn btn-warning">开启</button>
									</form>
									@else
									<form action="/admin/activity/{{$v['id']}}" method="get" style="display: inline;">
										<button class="btn btn-warning">结束活动</button>
									</form>
                                	@endif
                                </td>
                            </tr>
							@endforeach
                        </tbody>
                    </table>
                    <div class="row" style="margin-right:0px;">
                        <div class="col-sm-6">
                            <div class="dataTables_info" id="DataTables_Table_0_info" role="alert"
                            aria-live="polite" aria-relevant="all">
                                显示 {{$activity->firstItem()}} 到 {{$activity->lastItem()}} 项，共 {{$activity->total()}} 项
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                {{$activity->appends($request->all())->links()}}        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
<script type="text/javascript">
	//改变导航条样式
	var showActivity = $('.showActivity').parents('li');		
	$('.showActivity a').css({'color':'#fff'});
	showActivity.attr('class','active');
</script>
@stop