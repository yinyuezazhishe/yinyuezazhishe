@extends('Admin.Public.layout')

@section('content')
	<div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>查看每日一语</h5>                        
        </div>        
        <div class="ibox-content">
			<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
				<form action="/admin/sentence" method="get">
				    <div class="row">
				        <div class="col-sm-6">
				            <div class="dataTables_length" id="DataTables_Table_0_length">
				                <label>
				                    每页
				                    <select name="num" aria-controls="DataTables_Table_0" class="form-control input-sm">
				                        <option @if($request->num ==5) selected @endif value="5">
				                            5
				                        </option>
				                        <option @if($request->num ==10) selected @endif value="10">
				                            10
				                        </option>
				                        <option @if($request->num ==15) selected @endif value="15">
				                            15
				                        </option>
				                        <option @if($request->num ==20) selected @endif value="20">
				                            20
				                        </option>
				                    </select>
				                    条记录
				                </label>
				            </div>
				        </div>
				        <div class="col-sm-3">
				        </div>
				        <div class="col-sm-3">
	                        <div class="input-group">
	                            <input type="text" placeholder="请输入关键字操作" class="input-sm form-control" name="title" value="{{$request->title}}"> <span class="input-group-btn">
	                                <button type="submit" class="btn btn-sm btn-primary"> 搜索</button> </span>
	                        </div>
	                    </div>	                
					</div>
				</form>				
				<table class="table table-striped table-bordered table-hover dataTables-example dataTable text-center">
	                <thead>
	                    <tr role="row">
						    <th class="text-center">每日一语id</th>
						    <th class="text-center" style="width:674px;">每日一语</th>    
						    <th class="text-center">操作</th>
						</tr>
	                </thead>
	                <tbody>    
	                	@foreach ($sentence as $k=>$v)
	                	<tr class="gradeA odd">
	                        <td>{{$v->id}}</td>
	                        <td>{{$v->heart_sentence}}</td>                        
	                        <td>
	                        	<a href="/admin/sentence/{{$v->id}}/edit" class="btn btn-info btn-small">修改</a>
	                        	<form action="/admin/sentence/{{$v->id}}" method="get" class="del"  style="display: inline;">
		                        	@if($v->status == 0)
		                        	<button name="status" class="btn btn-warning" value="{{$v->status}}">禁用</button>
		                        	@else
									<button name="status" class="btn btn-warning" value="{{$v->status}}">启用</button>
		                        	@endif
	                        	</form>
								<button class="btn btn-danger btn-small del" data-id="{{$v->id}}">删除</button>	
	                        </td>
	                    </tr>
	                    @endforeach
	                </tbody>
	            </table>
				<div class="row">
				    <div class="col-sm-6">
				        <div class="dataTables_info" id="DataTables_Table_0_info" role="alert"
				        aria-live="polite" aria-relevant="all">
				            显示 {{$sentence->firstItem()}} 到 {{$sentence->lastItem()}} 项，共 {{$sentence->total()}} 项
				        </div>
				    </div>
				    <div class="col-sm-6">
				        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
							{{$sentence->appends($request->all())->links()}}		
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
	var showSentence = $('.showSentence').parents('li');		
	$('.showSentence a').css({'color':'#fff'});
	showSentence.attr('class','active');

	//删除操作
	$('.del').click(function(){
		var del = $(this);
		layer.confirm('你确定删除该语句吗?',{btn:['删除','取消'],title:"温馨提示",icon:"3"},function(){
			$.post('/admin/sentence/'+del.attr('data-id'),{"_token":"{{csrf_token()}}","_method":"delete"},function(data){
				if(data == '1'){
					location.reload(true);
				}else{
					layer.alert('删除失败',{'title':'温馨提示',icon:'3'});
				}
			})
		},function(){

		})
	})
</script>
@stop