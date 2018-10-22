<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\DetailsContent;
use App\Model\Admin\Details;
use App\Model\Admin\Lists;
use App\Model\Home\CateGory;
use Illuminate\Support\Facades\DB;
use counts_visits;

class HomeDetailsController extends Controller
{
	/**
	 *  显示详情页
	 *
	 *  @return \Illuminate\Http\Response.
	 */
    public function index(Request $request, $id)
    {
        $details = Details::with('details_content')->where('id', $id)->first();

    	// dd($details);

        $praise = DB::table('praise')->where('d_c_id', $id) -> get();

        $pr = '';
        if (!empty(session('homeuser'))) {
            $pr = DB::table('praise')->where([['d_c_id', $id], ['u_id', session('homeuser')->id]]) -> first();
        }

        // 猜你喜欢
        $lists = Lists::with('category')->where('id', $id)->first();

        // echo $lists->category->path;
        $cid = trim(strstr($lists->category->path, ','), ',');

        // dd();

        $category = CateGory::with('lists')->where('pid', $cid)->get();

        foreach ($category as $k => $v) {
            foreach ($v -> lists as $k => $v) {
                if ($id != $v -> id) {
                    $lid[] = $v -> id;
                }
            }
            // $v -> lists;
        }

        $detail = DetailsContent::where('id', $lid)->limit(3)->get();

        // dd($lid);

    	return view('Home.Details.init', ['details' => $details, 'detail' => $detail, 'praise' => $praise, 'pr' => $pr, 'title' => '音乐杂志社']);

    }

    /**
     *  点赞
     *
     *  @return \Illuminate\Http\Response.
     */
    public function praise(Request $request)
    {
        if (empty(session('homeuser'))) {
            return 4;
        }

        $res = $request -> all();
        $pr['u_id'] = session('homeuser')->id;
        $pr['d_c_id'] = $res['id'];

        $praise = DB::table('praise')->where([['u_id', $pr['u_id']], ['d_c_id', $pr['d_c_id']]]) -> first();

        // var_dump($pr);die;

        if (!empty($praise)) {

            try{

                $data = DB::table('praise')->where([['u_id', $pr['u_id']], ['d_c_id', $pr['d_c_id']]]) -> delete();

                if($data){

                    return 2;
                }

            }catch(\Exception $e){

                return 3;
            }

        } else{

            try{

                $data = DB::table('praise')->insert($pr);

                if($data){

                    return 0;
                }

            }catch(\Exception $e){

                return 1;
            }
        }  
    }
}
