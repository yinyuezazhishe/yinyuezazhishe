@extends('Admin.Public.layout')

@section('title', $title)

@section('content')

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>{{$title}}</h5>                        
        </div>        
            <div class="ibox-content">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                    <form action="/admin/permission" method="get">
                        <div class="row">
                            <div class="col-sm-3">
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
                                <style type="text/css">
                                    select.input-sm{
                                        height: 35px;
                                    }
                                </style>
                                <div class="dataTables_length" id="DataTables_Table_0_length">
                                    <label>
                                        排序
                                        <select name="sort" aria-controls="DataTables_Table_0"
                                        class="form-control input-sm" >
                                            <option value="asc" @if($request->sort == 'asc') selected @endif>
                                                正序
                                            </option>
                                            <option value="desc" @if($request->sort == 'desc') selected @endif>
                                                倒序
                                            </option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-3 col-sm-offset-3">
                                <div class="input-group">
                                    <input type="text" placeholder="请输入角色名称" class="input-sm form-control" name="per_name" value="{{$request->per_name}}"> <span class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary"> 搜索</button> </span>
                                </div>
                            </div>                  
                        </div>
                    </form>
                <div style="height: 30px;"></div>           
                <table class="table table-striped table-bordered table-hover dataTables-example dataTable text-center">
                    <thead>
                        <tr role="row">
                            <th style="width: 136px;" class="text-center">权限id</th>
                            <th  style="width: 116px;" class="text-center">权限名称</th>
                            <th  style="width: 116px;" class="text-center">权限路径</th>   
                            <th style="width: 149px;" class="text-center">操作</th>
                        </tr>
                    </thead>
                    <tbody>    
                        @foreach ($permission as $k=>$v)
                        <tr class="gradeA odd">
                            <td>{{$v->id}}</td>
                            <td>{{$v->per_name}}</td>
                            <td>{{$v->urls}}</td>
                            <td>
                                <a href="/admin/permission/{{$v->id}}/edit" class="btn btn-info btn-small"><i class="glyphicon glyphicon-edit"></i></a>
                                <form action="/admin/permission/{{$v->id}}" method="post" class="del"  style="display: inline;">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger btn-small del" data-id="{{$v->id}}"><i class="glyphicon glyphicon-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="dataTables_info" id="DataTables_Table_0_info" role="alert"
                        aria-live="polite" aria-relevant="all">
                            显示 {{$permission->firstItem()}} 到 {{$permission->lastItem()}} 项，共 {{$permission->total()}} 项
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                            {{$permission->appends($request->all())->links()}}
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
		var show_permission = $('.show_permission').parents('li');
		$('.show_permission a').css({'color':'#fff'});
		show_permission.attr('class','active');
	</script>

    <!-- <script src="/admins/js/content.min.js?v=1.0.0"></script> -->
    <script src="/admins/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="/admins/js/plugins/validate/messages_zh.min.js"></script>
    <script src="/admins/js/demo/form-validate-demo.min.js"></script>
    <script src="/homes/js/sweetalert.min.js"></script>

	@if(session('succes'))  
    <script type="text/javascript">
        swal("恭喜您!", "{{session('succes')}}", "success");
    </script>
    @endif

@stop