<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\CateGory;
use App\Model\Admin\Lists;
use App\Model\Admin\DetailsContent;
use App\Model\Admin\Details;

class HomeListsController extends Controller
{
    /**
     *  显示前台列表
     *
     *  @return \Illuminate\Http\Response.
     */
    public function index(Request $request, $id)
    {
    	$condition = [];

        $condition[] = ['status', '<>', 1];     // 如果列表下架，那么就不会被查询出来

        // 如果传类别ID
        if (!empty($id)) {

            $arr_cid = CateGory::where('path', 'like', "%,$id,%") -> pluck('id');

            // dd($arr_cid);
            $arr_cid[] = $id;

            $lists = Lists::with('details')->where($condition)->whereIn('cid', $arr_cid)->get();

	        // dd($lists[1]->id);
	        $l_id = [];
	        foreach ($lists as $k => $v) {

	        	$l_id[] = $v->id;
	        }
	        // dd($l_id);

	        $d_content = DetailsContent::whereIn('id', $l_id)->orderBy('id', 'asc')->paginate(10);
	        // dd($d_content);

        } else  if (!empty($request->title)) {	// 如果传详情标题

        	// $title = $request->title;

         //    $condition[] = ['title', 'like', '%'.$title.'%'];
        }
        
        return view('Home.Lists.index', ['title' => '音乐杂志社', 'd_content' => $d_content]);
    }
}
