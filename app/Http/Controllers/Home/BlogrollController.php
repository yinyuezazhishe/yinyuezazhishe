<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Blogroll;

class BlogrollController extends Controller
{
    //
    public function ShowBlogroll()
    {
    	$imglinks = Blogroll::where('type','0')->orderBy('rank','asc')->get();
    	$fontlinks = Blogroll::where('type','1')->orderBy('rank','asc')->get();
    	return view('Home.Blogroll.show',['imglinks'=>$imglinks,'fontlinks'=>$fontlinks]);
    }
}
