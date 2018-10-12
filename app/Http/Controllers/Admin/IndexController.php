<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function init()
    {
    	return view('Admin.Index.index',['title'=>'后台首页']);
    }
}
