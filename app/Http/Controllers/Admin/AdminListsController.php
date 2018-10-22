<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Lists;
use App\Model\Admin\Category;
use Illuminate\Support\Facades\DB;
use App\Model\Admin\DetailsContent;

class AdminListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($request->cid)) {

            $cate = Category::where('catename','like','%'.$request->cid.'%')->get();

            // dd($cate);

            $cid = [];
            foreach ($cate as $k => $v) {

                $cid[] = $v -> id;
            }

            // dd($cid);

            // $cid[] = [];

            $lists = Lists::with('category')->whereIn('cid', $cid)->orderBy('id', $request->input('sort', 'asc'))->paginate($request->input('num',5));
            
        } else {
            $id = [];

            if (!empty($request->id)) {

                $id[] = ['id', $request -> id];
            }

            $lists = Lists::where($id)->with('category')->orderBy('id', $request->input('sort', 'asc'))->paginate($request->input('num',5));

            // dd($lists);
        }

        // dd($cate);

        return view('Admin.Lists.init',[
            'title'=>'浏览列表',
            'request'=>$request,
            'lists'=>$lists
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit($id)
    {
        $rs = Category::select(DB::raw('*,concat(path,id) as paths'))-> orderBy('paths')->get();

        $res = Lists::with('category')->find($id);

        // dd($res -> lists -> cid);

        // 返回详情修改页面
        return view('Admin.Lists.edit', ['title' => '修改列表页', 'res'=>$res, 'rs'=>$rs]);
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
        $rs = $request -> except('_token', '_method');

        try{
           
            $data = Lists::where('id', $id)->update($rs);

            if($data){

                return redirect('/admin/lists')->with('succes','修改列表成功');
            }

        }catch(\Exception $e){

            return back()->with('errors','修改列表失败');
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
        // 删除列表主表删除数据
        $lists = Lists::find($id);
        $lists->delete();

        //使用模型关联向详情表删除数据
        $details = $lists->details();
        $details -> delete();

        try{
            //使用模型关联向详情内容表删除数据
            $d_content = DetailsContent::find($id);

            unlink('.'.$d_content->picstream);

            $d_content->delete();

            // 判断三个表是否删除数据成功
            if ($lists && $details && $d_content) {
                return 0;
            }

        }catch(\Exception $e){

            return 1;
        }       
    }

    /**
     *  列表修改状态
     *
     *  @return \Illuminate\Http\Response.
     */
    public function edit_status(Request $request, $id)
    {
        $status = $request -> input('status');

        $sta = [];

        if ($status == 0) {

            $sta['status'] = 1;

        } else {

            $sta['status'] = 0;
        }

        // var_dump( $sta);

        try{
           
            $data = Lists::where('id', $id)->update($sta);

            $d = Lists::find($id);
            
            $stat = $d->status;

            if($data){

                echo $stat + 1;
                return 0;
            }

        }catch(\Exception $e){

            // echo getMessage();

            return 1;
        }
    }
}
