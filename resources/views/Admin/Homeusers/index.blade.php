@extends('Admin.Public.layout')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>查看用户</h5>                
            </div>
            <div class="ibox-content">                         	
                <div class="row">
                	<form action="/admin/homeusers/index" method="get">
	                    <div class="col-sm-1 m-b-xs">
	                        <select class="form-control input-md" style="padding:5px;" name="status">
	                            <option value="">状态</option>
	                            <option value="0" @if($request->status == '0') selected @endif>启用</option>
	                            <option value="1" @if($request->status == '1') selected @endif>禁用</option>
	                        </select>
	                    </div>
	                    <div class="col-sm-1 m-b-xs">
	                        <select class="form-control input-md" style="padding:5px;" name="sex">
	                            <option value="">性别</option>
	                            <option value="0" @if($request->sex == '0' ) selected @endif>女</option>
	                            <option value="1" @if($request->sex == '1' ) selected @endif>男</option>
	                            <option value="2" @if($request->sex == '2' ) selected @endif>保密</option>
	                        </select>
	                    </div>
	                    <div class="col-sm-7"></div>
	                    <div class="col-sm-3 text-right">
	                        <div class="input-group">
	                            <input type="text" name="username" value="{{$request->username}}" placeholder="请输入会员名" class="input-sm form-control"> <span class="input-group-btn">
	                                <button type="submit" class="btn btn-sm btn-primary"> 搜索</button> </span>
	                        </div>
	                    </div>
                	</form>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                	<!-- <div class="checkbox icheck-info">
										<input type="checkbox" id="infoall" name="info">
										<label for="infoall"></label>
									</div> -->
									#
								</th>	
                                <th>会员id</th>
                                <th width="104px">会员名</th>
                                <th>头像</th>
                                <th>年龄</th>
                                <th>QQ</th>
                                <th>邮箱</th>
                                <th>性别</th>
                                <th>电话</th>
                                <th>积分</th>
                                <th>操作</th>	
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            	@foreach($rs as $k=>$v)
                            	@php
									$rand = str_random(4);
                            	@endphp
                                <td>
                                	<div class="checkbox icheck-info">                                 
										<input type="checkbox" id="{{$rand}}" class="infothis" data-id="{{$v->id}}">
										<label for="{{$rand}}"></label>
									</div>
								</td>
                            	<td>{{$v->id}}</td>
                                <td>{{$v->username}}</td>
                                <td>
                                	@if($v->face)
                                	<img src="{{$v->face}}" style="width:50px;height:auto;border-radius:50%;"/>
                                	@else
									<img src="/homes/images/lizhibb.jpg" style="width:50px;height:auto;border-radius:50%;"/>
                                	@endif
                                </td>
                                <td>{{$v->age}}</td>
                                <td>{{$v->qq}}</td>
                                <td>{{$v->email}}</td>
                                <td>
                                	@if($v->sex == '0')
                                	女
                                	@elseif($v->sex=='1')
                                	男
                                	@else
									保密
                                	@endif
                                </td>
                                <td>{{$v->tel}}</td>
                                <td>{{$v->intengral}}</td>
                                <td>
                                	@if($v->status == 0)
                                	<button class="btn btn-warning status" mydata="{{$v->status}}" myid="{{$v->id}}">禁用</button>
                                	@else
                                	<button class="btn btn-info status" mydata="{{$v->status}}" myid="{{$v->id}}">启用</button>
                                	@endif
                                	<button class="btn btn-danger del">删除</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>                        
                </div>
            </div>
            <div class="row">
				    <div class="col-sm-6">
				        <div class="dataTables_info" id="DataTables_Table_0_info" role="alert"
				        aria-live="polite" aria-relevant="all">
				            显示 {{$rs->firstItem()}} 到 {{$rs->lastItem()}} 项，共 {{$rs->total()}} 项
				        </div>
				    </div>
				    <div class="col-sm-6 text-center">
				        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
							{{$rs->appends($request->all())->links()}}		
				        </div>
				    </div>
				</div>
        </div>
    </div>
</div>
@stop

@section('js')
	<script type="text/javascript">		
		var link = $('.showuser').parents('li');
		$('.showuser a').css({'color':'#fff'});
		link.attr('class','active');
        //删除
        $('.del').click(function(){
            var check = $(this).parents('tr').find('input').is(':checked');           
            if(!check){
                layer.msg('请选中要删除的用户',{icon:'7'});
            }else{
                var id = $(this).parents('tr').find('input').attr('data-id');
                layer.confirm('你确认删除该用户吗?',{btn:['确定','取消'],title:'温馨提示',icon:'3'},function(){
                    $.post('/admin/homeUsers/'+id,{'_token':"{{csrf_token()}}",'_method':"DELETE"},function(data){
                            location.reload();
                    })
                },function(){

                })
               
            }
        })
        //更改状态
        $('.status').click(function(){
            statusthis = $(this);
            status = $(this).attr('mydata');
            id = $(this).attr('myid');
            if(status == '0'){
                str = '禁用';
            }else{
                str = '启用';
            }
            layer.confirm('确认要'+str+'该用户吗?',{btn:['确定','取消'],title:'温馨提示',icon:'3'},function(){
                $.get('/admin/homeusers',{'status':status,'id':id},function(data){
                    if(data){
                        layer.alert(str+'成功');
                        if(data.status == 1){
                            str ='启用';
                            statusthis.addClass('btn-info');
                            statusthis.removeClass('btn-warning');
                        }else{
                            str ='禁用';
                            statusthis.addClass('btn-warning');
                            statusthis.removeClass('btn-info');
                        }
                        statusthis.html(str);
                        statusthis.attr('mydata',data.status);                        
                    }else{
                        layer.alert(str+'失败');
                    }
                })
            },function(){

            }) 
        })
	</script>
@stop