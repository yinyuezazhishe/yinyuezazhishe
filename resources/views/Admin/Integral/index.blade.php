@extends('Admin.Public.layout')

@section('content')
	<div class="col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>查看会员积分</h5>
            </div>
            <div class="ibox-content">
                <table class="footable table table-stripped toggle-arrow-tiny default breakpoint footable-loaded" data-page-size="8" style="border-collapse: unset;">
                    <thead>
	                    <tr>
	                        <th data-toggle="true" class="footable-visible footable-first-column footable-sortable">产品<span class="footable-sort-indicator"></span></th>
	                        <th class="footable-visible footable-sortable">名字<span class="footable-sort-indicator"></span></th>
	                        <th class="footable-visible footable-sortable">电话<span class="footable-sort-indicator"></span></th>
	                        <th class="footable-visible footable-last-column footable-sortable">操作<span class="footable-sort-indicator"></span></th>
	                    </tr>
                    </thead>
                    @foreach($integral as $k=>$v)
                    <tbody>
	                    <tr class="footable-even" style="display: table-row;">
	                        <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>2015韩国童装韩版牛仔童短裤</td>
	                        <td class="footable-visible">袁岳</td>
	                        <td class="footable-visible">0800 051213</td>
	                        <td class="footable-visible footable-last-column"><a href="#"><i class="fa fa-check text-navy"></i> 通过</a></td>
	                    </tr>
                    </tbody>
                    @endforeach
                    <tfoot>
	                    <tr>
	                        <td colspan="5" class="footable-visible">
	                            <ul class="pagination pull-right"><li class="footable-page-arrow disabled"><a data-page="first" href="#first">«</a></li><li class="footable-page-arrow disabled"><a data-page="prev" href="#prev">‹</a></li><li class="footable-page active"><a data-page="0" href="#">1</a></li><li class="footable-page"><a data-page="1" href="#">2</a></li><li class="footable-page-arrow"><a data-page="next" href="#next">›</a></li><li class="footable-page-arrow"><a data-page="last" href="#last">»</a></li></ul>
	                        </td>
	                    </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
@stop
@section('js')
<script type="text/javascript">
	//改变导航条样式
	var showintegral = $('.showintegral').parents('li');		
	$('.showintegral a').css({'color':'#fff'});
	showintegral.attr('class','active');
</script>
@stop