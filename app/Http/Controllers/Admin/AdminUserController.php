<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminUser;

class AdminUserController extends Controller
{
    //
    public function adminuserlist()
    {
        # code...
        // $arr = AdminUser::get();
        
        $arr = AdminUser::paginate(5);
        return view('admin.adminuser.index', compact( 'arr'));
    }

    public function delete($id)
    {
        $content = Adminuser::find($id);
        $content->delete();
        return redirect('/userlist/list')->with('message', '删除成功');
    }

    public function edit(Request $request)
    {
        # code...
        $id = $request->id;
        $users = Adminuser::find($id);
        return view('admin/user/edit',['users' => $users])->with('message', '认证成功');
    }

    
}
