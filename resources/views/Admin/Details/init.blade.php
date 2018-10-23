@extends('Admin.Public.layout')

@section('content')

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>{{$title}}</h5>                        
        </div>        
            <div class="ibox-content">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                    <form action="/admin/details" method="get">
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
                                    <input type="text" placeholder="请输入详情作者" class="input-sm form-control" name="author" value="{{$request->author}}"> <span class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary"> 搜索</button> </span>
                                </div>
                            </div>                  
                        </div>
                    </form>
                <div style="height: 30px;"></div>           
                <table class="table table-striped table-bordered table-hover dataTables-example dataTable text-center">
                    <thead>
                        <tr role="row">
                            <th style="width: 70px;" class="text-center">详情id</th>
                            <th style="width: 80px;" class="text-center">分类名称</th>
                            <th style="width: 116px;" class="text-center">详情标题</th>   
                            <th style="width: 100px;" class="text-center">详情作者</th>   
                            <th style="width: 116px;" class="text-center">详情语录</th>   
                            <th style="width: 116px;" class="text-center">详情描述</th>   
                            <th style="width: 106px;" class="text-center">图片欣赏</th>
                            <th style="width: 180px;" class="text-center">操作</th>
                        </tr>
                    </thead>
                    <tbody>    
                        @foreach ($details as $k=>$v)
                        <tr class="gradeA odd">
                            <td>{{$v->id}}</td>
                            <td>
                                @foreach ($cate as $kk=>$vv)
                                    @if($v->lists->cid == $vv->id)
                                        {{$vv->catename}}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{$v->details_content->title}}</td>
                            <td>{{$v->details_content->author}}</td>
                            <td>{{$v->details_content->saying}}</td>
                            <td>{{$v->details_content->describe}}</td>
                            <td>
                                <img src="{{$v->details_content->picstream}}" height="120px">
                            </td>
                            <td class="st">
                                <a style="width: 40px;" @if($v->status == 0) title="启用" @elseif($v->status==1) title="禁用" @endif href="/admin/details/{{$v->id}}/edit_status" class="btn status btn-info btn-small"><i style="font-size: 17px;" @if($v->status == 0) class="fa fa-check-circle-o" @elseif($v->status==1) class="fa fa fa-ban" @endif ></i></a>
                                <a style="width: 40px" title="查看详情内容" href="/admin/details/{{$v->id}}" class="btn btn-info btn-small"><i  class="fa fa-th-large"></i></a>
                                <a href="/admin/details/{{$v->id}}/edit" title="修改" class="btn btn-info btn-small"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="/admin/lists?id={{$v->id}}" class="btn btn-danger btn-small del" title="删除"><i class="glyphicon glyphicon-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="dataTables_info" id="DataTables_Table_0_info" role="alert"
                        aria-live="polite" aria-relevant="all">
                            显示 {{$details->firstItem()}} 到 {{$details->lastItem()}} 项，共 {{$details->total()}} 项
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                            {{$details->appends($request->all())->links()}}
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
		var show_details = $('.show_details').parents('li');
		$('.show_details a').css({'color':'#fff'});
		show_details.attr('class','active');

        $('.status').click(function ()
        {
            var status = '';
            // console.log($(this).children(':first').attr('class'))
            if ($(this).find('i').attr('class') == 'fa fa-check-circle-o') {

                status = 0;

            } else {

                status = 1;
            }

            var url = $(this).attr('href');

            var sta = $(this);

            // console.log(status);
            $.ajax({
                url: url,
                data: {status: status},
                type: "GET",
                dataType: "json",
                success: function (data) {
                    if (data == 20) {
                        sta.attr('title', '禁用');
                        sta.find('i').attr('class', 'fa fa-ban');
                        swal("恭喜你!", "禁用成功!", "success");
                    } else if(data == 10) {
                        sta.attr('title', '启用');
                        sta.find('i').attr('class', 'fa fa-check-circle-o');
                        swal("恭喜你!", "启用成功!", "success");
                    } else if (data == 1) {
                        swal("对不起!", "修改状态失败!", "error");
                    }
                },
                error: function(){
                    swal("对不起!", "修改状态失败!", "error");
                },
                async: true
            });

            return false;
        })

        // flags();

        $('.del').click(function ()
        {
            var hrefs= $(this).attr('href');
            swal({
                title: "您确定要删除此条详情吗?",
                text: "点击OK将会自动跳转至列表进行删除操作, 请谨慎操作!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                
            }).then((willDelete) =>{
                if (willDelete) {
                    window.location.href=hrefs;
                } else {
                    return false;
                }
            });

            return false;
        })
    

	</script>

	@if(session('succes'))  
    <script type="text/javascript">
        swal("恭喜您!", "{{session('succes')}}", "success");
    </script>
    @endif

    <script src="/homes/js/sweetalert.min.js"></script>

@stop