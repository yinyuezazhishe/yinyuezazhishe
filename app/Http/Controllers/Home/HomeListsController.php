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

            $title = CateGory::where('id', $id) -> first();
            
            $arr_cid[] = $id;

            $lists = Lists::with('details')->where($condition)->whereIn('cid', $arr_cid)->get();

            // dd($lists[0]);
            $l_id = [];
            foreach ($lists as $k => $v) {

                $l_id[] = $v->id;
            }
            // dd($l_id);

            $d_content = Details::with('details_content')->where('status', '<>', '1')->whereIn('id', $l_id)->orderBy('id', 'desc')->paginate(5);
            // dd($d_content);
        }
        
        return view('Home.Lists.index', ['title' => "音乐杂志社-".$title->catename, 'd_content' => $d_content]);
    }


    /**
     *  搜索
     *
     *  @return \Illuminate\Http\Response.
     */
    public function search(Request $request)
    {
        $d_content = DetailsContent::where('title','like','%'.$request->title.'%')->get();

        // dd($d_content);

        foreach ($d_content as $k => $v) {
            $did[] = $v->did;
        }

        // dd($did);

        $d_content = Details::with('details_content')->where('status', '<>', '1')->whereIn('id', $did)->orderBy('id', 'desc')->paginate(5);

        return view('Home.Lists.index', ['title' => "音乐杂志社-".$request->title, 'd_content' => $d_content]);
    }
}