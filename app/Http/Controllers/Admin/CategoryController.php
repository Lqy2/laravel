<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
#引入模型
use App\Category;

class CategoryController extends Controller
{
    //
    public function add()
    {
        # 获取顶级父栏目
        $category = Category::where('pid', 0)->get();
        #显示添加栏目视图
        return view('admin.category.add', ['category' => $category]);
    }
    // 添加栏目
    public function save(Request $request)
    {
        // 获取表单数据
        $data = $request->all();
        // 对数据进行验证
        $rule = isset($data['id']) ? ',name,' . $data['id'] : '';
        $this->validate($request, [
            'name' => 'required|unique:category' . $rule,  //验证栏目名称是否重复
        ], [
            'name.required' => '栏目名称不能为空',
            'name.unique' => '栏目名称不能重复'
        ]);
        // 更新栏目
        if (isset($data['id'])) {
            $id = $data['id'];
            unset($data['id']);
            unset($data['_token']);
            $res = Category::where('id', $id)->update($data);
            $type = $res ? "message" : "tip";
            // 显示更新结果提示信息
            $message = $res ? "修改成功" : "修改失败";
            return redirect('category')->with($type, $message);
        }
        $re = Category::create($data);
        if ($re) {
            return redirect('category')->with('message', '添加成功');
        } else {
            return redirect('category/add')->with('tip', '添加失败');
        }
    }
    public function index()
    {
        $category = (new Category)->getTreeList();    #获取栏目数据
        return view('admin.category.index', ['category' => $category]);
    }
    // 排序栏目
    public function sort(Request $request)
    {
        $sort = $request->input('sort');
        foreach ((array)$sort as $k => $v) {
            Category::where('id', (int)$k)->update(['sort' => (int)$v]);
        }
        return redirect('category')->with('message', '改变排序成功');
    }
    // 编辑栏目
    public function edit($id)
    {
        $data = [];
        if ($id) {
            if (!$data = Category::find($id)) {  //判断编辑栏目是否存在
                return back()->with('tip', '记录不存在。');
            }
        }
        $category = Category::where('pid', 0)->get();  //获取栏目信息
        return view('admin.category.edit', ['id' => $id, 'data' => $data, 'category' => $category]);  //调用视图并发送数据
    }
    // 删除栏目
    public function delete($id)
    {
        if (!$category = Category::find($id)) {  //判断记录是否存在
            return response()->json(['code' => 0, 'msg' => '删除失败，记录不存在。']);
        }
        $category->delete();  //删除栏目
        return response()->json(['code' => 1, 'msg' => '删除成功']);
    }
}
