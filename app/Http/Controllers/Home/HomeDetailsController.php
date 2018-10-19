<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\DetailsContent;
use App\Model\Admin\Details;

class HomeDetailsController extends Controller
{
	/**
	 *  显示详情页
	 *
	 *  @return \Illuminate\Http\Response.
	 */
    public function index(Request $request, $id)
    {
    	$d_content = DetailsContent::where('id', $id)->first();

    	$details = Details::with('details_content', 'lists') ->  orderBy('id', 'asc') -> paginate(10);
    	// dd($d_content);

    	return view('Home.Details.index', ['d_content'=>$d_content, 'details' => $details, 'title' => '音乐杂志社']);

    }
}
