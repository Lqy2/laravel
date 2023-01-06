<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function login()
    {
        # code...
        return view('admin\login');
    }

    public function check(Request $request)
    {
        $rule = [
            'username' => 'required',
            'password' => 'required|min:6',
            'captcha' => 'required|captcha'
        ];
        $message = [
            'username.require' => '用户名不能为空',
            'password.require' => '密码不能为空',
            'password.min'     => '密码最少为6位',
            'captcha.require' => '验证码不能为空',
            'captcha.captcha' => '验证码有误'
        ];
        $validator = Validator::make($request->all(), $rule, $message);
        if ($validator->fails()) {
            foreach ($validator->getMessageBag()->toArray() as $v) {
                $msg = $v[0];
            }
            return response()->json(['code' => 0, 'msg' => $msg]);
        }
        $username = $request->get('username');
        // 获取头像
        $password = $request->get('password');
        $theUser = Admin::where('username', $username)->first();
        
        if ($theUser->password == md5(md5($password) . $theUser->salt)) {
            Session::put('user', ['id' => $theUser->id, 'name' => $username,'image' => $theUser->image, 'email' => $theUser->email]);
            return response()->json(['code' => 1, 'msg' => '登录成功']);
        } else {
            return response()->json(['code' => 0, 'msg' => '登录失败']);
        }
        
    }

    public function logout()
    {
        if (request()->session()->has('user')) {
            request()->session()->pull('user', session('user'));
        }
        return redirect('/admin/login');
    }

    public function like(Request $request)
    {
        # code...
        $username = $request->get('username');

        $msg = Admin::where('username', $username)->orWhere('username', 'like', '%' . $username . '%')->get()->toArray();
        return view('/admin/user/edit',$msg);
        
        // return view('/admin/layouts/admin',$mag);
        
        
    }
}
