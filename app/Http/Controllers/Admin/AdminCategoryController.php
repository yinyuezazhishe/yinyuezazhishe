<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use DB;
class AdminCategoryController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index(Request $request)
	{

		$rs = Category::select(DB::raw('*,concat(path,id) as path'))->
        where('catename','like','%'.$request->input('catename').'%')->
        orderBy('path')->
        paginate($request->input('num',5));
        $result = $rs[0]->catename;
        // dd($result);
        foreach($rs as $k => $v){

            $n = substr_count($v -> path, ',') - 1;

            $v->catename = str_repeat('&nbsp;', $n * 8).'|--'.$v -> catename;
            
        }

        // dd($rs);

		return view('Admin.category.index',[
			'title'=>'类别浏览',
			'rs'=>$rs,
			'request'=>$request

		]);
	}
 	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 	public function create(Request $request)
 	{
 		 $ids=empty($request->only('id')['id']) ? '' : $request->only('id')['id'];
 		 // dd($ids);
 		 $rs = Category::select(DB::raw('*,concat(path,id) as path'))->
            orderBy('path')->get();

            foreach($rs as $k => $v){

            	// echo $v -> path.'<hr>';

            $n = substr_count($v -> path, ',') - 1;

            // dd($n);

            $v->catename = str_repeat('&nbsp;', $n * 8).'|--'.$v -> catename;

            // $v->catename = str_repeat('|--', $n).$v -> catename;
        }
            // dd($rs);
		return view('Admin.category.add',[
			'title'=>'添加类别',
			'rs'=>$rs,
			'ids'=>$ids
		]);
 	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 	public function store(Request $request)
 	{
 		
 		 $rs = $request->except('_token');

        if($rs['pid'] == '0'){

            $rs['path'] = '0,';
        } else{

            $data = Category::where('id',$rs['pid'])->first();

            $rs['path'] = $data->path.$data->id.',';
        }

        try{
           
            $info =  Category::create($rs);

            
            if($info){

                return redirect('/Admin/category')->with('success','添加成功');
            }
        }catch(\Exception $e){

            return back()->with('error','添加失败');

        }
 	}
 	
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 	public function edit($id)
 	{
        
 		$rs = Category::find($id);

        // dd($rs);
        return view('Admin.category.edit',[
            'title'=>'修改类名',
            'rs'=>$rs
            // 'ids'=>$ids

        ]);
 	}


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 	public function update(Request $request, $id)
 	{

 		$rs = $request->only('catename');
       
 		try{
           
            $data = Category::where('id',$id)->update($rs);
            // dd($data);

            if($data){

                return redirect('/Admin/category')->with('success','修改成功');
            }
        }catch(\Exception $e){

            return back()->with('error','修改失败');

        }
 	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 	public function destroy($id)
 	{
 		 try{
           
           $data = Category::where('id',$id)->delete();
            // dd($data);
            if($data){

                return redirect('/Admin/category')->with('success','删除成功');
            }
        }catch(\Exception $e){

            return back()->with('error','删除失败');

        }

 	}
}
