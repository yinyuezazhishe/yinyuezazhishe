@extends('Admin.Public.layout')

@section('title',$title)

@section('content')

<div class="col-sm-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>
                用户列表页面
            </h5>
        </div>
        <div class="ibox-content">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline"
            role="grid">
                <form action="/admin/user" method="get" >
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
                                <input type="text" placeholder="请输入关键词" class="input-sm form-control" name="username" value="{{$request->username}}">
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
                            style="width: 80px; text-align: center;">
                                ID
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                            rowspan="1" colspan="1" aria-sort="ascending" aria-label="用户名"
                            style="width: 120px; text-align: center;">
                                用户名
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                            colspan="1" aria-label="性别" style="width: 50px; text-align: center;">
                                性别
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                            colspan="1" aria-label="头像" style="width: 100px; text-align: center;">
                                头像
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                            colspan="1" aria-label="权限" style="width: 50px; text-align: center;">
                                权限
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                            colspan="1" aria-label="状态" style="width: 50px; text-align: center;">
                                状态
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                            colspan="1" aria-label="创建时间" style="width: 120px; text-align: center;">
                                创建时间
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                            colspan="1" aria-label="操作" style="width: 80px; text-align: center;">
                                操作
                            </th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                    	@foreach($rs as $k => $v)
	                        <tr class="gradeA odd">
	                            <td class="uid">
	                                {{$v->id}}
	                            </td>
	                            <td class="username">
	                                {{$v->username}}
	                            </td>
	                            <td class=" ">
                                        @if($v->sex == 0)
                                        女
                                        @elseif($v->sex == 1)
                                        男
                                        @else
                                        保密
                                        @endif
	                            </td>
	                            <td class="center ">
	                               <div class="fileinput-new thumbnail" style="width: 200px;height: auto;max-height:150px;margin: 0px auto;">
                                    <img id="picImg" style="width: 100%;height: auto;max-height: 140px; " src="{{$v->face}}" alt="">
                                </div>
	                            </td>
	                            <td class="center ">
	                                @if($v->power == 0)
                                        普通
                                        @elseif($v->power == 1)
                                        中等
                                        @elseif($v->power == 2)
                                        高级
                                        @else
                                        root
                                        @endif
	                            </td>
                                <td class="center ">
                                    @if($v->status == 0)
                                        启用
                                        @else
                                        禁用
                                        @endif
                                </td>
                                <td class="center ">
                                    {{date('Y-m-d H:i:s',$v->addtime)}}
                                </td>
                                <td class="center ">
                                    <a href="/admin/user/{{$v->id}}/edit" class="btn btn-info btn-sm">修改</a>
                                    <form action="/admin/user/{{$v->id}}" method="post" style="display: inline;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger btn-sm" id="del">删除</button>
                                    </form>
                                </td>
	                        </tr>
                        @endforeach
                    </tfoot>
                </table>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="dataTables_info" id="DataTables_Table_0_info" role="alert"
                        aria-live="polite" aria-relevant="all">
                            显示 {{$rs->firstItem()}} 到 {{$rs->lastItem()}} 项，共 {{$rs->total()}} 项
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate" style="padding-left:180px">
                            {{$rs->appends($request->all())->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('js')


@stop