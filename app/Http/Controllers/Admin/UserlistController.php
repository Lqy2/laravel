<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Content;
use App\Comment;
use App\AdminUser;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Route;

class UserlistController extends Controller
{
    //
    public function userlist()
    {
        # code...  'content',
        $arr = User::paginate(5);
        $arrc = Content::get();
        $data = compact('arr', 'arrc');

        return view('admin.user.index', $data);
    }

    public function edit(Request $request)
    {
        # code...
        $id = $request->id;
        $users = user::find($id);
        if ($users) {
            $users->status = 2;
            $users->save();
        } else {
            dump('认证失败：记录不存在');
        }
        return redirect('/userlist/list')->with('message', '认证成功');
    }

    public function delete($id)
    {
        $content = user::find($id);
        $content->delete();
        return redirect('/userlist/list')->with('message', '删除成功');
    }
    // 
    public function save(Request $request)
    {
        $salt = md5(uniqid(microtime(), true));
        $id = $request->id;
        $arr = user::where('id', $id)->get();
        $member = new AdminUser();
        $salt = md5(uniqid(microtime(), true));
        foreach ($arr as $v) {
            $member->username = $v->name;
            $member->image = $v->image;
            $member->email = $v->email;
            $member->password = md5(md5($v->password) . $salt);
            $member->salt = $salt;
            $member->created_at = $v->created_at;
        }
        $member->save();
        return redirect('/adminuserlist/list')->with('message', '设置成功');
    }

    public function user()
    {
        # code...
        return view('admin/user/user');
    }

    public function comment()
    {
        
        // $content = DB::select('SELECT `users`.id,`users`.name,`content`.title,`comments`.content,`content`.status,`comments`.`created_at` FROM `comments` INNER JOIN `users` INNER JOIN `content` ON `comments`.`uid` = `users`.`id` AND `comments`.`cid` = `content`.`id`');
        // dump($content);
        // $member = new Usercommet();
        // foreach ($content as $v) {
        //     $member->username = $v->name;
        //     $member->title = $v->title;
        //     $member->content = $v->content;
        //     $member->status = $v->status;
        //     $member->created_at = $v->created_at;
        // }
        // $member->save();
        // return Redirect::back();
        // return redirect()->back();
        // return redirect('/detail/'.$id);

        
        $content = Comment::paginate(5);
        // dump($content);
        
        return view('admin.comment.index',['content' => $content]);
    }

    public function del($id)
    {
        # code...k
        $content = comment::find($id);
        $content->delete();
        return redirect('/userlist/comment')->with('message', '删除成功');
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');       //获取上传文件
            if ($image->isValid()) {                //验证文件上传是否成功
                $name = md5(microtime(true)) . '.' . $image->extension();  //生成文件名
                $image->move('static/upload', $name);  //对上传文件移动
                $path = '/static/upload/' . $name;
                // 
                $id = session()->get('user.id');
                // AdminUser::where('id', $id)->update(['image' => $name]);
                // 
                Session::put('avatar', ['id' => $id, 'name' => $name]);
                // 
                $returndata  = array(
                    'filename' => $name,
                    'path' => $path
                );
                $result = [
                    'code' => 1,
                    'msg'  => '上传成功',
                    'time' => time(),
                    'data' => $returndata,
                ];
                return response()->json($result);
            }
            return $image->getErrorMessage();
        }
        return '文件上传失败';
    }
    public function avatar()
    {
        # code...
        $id = session()->get('avatar.id');
        // $data = $request->all();
        $name = session()->get('avatar.name');
        AdminUser::where('id', $id)->update(['image' => $name]);
        
        Session::put('avatar', ['image' => $name]);
        // dump($name);
        return redirect('/userlist/user')->with('message', '上传成功');
    }
}
