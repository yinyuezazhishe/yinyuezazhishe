<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Banner;
use DB;
use Config;
class AdminBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	 $rs = Banner::orderBy('id','asc')
        
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
            	return view('Admin.banner.index',[
            		'title'=>'轮播浏览',
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
    	$rs = Banner::select(DB::raw('*,concat(title,id) as title'))->
            orderBy('picture')->get();
            // dd($rs);
    	return view('Admin.banner.add',[
    		'title'=>'轮播图添加',
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

         // $data = Banner::where('id',$rs['title'])->first();

         // $rs['title'] = $data->id;
         $gm = [];
         if($request->hasFile('picture')){
            $files = $request->file('picture');

            $gname = time().rand(1111,9999);

            $suffix = $files->getClientOriginalExtension();

            // dd(Config::get('app.uploads'));

            $files->move('admins/uploads/banner/', $gname.'.'.$suffix);

            $rs['picture'] = Config::get('app.uploads').'/banner/'.$gname.'.'.$suffix;
        }
        // dd($rs);

          //添加数据
        try{
            //关联模型
            $cds = Banner::create($rs);

            if($cds){

                return redirect('/admin/banner')->with('success','添加成功');

            }
        }catch(\Exception $e){

            return back()->with('error','添加失败');

        }
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rs = Banner::find($id);
        // dd($data);
        return view('Admin.banner.edit',[
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
        // dd($res);

        //文件上传
        //判断是否有文化上传
        if ($request -> hasFile('picture')) {

            //自定义名字
            $gname = time().rand(1111,9999);

            //获取后缀
            $suffix = $request->file('picture')->getClientOriginalExtension(); 

            //移动
            $request -> file('picture') -> move('admins/uploads/banner/',$gname.'.'.$suffix);

             //头像文件路径
            $res['picture'] = Config::get('app.uploads').'/banner/'.$gname.'.'.$suffix;
        }
    

            
            $rs = Banner::where('id',$id) -> update($res);

            if($rs){
                return redirect('/admin/banner')->with('success','修改成功');
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

            $rs = Banner::where('id',$id) -> delete();

            if ($rs) {

                return redirect('/admin/banner') -> with('success','删除成功');
            }
        }catch(\Exception $e){
            
                 return back() -> with('error','删除失败');
            }
    }
}

