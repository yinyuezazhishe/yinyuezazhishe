<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Details;
use App\Model\Admin\Lists;

class HomeIndexController extends Controller
{
	/**
	 *  显示前台首页
	 *
	 *  @return \Illuminate\Http\Response.
	 */
    public function index()
    {
        // $details = Details::with('details_content', 'lists')->where('status', '<>', '1')->get();

        // // $details
        // $lid = [];
        // foreach ($details as $k => $v) {

        //     $lid[] = $v -> lists['id'];
        // }

        // // dd($lid);

        // $details = Details::with('details_content', 'lists')->whereIn('id', $lid)->orderBy('id', 'asc')->paginate(10);

        // dd($details);

    	return view('home/index');
    }

    /**
     *  删除 session
     *
     *  @return \Illuminate\Http\Response.
     */
    public function resession(Request $request)
    {
    	try{
            $request->session()->forget('unique');
            return 0;

        }catch(\Exception $e){
            return 1;
        }
    }
}
