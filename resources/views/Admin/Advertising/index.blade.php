@extends('Admin.Public.layout')

@section('title',$title)

@section('content')
<div class="ibox-content">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
             <div class="row">
                <div class="col-sm-6">
                     <form action="/Admin/advertising" method='get'>
                        <div class="dataTables_length" id="DataTables_Table_0_length">
                        <label>
                            显示
                            <select name="num" size="1" aria-controls="DataTables_Table_1">
                             <option value="10" @if($request->num == 10)  selected="selected"  @endif >
                                  10
                            </option>
                                <option value="25" @if($request->num == 25)  selected="selected"  @endif>
                                 25
                            </option>
                            <option value="30" @if($request->num == 30)  selected="selected"  @endif>
                                            30
                            </option>
                                       
                            </select>
                            条数据
                            </label>
                            </div>
                        </div>
                        <div class="col-sm-5">
                        <div class="dataTables_filter" id="DataTables_Table_1_filter">
                            <label>
                            广告名:
                            <input type="text" name='title' value='{{$request->title}}' aria-controls="DataTables_Table_1">
                    
                             </label>

                        <button class='btn btn-info'>搜索</button>
                 </div>
                 </form>
                </div>
                            </div>
            <table class="table table-striped table-bordered table-hover dataTables-example dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 160px;" aria-label="Browser: activate to sort column ascending">
                            ID
                            </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 120px;" aria-label="Platform(s): activate to sort column ascending">
                            广告标题
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 120px;" aria-label="Engine version: activate to sort column ascending">
                            广告图片
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 97px;" aria-label="CSS grade: activate to sort column ascending">
                            图片链接
                        
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 97px;" aria-label="CSS grade: activate to sort column ascending">
                            操作
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
                            {{$v->title}}
                        </td>
                        <td class=" ">
                            <img width="50px" src="{{$v->picture}}" alt="">
                           
                            
                        </td>
                        <td class=" ">
                        
                            {{$v->links}}
                            
                        </td>
                     
                         <td class=" ">
                            <a class='btn btn-primary' href="/Admin/advertising/{{$v->id}}/edit">修改</a>

                            <form action="/Admin/advertising/{{$v->id}}" method='post' style='display:inline'>
                                
                                {{csrf_field()}}
                                {{method_field('DELETE')}}

                                <button class='btn btn-danger'>删除</button>

                            </form>

                        </td>
                    </tr>
                    @endforeach

                  
                </tbody>
                </table>
                <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
                
                {{$rs->appends($request->all())->links()}}
            </div>
@stop
