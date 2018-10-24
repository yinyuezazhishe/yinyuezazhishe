<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Config;
use App\Model\Admin\Advertising;
class AdminAdvertisingController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    	$rs = Advertising::orderBy('id','asc')
    	->where(function($query) use($request){
                //检测关键字
                $title = $request->input('title');
                $ids = $request->input('picture');
            
                if(!empty($title)) {
                    $query->where('title','like','%'.$title.'%');
                }
                if(!empty($picture)){
                    $quert->where('picture','like','%'.$picture.'%');
                }
            })
                ->paginate($request->input('num', 5));
                 // dd($rs->input('ranks'));
            	return view('Admin.advertising.index',[
            		'title'=>'广告浏览',
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
    	$rs = Advertising::select(DB::raw('*,concat(title,id) as title'))->
            orderBy('picture')->get();
            // dd($rs);   
        return view('Admin.advertising.add',[
        	'title'=>'广告添加',
        	'rs'=>$rs
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
    	$rs = $request->except('_token','picture');

    	$gm = [];
        if($request->hasFile('picture')){

            $files = $request->file('picture');



            $gname = time().rand(1111,9999);

            $suffix = $files->getClientOriginalExtension();

            // dd(Config::get('app.uploads'));

            $files->move('admins/uploads/advertising/', $gname.'.'.$suffix);

            $rs['picture'] = Config::get('app.uploads').'/advertising/'.$gname.'.'.$suffix;
        }

        // dd($rs);

        //添加数据
        try{
            //关联模型
            $cds = Advertising::create($rs);

            if($cds){
                return redirect('/admin/advertising')->with('success','添加成功');
            }

        }catch(\Exception $e){

            // echo $e -> getMessage();

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
    	 $rs = Advertising::find($id);
        // dd($data);
        return view('Admin.advertising.edit',[
            'title'=>'修改页面',
            'rs'=>$rs

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
		
    	$res = $request -> except('_token','picture','_method','picture');
    	 // dd($request -> all());
    	 //文件上传
        //判断是否有文化上传
        if ($request -> hasFile('picture')) {
           
            //自定义名字
            $gname = time().rand(1111,9999);

            //获取后缀
            $suffix = $request->file('picture')->getClientOriginalExtension(); 

            //移动
            $request -> file('picture') -> move('admins/uploads/advertising/',$gname.'.'.$suffix);

             
            $res['picture'] = Config::get('app.uploads').'/advertising/'.$gname.'.'.$suffix;

            
        }  
        // dd($res);      
            $rs = Advertising::where('id',$id) -> update($res);

            if($rs){
                return redirect('/admin/advertising')->with('success','修改成功');
            } else {
                return back() -> with('error','未做任何修改');
            }
            return back()->with('error','修改失败');
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

            $rs = Advertising::where('id',$id) -> delete();

            if ($rs) {

                return redirect('/admin/advertising') -> with('success','删除成功');
            }
        }catch(\Exception $e){
            
                 return back() -> with('error','删除失败');
            }
    }
}
