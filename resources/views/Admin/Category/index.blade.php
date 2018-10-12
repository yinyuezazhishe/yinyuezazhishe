@extends('Admin.Public.layout')

@section('title',$title)

@section('content')
<div class="col-sm-12">

        <span>
            <i class="icon-table">
            </i>
            {{$title}}
        </span>
    
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>查看链接</h5>                        
        </div>  
        <div class="ibox-content">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
            <form action="/Admin/category" method='get'>
            <div class="row">
            	<div class="col-sm-8">
            		<div class="dataTables_length" id="DataTables_Table_0_length">
            			<label>每页 <select name="num" aria-controls="DataTables_Table_0" class="form-control input-sm">
            			<option value="5" @if($request->num == 5)  selected="selected"  @endif >
                            5
                        </option>
                        <option value="10" @if($request->num == 10)  selected="selected"  @endif>
                            10
                        </option>
                        <option value="15" @if($request->num == 15)  selected="selected"  @endif>
                            15
                        </option>
            			</select>
                    条记录
                </label>
            	</div>
            	</div>
    			<div class="col-sm-4">
    				<div class="input-group">
    					<input type="text" name='catename' value='{{$request->catename}}' aria-controls="DataTables_Table_1" placeholder="请输入类名" class="input-sm form-control">
                        <span class="input-group-btn"><button class='btn btn-info btn-sm' style="display: inline-block;">搜索</button></span>
    				</div>
    			</div>  
            	</div>
                </form>
            </div>
    <div class="ibox-content">
        <table class="footable table table-stripped toggle-arrow-tiny default breakpoint footable-loaded" data-page-size="8">
            <thead>
            <tr>
                <th data-toggle="true" class="footable-visible footable-first-column footable-sortable">ID
                	<span class="footable-sort-indicator"></span>
                </th>
                <th class="footable-visible footable-sortable">catename
                	<span class="footable-sort-indicator"></span>
                </th>
                <th class="footable-visible footable-sortable">
                    pid
                	<span class="footable-sort-indicator"></span>
                </th>
                <th class="footable-visible footable-sortable">
                    path
                	<span class="footable-sort-indicator"></span>
                </th>
                <th class="footable-visible footable-last-column footable-sortable">操作<span class="footable-sort-indicator">
                	
                </span>
            </th>
            </tr>
            </thead>

                    <tbody role="alert" aria-live="polite" aria-relevant="all">
					
					@foreach($rs as $k => $v)
                    <tr class="@if($k % 2 == 0)odd @else even @endif">
                        <td class="">
                            {{$v->id}}
                        </td>
                        <td class=" ">
                            {{$v->catename}}
                        </td>
						<td class=" ">
                            {{cname($v->pid)}}
						</td>
                        <td class=" ">
                            {{$v->path}}
                        </td>
                     
                         <td class=" ">
                            <a class='btn btn-primary' href="/Admin/category/{{$v->id}}/edit">修改</a>

                            <form action="/Admin/category/{{$v->id}}" method='post' style='display:inline'>
                                
                                {{csrf_field()}}
                                {{method_field('DELETE')}}

                                <button class='btn btn-danger'>删除</button>

                            </form>
                            <a class='btn btn-primary' href="/Admin/category/create?id={{$v->id}}">添加子类别</a>

                        </td>
                    </tr>
                    @endforeach

                  
                </tbody>   
              </table>

				<div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
				
				{{$rs->appends($request->all())->links()}}
        </div>
      </div>
    </div>
</div>
</div>
</div>
@stop

@section('js')
<script>
    $('.mws-form-message').delay(3000).fadeOut(2000);
</script>

@stop