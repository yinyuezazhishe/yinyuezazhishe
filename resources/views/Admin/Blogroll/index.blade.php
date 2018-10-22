@extends('Admin.Public.layout')

@section('content')
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>查看链接</h5>                        
        </div>        
	        <div class="ibox-content">
				<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
					<form action="/admin/blogroll" method="get">
					    <div class="row">
					        <div class="col-sm-6">
					            <div class="dataTables_length" id="DataTables_Table_0_length">
					                <label>
					                    每页
					                    <select name="num" aria-controls="DataTables_Table_0"
					                    class="form-control input-sm" >
					                        <option value="5" @if($request->num == 5) selected @endif>
					                            5
					                        </option>
					                        <option value="10" @if($request->num == 10) selected @endif>
					                            10
					                        </option>
					                        <option value="15" @if($request->num == 15) selected @endif>
					                            15
					                        </option>
					                        <option value="20" @if($request->num == 20) selected @endif>
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
		                            <input type="text" placeholder="请输入链接名称" class="input-sm form-control" name="title" value="{{$request->title}}"> <span class="input-group-btn">
		                                <button type="submit" class="btn btn-sm btn-primary"> 搜索</button> </span>
		                        </div>
		                    </div>	                
						</div>
					</form>				
				<table class="table table-striped table-bordered table-hover dataTables-example dataTable text-center">
	                <thead>
	                    <tr role="row">
	                    	<th  style="width: 116px;" class="text-center">排序</th>
						    <th style="width: 136px;" class="text-center">链接id</th>
						    <th  style="width: 116px;" class="text-center">链接名称</th>
						    <th  style="width: 116px;" class="text-center">链接类型</th>
						    <th style="width: 296px;" class="text-center">链接图片</th>
						    <th  style="width: 272px;" class="text-center">链接地址</th>						    
						    <th style="width: 149px;" class="text-center">操作</th>
						</tr>
	                </thead>
	                <tbody>    
	                	@foreach ($blogroll as $k=>$v)
	                	<tr class="gradeA odd">
	                		<td>
                                <input type="text" placeholder="{{$v->rank}}" myrank-id="{{$v->id}}" value="{{$v->rank}}" class="form-control rank" style="width:50px;text-align:center;">
	                        </td>
	                        <td>{{$v->id}}</td>
	                        <td>{{$v->title}}</td>
	                        <td>
	                        	@if($v->type == 0)
									图片链接
	                        	@else
	                        		文字链接
	                        	@endif
	                        </td>
	                        <td>
	                        	@if($v->type == 0)
	                        	<div class="fileinput-new thumbnail" style="width: 200px;height: auto;max-height:150px;margin-bottom:0px;margin:0px auto;">
			                        <img id='picImg' style="width: 100%;height: auto;max-height: 140px;" src="{{$v->picture}}" alt="" />
			                    </div>
			                    @else
									<div class="fileinput-new thumbnail" style="width: 200px;height: auto;max-height:150px;margin-bottom:0px;margin:0px auto;">
			                        <img id='picImg' style="width: 100%;height: auto;max-height: 140px;" src="/admins/img/noimage.png" alt="没有图片" title="没有图片" />
			                    	</div>
			                    @endif
	                        </td>
	                        <td>{{$v->links}}</td>	                        
	                        <td>
	                        	<a href="/admin/blogroll/{{$v->id}}/edit" class="btn btn-info btn-small">修改</a>
	                        	<!-- <form action="/admin/Blogroll/{{--$v->id--}}" method="post" class="del"  style="display: inline;"> -->
	                        		{{--csrf_field()--}}
	                        		{{--method_field('DELETE')--}}
	                        		<input type="hidden" name="oldpicture" value="{{$v->picture}}"/>
									<button class="btn btn-danger btn-small del" data-id="{{$v->id}}">删除</button>
								<!-- </form> -->
	                        </td>
	                    </tr>
	                    @endforeach
	                </tbody>
	            </table>
	            <a class='btn btn-warning btn-small' id="ranks">排序</a>
				<div class="row">
				    <div class="col-sm-6">
				        <div class="dataTables_info" id="DataTables_Table_0_info" role="alert"
				        aria-live="polite" aria-relevant="all">
				            显示 {{$blogroll->firstItem()}} 到 {{$blogroll->lastItem()}} 项，共 {{$blogroll->total()}} 项
				        </div>
				    </div>
				    <div class="col-sm-6">
				        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
							{{$blogroll->appends($request->all())->links()}}		
				        </div>
				    </div>
				</div>
			</div>
        </div>
    </div>
@endsection
@section('js')
	<script type="text/javascript">
		var link = $('.showlink').parents('li');
		$('.showlink a').css({'color':'#fff'});
		link.attr('class','active');

		$('#ranks').click(function(){
			var rank = new Array();
			var id = new Array();
			var num = /^\d+$/;
			$('.rank').each(function(){
				if($(this).val() != $(this).attr('placeholder')){
					if(num.test($(this).val())){
						rank.push($(this).val());
					}else{
						rank.push('0');
					}					
					id.push($(this).attr('myrank-id'));
				}
			})
			if(rank.length && id.length){
				$.ajax({
					url: '/admin/blogroll/rank',  
					data: {
						'id':id,
						'rank':rank
					},
					dataType: 'json',    
					type: 'GET',    
					success: function(data){
						if(data){
							location.reload();
						}
					},
					error: function(){
						layer.msg('排序失败');
					},
					timeout:3000,
					async: false
				})
			}
			return false;
		})		
		$('.del').click(function(){
			id = $(this).attr('data-id');
			var oldpicture = $(this).prev().val();
			console.log(oldpicture);
			layer.confirm('你确定删除吗',{btn:['确定','取消'],title:'提示',icon:'3'},function(){
				$.post('/admin/blogroll/'+id,{'oldpicture':oldpicture,'_token':'{{ csrf_token() }}','_method':'DELETE'},function(data){
					if(data){
						location.reload(true);
					}
				})
			},function(){
				
			})
		})
	</script>
@stop