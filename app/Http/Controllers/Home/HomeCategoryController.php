<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
class HomeCategoryController extends Controller
{
    public function CategoryLayout(Request $request)
    {
    	$CateGory = Category::select(DB::raw('*,concat(path,id) as path'))->
        where('catename','like','%'.$request->input('catename').'%')->
        orderBy('path');
        // dd($CateGory);
        return view('Home.Public.layout',[
        	'CateGory'=>$CateGory
        	]);
    }
}
