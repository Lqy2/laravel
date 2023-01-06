@extends('admin/layouts/admin')
@section('title', '评论管理')
@section('main')

<div class="main-title">
    <h2>评论管理</h2>
</div>




<form method="post" action="" class="j-form">
    <table class="layui-table" lay-skin="line">
        <thead>
            <tr class="table-title">
                <th width="75">序号</th>
                <th>用户名</th>
                <th>文章</th>
                <th>评论内容</th>
                <th style="text-align: center;">评论时间</th>
                <th style="text-align: center;">操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($content as $v)
            <!-- 此处编写内容列表代码 isset(-->
            <tr class="">
                <td>{{$v->id}}</td>
                <td>{{$v->uname}}</td>
                <td>{{$v->cname}}</td>
                <td>{{$v->content}}</td>
                <td style="text-align: center;">{{ $v->created_at }}</td>
                <td style="text-align: center;">
                <a href="{{url('userlist/del', ['id' => $v->id ])}}" class="layui-btn layui-btn-sm layui-btn-danger j-del ">删除</a>
                </td>
            </tr>
            @endforeach
            @if(empty($content))
            <tr>
                <td colspan="7" class="text-center">还没有添加内容</td>
            </tr>
            @endif
        </tbody>
    </table>
    {{csrf_field()}}
</form>

<!-- 分页 -->
{{$content->links()}}

<script src="/static/build/layui.js"></script>
<script>
    layui.use('laypage', function() {
        var laypage = layui.laypage;

        //执行一个laypage实例
        laypage.render({
            elem: 'test1' //注意，这里的 test1 是 ID，不用加 # 号
                ,
            count: 50 //数据总数，从服务端得到
        });
    });
</script>
@endsection