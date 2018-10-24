<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Blogroll;
use Config;

class AdminBlogrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //多条件查询
        $rs = Blogroll::orderBy('rank','asc')
            ->where(function($query) use($request){
                //检测关键字
                $title = $request->input('title');
                //如果链接名称不为空
                if(!empty($title)) {
                    $query->where('title','like','%'.$title.'%');
                }
            })->paginate($request->input('num', 5));

        // $rs = Blogroll::orderBy('rank','asc')->get();
        
        return view('admin.blogroll.index',['blogroll'=>$rs,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //       
        return view('Admin.Blogroll.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $links = $request->except(['_token','picture']);
        if($request->hasFile('picture')){
            $name = time().rand(1000,9999);

            //获取后缀
            $suffix = $request->file('picture')->getClientOriginalExtension();
            //移动
            $request->file('picture')->move('admins/uploads/links/',$name.'.'.$suffix);      

            //拼接地址
             $links['picture'] = '/admins/uploads/links/'.$name.'.'.$suffix;      
        }    
        $links['rank'] = mt_rand(1,10);   
        $rs = Blogroll::create($links);        
        if($rs){
            //跳转
            return redirect('/admin/blogroll')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        //查询当前id的整条数据     
        $rs = Blogroll::where('id',$id)->first();
       
        return view('admin.blogroll.edit',['rs'=>$rs]);
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
        // dd($request->input('title'));   
        $title = Blogroll::where('title',$request->input('title'))->get();
        if(count($title) > 1){
            return back()->with('error','该用户已存在');
        } 
        $linksdata = $request->except(['_token','_method','picture','oldpicture']);
        if($request->hasFile('picture') && $request->has('picture')){
            //生成文件名随机数
            $name = time().rand(1000,9999);
            //获取后缀
            $suffix = $request->file('picture')->getClientOriginalExtension();
            //移动
            $request->file('picture')->move('admins/uploads/links/',$name.'.'.$suffix);      

            //拼接地址
            $linksdata['picture'] = '/admins/uploads/links/'.$name.'.'.$suffix;
            //获取原图片完整路径进行删除操作
            if($request->input('oldpicture')){
                $path = Config::get('app.imgpath').$request->input('oldpicture');
                unlink($path);
            }
        }
        $rs = Blogroll::where('id',$id)->update($linksdata);
        if($rs){
            return redirect('/admin/blogroll')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //
        $oldpic = $request->input('oldpicture');        
        try{
            $rs = Blogroll::where('id',$id)->delete();
            if($rs){
                if($oldpic){
                    $oldPicPath = Config::get('app.imgpath').$oldpic;
                    unlink($oldPicPath);
                }
                session(['success'=>'删除成功']);
                return 1;
            }else{
                session(['error'=>'删除失败']);
                return 0;
            }
        }catch(\Exception $e){
            session(['error'=>'删除失败']);
            return 0;
        }
    }

    /**
     *    排序
     *
     *    @return 
     */
    public function rank(Request $request)
    {
        $id = $request->input('id');
        $rank = $request->input('rank');
        try{
            foreach($id as $k=>$v){
                $rs = Blogroll::where('id',$v)->update(array('rank'=>$rank[$k]));
                // pdate `blogroll` set `rank` = 2 where `id` in (3, 4)
            }
            if($rs){
                session(['success'=>'排序成功']);
                return 1;
            }else{
                session(['error'=>'排序失败']);
                return 0;
            }
        }catch(\Exception $e){
            session(['error'=>'排序失败']);
            return 0;
        }
    }

    /**
     * 检查链接名的唯一性
     *
     * @param  
     * @return \Illuminate\Http\Response
     */
    public function mytitle(Request $request)
    {
        $title = $request ->input('mytitle');
        
        $title = Blogroll::where('title',$title)->first();
        if($title){
            return 1;
        }else{
            return 2;
        }
    }

}
