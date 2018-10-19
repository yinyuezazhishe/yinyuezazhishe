@extends('Admin.Public.layout')

@section('content')
	<div class="col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>查看会员积分</h5>
            </div>
            <div class="ibox-content">
                <table class="footable table table-stripped toggle-arrow-tiny default breakpoint footable-loaded" data-page-size="8" style="border-collapse: unset;">
                    <thead>
	                    <tr>
	                        <th data-toggle="true" class="footable-visible footable-first-column footable-sortable">会员id<span class="footable-sort-indicator"></span></th>
	                        <th class="footable-visible footable-sortable">会员名<span class="footable-sort-indicator"></span></th>
	                        <th class="footable-visible footable-sortable">总积分<span class="footable-sort-indicator"></span></th>
	                        <th class="footable-visible footable-last-column footable-sortable">操作<span class="footable-sort-indicator"></span></th>
	                    </tr>
                    </thead>
                    @foreach($integral as $k=>$v)
                    <tbody>
	                    <tr class="footable-even" style="display: table-row;">
	                        <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>{{$v->id}}</td>
	                        <td class="footable-visible">{{$v->username}}</td>
	                        <td class="footable-visible">{{$v->integral}}</td>
	                        <td class="footable-visible footable-last-column">
	                        	<a href="/admin/integral/{{$v['id']}}/show" class="btn btn-info">查看积分详情</a>
	                        </td>
	                    </tr>
                    </tbody>
                    @endforeach
                </table>
				<div class="row">
				    <div class="col-sm-6">
				        <div class="dataTables_info" id="DataTables_Table_0_info" role="alert"
				        aria-live="polite" aria-relevant="all">
				            显示 {{$integral->firstItem()}} 到 {{$integral->lastItem()}} 项，共 {{$integral->total()}} 项
				        </div>
				    </div>
				    <div class="col-sm-6">
				        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
							{{$integral->appends($request->all())->links()}}		
				        </div>
				    </div>
				</div
            </div>
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