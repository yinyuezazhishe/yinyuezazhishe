<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DetailsRequest;
use Illuminate\Support\Facades\Validator;
use App\Model\Admin\Category;
use App\Model\Admin\Lists;
use App\Model\Admin\Details;
use App\Model\Admin\DetailsContent;
use Illuminate\Support\Facades\DB;

class AdminDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($request -> author)) {

            $author = $request -> author;

            $d_c = DetailsContent::where('author','like','%'.$author.'%') -> get();
            $did = [];
            foreach ($d_c as $k=>$v) { 
                
                $did[] = $v->did;
            }

            $details = Details::with('details_content', 'lists') -> whereIn('id', $did) ->  orderBy('id', $request->input('sort', 'asc')) -> paginate($request -> input('num',5));

        } else {

            $details = Details::with('details_content', 'lists') -> orderBy('id', $request->input('sort', 'asc')) -> paginate($request -> input('num',5));
        }

        $cate = Category::get();

        // dd($details[0] -> lists -> cid);

        return view('Admin.Details.init',[
            'title'=>'浏览详情页',
            'request'=>$request,
            'details'=>$details,
            'cate'=>$cate,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rs = Category::select(DB::raw('*,concat(path,id) as paths'))-> orderBy('paths')->get();

        return view('Admin.Details.add', ['title' => '添加详情页', 'rs'=>$rs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 表单验证
        $detail = Validator::make($request->all(), [
                'title' => 'required|max:100|min:5',
                'author' => 'required|max:25|min:3',
                'saying' => 'required|max:150|min:10',
                'describe' => 'required|max:200|min:10',
                'content' => 'required',
                'cid' => 'required',
                'picstream' => 'required|image'
            ],[
                'title.required'=>'详情标题不能为空!',
                'title.max'=>'详情标题不得多于一百个字符!',
                'title.min'=>'详情标题不得少于五个字符!',
                'author.required'=>'详情作者不能为空!',
                'author.max'=>'详情作者不得多于二十五个字符!',
                'author.min'=>'详情作者不得少于三个字符!',
                'saying.required'=>'详情语录不能为空!',
                'saying.max'=>'详情语录不得多于一百五十个字符!',
                'saying.min'=>'详情语录不得少于十个字符!',
                'describe.required'=>'详情描述不能为空!',
                'describe.max'=>'详情描述不得多于二百个字符!',
                'describe.min'=>'详情描述不得少于十个字符!',
                'content.required'=>'详情不能为空!',
                'cid.required'=>'分类名称不能为空!',
                'picstream.required'=>'您还没有选择图片哦!',
                'picstream.image'=>'您选择的文件不是图片哦, 请重新选择!'
            ]
        );

        if ($detail->fails()) {
            return back() ->withErrors($detail) ->withInput();
        }

        $rs = $request->except('_token', 'cid');

        // 列表表添加数据
        $list['cid'] = $request -> input('cid');

        $list['status'] = '0';

        $lists = Lists::create($list);

        $lid = $lists->id;

        $lists = $lists::find($lid);

        // 详情主表添加数据
        $deta['status'] = '0';

        // 使用模型向详情主表添加数据
        $details = $lists -> details() -> create($deta);

        // 欣赏图片上传
        if($request->hasFile('picstream')){

            $files = $request->file('picstream');

            // 自定义名字
            $name = date('YmdHis').rand(1000, 9999);

            // 获取后缀名
            $suffix = $files -> getClientOriginalExtension();

            // 上传图片
            $files -> move('admins/uploads/d_content', $name.'.'.$suffix);
        }

        $rs['picstream'] = '/admins/uploads/d_content/'.$name.'.'.$suffix;

        $rs['addtime'] = time();

        // dd($rs);

        //添加数据
        try{

            //使用模型关联向详情内容表添加数据
            $d_content = $details -> details_content() -> create($rs);

            // 判断三个表是否添加数据成功
            if($lists && $details &&  $d_content){

                return redirect('/admin/details')->with('success','添加详情成功!');
            }

        }catch(\Exception $e){

            // echo $e -> getMessage();

            // echo $e -> getLine();

            return back()->with('error','添加详情失败!');

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
        $rs = DetailsContent::find($id);

        // 显示详情内容
        return view('Admin.Details.show_c', ['title' => '浏览详情内容页', 'rs'=>$rs]);
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

        $res = Details::with('details_content', 'lists') -> find($id);

        // dd($res -> lists -> cid);

        // 返回详情修改页面
        return view('Admin.Details.edit', ['title' => '修改详情内容页', 'res'=>$res, 'rs'=>$rs]);
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
        // 表单验证
        $detail = Validator::make($request->all(), [
                'title' => 'required|max:100|min:5',
                'author' => 'required|max:25|min:3',
                'saying' => 'required|max:150|min:10',
                'describe' => 'required|max:200|min:10',
                'content' => 'required',
            ],[
                'title.required'=>'详情标题不能为空!',
                'title.max'=>'详情标题不得多于一百个字符!',
                'title.min'=>'详情标题不得少于五个字符!',
                'author.required'=>'详情作者不能为空!',
                'author.max'=>'详情作者不得多于二十五个字符!',
                'author.min'=>'详情作者不得少于三个字符!',
                'saying.required'=>'详情语录不能为空!',
                'saying.max'=>'详情语录不得多于一百五十个字符!',
                'saying.min'=>'详情语录不得少于十个字符!',
                'describe.required'=>'详情描述不能为空!',
                'describe.max'=>'详情描述不得多于二百个字符!',
                'describe.min'=>'详情描述不得少于十个字符!',
                'content.required'=>'详情不能为空!',
            ]
        );

        if ($detail->fails()) {
            return back() ->withErrors($detail) ->withInput();
        }

        $rs = $request -> except('_token', '_method');

        $d_c = DetailsContent::find($id);

        $picstream = $d_c->picstream;

        // 欣赏图片上传
        if($request->hasFile('picstream')){

            $files = $request->file('picstream');

            if (!preg_match_all("/^(gif|jpeg|png|jpg|bmp)$/i",$files->getClientOriginalExtension())) {
                return back()->with('error','您上传的不是图片格式, 请重新上传！') -> withInput();
            }

            if (!empty($picstream)) {

                unlink('.'.$picstream);
            }

            // 自定义名字
            $name = date('YmdHis').rand(1000, 9999);

            // 获取后缀名
            $suffix = $files -> getClientOriginalExtension();

            // 上传图片
            $files -> move('admins/uploads/d_content', $name.'.'.$suffix);

            // 保存到数据库
            $rs['picstream'] = '/admins/uploads/d_content/'.$name.'.'.$suffix;
        }

        try{
           
            $data = DetailsContent::where('id', $id)->update($rs);


            if($data){

                return redirect('/admin/details')->with('succes','修改详情成功');
            }

        }catch(\Exception $e){

            return back()->with('errors','修改详情失败') -> withInput();

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
        //
    }

    /**
     *  Display a listing of the resource.
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
           
            $data = Details::where('id', $id)->update($sta);

            $d = Details::find($id);

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
