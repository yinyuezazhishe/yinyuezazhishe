<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use DB;
use App\Model\Admin\AdminUsers;
class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  

        

        $rs = AdminUsers::orderBy('id','asc')
        -> where(function($query) use($request){
                //检测关键字
                $username = $request->input('username');
                //如果用户名不为空
                if(!empty($username)) {
                    $query->where('username','like','%'.$username.'%');
                }
            })
            ->paginate($request->input('num', 5));;
        // dd($rss);
        return view('/Admin/User/index',['title'=>'用户浏览页面','rs'=>$rs,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/User/add',['title'=>'添加用户']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //表单验证
        $this -> validate($request,[
            'username' => 'required|regex:/^\w{6,12}$/',
            'password' => 'required|regex:/^\S{6,12}$/',
            'repass' => 'same:password',

        ],[
            'username.required' => '用户名不能为空',
            'password.required' => '密码不能为空',
            'username.regex' => '用户名格式不正确',
            'password.regex' => '密码格式不正确',
            'repass.same' => '两次密码不一致',

        ]);

        $res = $request -> except('_token','face','repass');

        //文件上传
        //判断是否有文化上传
        if ($request -> hasFile('face')) {
            
            //自定义名字
            $name = time().rand(1111,9999);

            //获取后缀
            $suffix = $request->file('face')->getClientOriginalExtension(); 

            //移动
            $request -> file('face') -> move('admins/uploads/face',$name.'.'.$suffix);
             //头像文件路径

            $res['face'] = '/admins/uploads/face/'.$name.'.'.$suffix;

        } else {

            $res['face'] = '/admins/uploads/face/default.jpg';
        }

       

        //哈希加密秘密
        $res['password'] = Hash::make($request->input('password'));

        //创建用户时间
        $res['addtime'] = time();

        try{

            $rs = AdminUsers::create($res);

            if ($rs) {
                
                return redirect('/admin/user')->with('success','添加成功');
            }

        }catch(\Exception $e){
            $request->flash();
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
    public function edit($id)
    {   
        //通过id获取数据
        $rs = AdminUsers::find($id);
        // dd($rs);

        return view('/Admin/User/edit',['title'=>'修改用户','rs'=>$rs]);
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
        $res = $request -> except('_token','face','_method','oldface','uid');

        $uid = $request -> input('uid');
       
        // dd($oldFace);

        //文件上传
        //判断是否有文化上传
        if ($request -> hasFile('face')) {

           
            //自定义名字
            $name = time().rand(1111,9999);

            //获取后缀
            $suffix = $request->file('face')->getClientOriginalExtension(); 

            //移动
            $request -> file('face') -> move('admins/uploads/face',$name.'.'.$suffix);

             //头像文件路径

            $res['face'] = '/admins/uploads/face/'.$name.'.'.$suffix;


             //获取原来头像的url地址
            $oldFace = $request->input('oldface');
            //删除原来头像
            if ($oldFace) {
                unlink('.'.$oldFace);
            }

            if($id == $uid){
                
                session(['adminusers_face' => $res['face']]);
            }
            session(['adminusers_face' => $res['face']]);
        }

            
            $rs = AdminUsers::where('id',$id) -> update($res);
            if ($rs) {

               return redirect('/admin/user') -> with('success','修改成功');

            } else {

                return back() -> with('error','未做任何修改');
            }

            return back() -> with('error','修改失败');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $oldface = $request->input('oldpicture');

        try{

            $rs = AdminUsers::where('id',$id)->delete();

            if ($rs) {
                
                // 删除用户头像
                if ($oldface) {
                   unlink('.'.$oldface);
                }
                session(['success'=>'删除成功']);
                return 1;

            } else {

                session(['error'=>'删除失败']);
                return 0;
            }

        }catch(\Exception $e){

            session(['error'=>'删除失败']);
            return 0;

        }
    
    }

    /**
     * 判断用户名是否被占用
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //判断用户名是否已经被使用
    public function getName(Request $request)
    {
        $name = $request->get('username');

        $rs = AdminUsers::where('username',$name)->first();

        if (empty($rs)) {
            return "1";     //如果未被使用返回状态码 1
        } else {
            return "0";     //如果被使用返回状态码 0
        }
        
    }

    /**
     * 跳转到修改用户头像页面
     * @return \Illuminate\Http\Response
     */

    public function setFace()
    {
        return view('Admin.User.setface',['title'=>'修改头像']);
    }


    /**
     * 将用户头像进行修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function do_setFace(Request $request)
    {

        $res = $request -> except('_token');
        //文件上传
        //判断是否有文化上传
        if ($request -> hasFile('face')) {
           
            //自定义名字
            $name = time().mt_rand(11111,99999);

            //获取后缀
            $suffix = $request->file('face')->getClientOriginalExtension(); 

            //移动
            $request -> file('face') -> move('admins/uploads/face',$name.'.'.$suffix);

             //头像文件路径
            $res['face'] = '/admins/uploads/face/'.$name.'.'.$suffix;

            //获取原来头像的url地址
            $oldFace = session('adminusers_face');

            // dd($oldFace);
            
            //将新修改图片路径存进session
            session(['adminusers_face'=> $res['face']]);

            // dd(session('admin_user')->face);
            //删除原来的额旧头像
            if ($oldFace) {
                unlink('.'.$oldFace);
            } 
            try{
                $rs = AdminUsers::where('id',session('adminusers')->id) -> update($res);
                 if ($rs) {
                    return redirect('/admin') -> with('success','修改成功');
                }
            }catch(\Exception $e){
                return redirect('/admin') -> with('success','修改失败');
            }
        }

        return back() -> with('error','未进行修改');
    }


     /**
     * 用户修改密码页面
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function setPass()
    {
        return view('Admin.User.setpass',['title'=>'修改密码']);
    }


     /**
     * 将用户密码进行修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function doPass(Request $request)
    {
        //去掉不需要的数据
        $res = $request -> except('_token','repass','_method','oldpass');

        // 获取用户id
        $id = session('adminusers')->id;

        // 通过id获取到用户额原密码
        $oldPass = AdminUsers::find($id)->password;
        
        //获取输入的原密码
        $newPass = $request->input('oldpass');

        //判断密码是否一致
        if (Hash::check($newPass,$oldPass)) {

            //加密 输入的新密码
            $res['password'] = Hash::make($request->input('password'));

            try{

                //对用户的密码进行修改
                $rs = AdminUsers::where('id',$id) -> update($res);

                if ($rs) {

                    //清空session 里面用户的数据
                    $request->session()->forget(['admin_user','adminusers_face']);

                    return redirect('/admin/login') -> with('success','修改成功! 请重新登录');

                } else {

                    return back() -> with('error','修改失败');
                }
            }catch(\Exception $e){

                return back() -> with('error','修改失败');
            }
        } else {

            return back() -> with('error','密码不正确');
        }
    }


     /**
     * 将用户主题进行修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function setTheme(Request $request)
    {   
        //去除多余数据
        $res = $request -> except('_token','id','_method');

        //获取用户id
        $id = $request -> input('id');

        // return 1;
        
        try{

            //通过id进行修改
            $rs = AdminUsers::where('id',$id) -> update($res);

            if ($rs) {

                session(['success'=>'修改主题成功']);
                return 1;

            } else {

                session(['error'=>'修改主题失败']);
                return 0;
            }

        }catch(\Exception $e){

            echo $e -> getMessage();

            // session(['error'=>'修改主题失败']);
        }
    }

}