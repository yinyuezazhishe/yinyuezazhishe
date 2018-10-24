@extends('Admin.Public.layout')

@section('content')

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>{{$title}}</h5>                        
        </div>        
            <div class="ibox-content">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                    <form action="/admin/lists" method="get">
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
                                    <input type="text" placeholder="请输入分类名称" class="input-sm form-control" name="cid" value="{{$request->cid}}"> <span class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary"> 搜索</button> </span>
                                </div>
                            </div>                  
                        </div>
                    </form>
                <div style="height: 30px;"></div>           
                <table class="table table-striped table-bordered table-hover dataTables-example dataTable text-center">
                    <thead>
                        <tr role="row">
                            <th style="width: 70px;" class="text-center">列表id</th>
                            <th style="width: 80px;" class="text-center">分类名称</th>
                            <th style="width: 170px;" class="text-center">操作</th>
                        </tr>
                    </thead>
                    <tbody>    
                        @foreach ($lists as $k=>$v)
                        <tr class="gradeA odd">
                            <td>{{$v->id}}</td>
                            <td>
                                {{$v->category->catename}}
                            </td>
                            <td class="st">
                                <a style="width: 40px;" href="/admin/lists/{{$v->id}}/edit_status" @if($v->status == 0) title="启用" @elseif($v->status==1) title="禁用" @endif  class="btn status btn-info btn-small"><i style="font-size: 17px;" @if($v->status == 0) class="fa fa-check-circle-o" @elseif($v->status==1) class="fa fa-ban" @endif ></i></a>
                                <a href="/admin/lists/{{$v->id}}/edit" title="修改" class="btn btn-info btn-small"><i class="glyphicon glyphicon-edit"></i></a>
                                <form action="/admin/lists/{{$v->id}}" method="post" class="dels" style="display: inline;">
                                    {{--csrf_field()--}}
                                    {{--method_field('DELETE')--}}
                                    <button class="btn btn-danger btn-small del" title="删除" data-id="{{$v->id}}"><i class="glyphicon glyphicon-trash"></i></button>
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
                            显示 {{$lists->firstItem()}} 到 {{$lists->lastItem()}} 项，共 {{$lists->total()}} 项
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                            {{$lists->appends($request->all())->links()}}
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
		var show_lists = $('.show_lists').parents('li');
		$('.show_lists a').css({'color':'#fff'});
		show_lists.attr('class','active');

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
        });

        $('.dels').click(function ()
        {
            var hrefs= $(this).attr('action');
            
            swal({
                title: "您确定要删除此条列表吗?",
                text: "点击OK将会删除此条列表, 请谨慎操作!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                
            }).then((willDelete) =>{
                if (willDelete) {
                    $.ajax({
                        url: hrefs,
                        data: {"_method" : "DELETE"},
                        type: "POST",
                        dataType: "json",
                        success: function (data) {
                            if (data == 0) {
                                location.reload(true);
                                swal("恭喜您!", "删除列表成功!", "success");
                                window.location.href = '/admin/lists';
                            } else if (data == 1) {
                                swal("对不起!", "删除列表失败!", "error");
                            }
                        },
                        error: function(){
                            swal("对不起!", "删除列表失败!", "error");
                        },
                        async: true
                    });
                }
            });

            return false;
        })

	</script>

    <script src="/homes/js/sweetalert.min.js"></script>

	@if(session('succes'))  
    <script type="text/javascript">
        swal("恭喜您!", "{{session('succes')}}", "success");
    </script>
    @endif


@stop