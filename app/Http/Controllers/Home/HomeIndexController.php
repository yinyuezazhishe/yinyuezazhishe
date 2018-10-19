<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Details;

class HomeIndexController extends Controller
{
	/**
	 *  显示前台首页
	 *
	 *  @return \Illuminate\Http\Response.
	 */
    public function index()
    {
    	$details = Details::with('details_content', 'lists') ->  orderBy('id', 'asc') -> paginate(10);

    	return view('home/index', ['details' => $details]);
    }
}
