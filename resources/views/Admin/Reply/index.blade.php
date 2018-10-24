@extends('Admin.Public.layout')

@section('content')

	<div class="col-sm-12">
	    <div class="ibox float-e-margins">
	        <div class="ibox-title">
	            <h5>
	                浏览回复
	            </h5>
	        </div>
	        <div class="ibox-content">
	            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline"
	            role="grid">
	                <form action="/admin/reply" method="get" >
	                    <div class="row">
	                        <div class="col-sm-6">
	                            <div class="dataTables_length" id="DataTables_Table_0_length">
	                                <label>
	                                    每页
	                                    <select aria-controls="DataTables_Table_0"
	                                    class="form-control input-sm" name="num">
	                                        <option @if($request->num == 5) selected @endif value="5">
                                            	5
	                                        </option>
	                                        <option @if($request->num == 10) selected @endif value="10">
	                                            10
	                                        </option>
	                                        <option @if($request->num == 15) selected @endif value="15">
	                                            15
	                                        </option>
	                                        <option @if($request->num == 20) selected @endif value="20">
	                                            20
	                                        </option>
	                                    </select>
	                                    条记录
	                                </label>
	                            </div>
	                        </div>
	                        <div class="col-sm-6" style="padding-left: 250px">
	                            <div class="input-group">
	                                <input type="text" placeholder="请输入用户ID" class="input-sm form-control" name="id" value="{{$request->id}}">
	                                <span class="input-group-btn">
	                                <button type="submit" class="btn btn-sm btn-primary">搜索</button>
	                            </div>
	                        </div>
	                    </div>
	                </form>
	                <table class="table table-striped table-bordered table-hover dataTables-example dataTable"
	                id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
	                    <thead>
	                        <tr role="row">
	                        	<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
	                            rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID"
	                            style="width: 40px; text-align: center;">
	                                ID
	                            </th>
	                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
	                            rowspan="1" colspan="1" aria-sort="ascending" aria-label="用户名"
	                            style="width: 80px; text-align: center;">
	                                回复人 & ID
	                            </th>
	                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
	                            rowspan="1" colspan="1" aria-sort="ascending" aria-label="用户名"
	                            style="width: 200px; text-align: center;">
	                                回复内容
	                            </th>
	                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
	                            colspan="1" aria-label="创建时间" style="width: 60px; text-align: center;">
	                                创建时间
	                            </th>
	                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
	                            colspan="1" aria-label="操作" style="width: 40px; text-align: center;">
	                                操作
	                            </th>
	                        </tr>
	                    </thead>
	                    <tbody style="text-align: center;">
	                    	@foreach($res as $k => $v)
		                        <tr class="gradeA odd">
		                            <td class="id">
		                              {{$v->id}}
		                            </td>
		                            <td class=" ">
	                                  {{$v->users['username']}}
	                                  ID:{{$v->hid}}
		                            </td>
		                            <td class="center ">
		                               		{{$v->content}}
		                            </td>
	                                <td class="center ">
	                                    {{date('Y-m-d H:i:s A',$v->addtime)}}
	                                </td>
	                                <td class="center ">
	                                        {{-- csrf_field() --}}
	                                        {{-- method_field('DELETE') --}}
	                               	<button class="btn btn-danger btn-sm del"  data-id="{{$v->id}}" >删除</button>
	                                </td>
		                        </tr>
		                    @endforeach
	                    </tfoot>
	                </table>
	                <div class="row">
                    <div class="col-sm-6">
                        <div class="dataTables_info" id="DataTables_Table_0_info" role="alert"
                        aria-live="polite" aria-relevant="all">
                            显示 {{$res->firstItem()}} 到 {{$res->lastItem()}} 项，共 {{$res->total()}} 项
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate" style="padding-left:180px">
                            {{$res->appends($request->all())->links()}}
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
		var show_reply = $('.show_reply').parents('li');
		$('.show_reply a').css({'color':'#fff'});
		show_reply.attr('class','active');
	    $('.del').click(function(){

	        var id = $(this).attr('data-id');

	        // console.log(id);

	        layer.confirm('你确定删除吗',{btn:['确定','取消'],title:'提示',icon:'3'},function(){

	            $.post('/admin/reply/'+id,{'_token':'{{ csrf_token() }}','_method':'DELETE'},
	                function(data){

	                        location.reload(true);
	                })

	        },function(){
	            
	        })
	        return false;
	    });
	</script>

@stop