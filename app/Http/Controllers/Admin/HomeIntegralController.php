<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\HomeUsers;

class HomeIntegralController extends Controller
{
    //查看积分
    public function index(){
    	$integral = HomeUsers::get()->toarray();
    	return view('Admin.Integral.index',['integral'=>$integral]);
    } 
}
