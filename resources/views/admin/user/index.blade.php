@extends('admin/layouts/admin')
@section('title', '用户管理')
@section('main')


<div class="main-title">
    <h2>用户管理</h2>
</div>

<!-- <div class="layui-container">

    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="枫" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">搜索</button>
    </form>
</div> -->

<form method="post" action="" class="j-form">
    <table class="layui-table" lay-skin="line">
        <thead>
            <tr class="table-title">
                <th width="75">序号</th>
                <th>用户名</th>
                <th>头像</th>
                <th>邮箱</th>
                <th>密码</th>
                <th style="text-align: center;">创建时间</th>
                <th style="text-align: center;">状态</th>
                <th style="text-align: center;">操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($arr as $v)
            <!-- 此处编写内容列表代码 isset(-->
            <tr class="j-pid-{{ $v->pid }}" @if($v->level)style="display:none"@endif>
                <td>{{ $v->id }}</td>
                <td>{{$v->name}}</td>
                <td><img @if($v->image) src="/static/upload/{{ $v->image}}" @else src="{{asset('admin')}}/img/noimg.png" @endif width="50" height="50"></td>
                <td>{{$v->email}}</td>
                <td>{{$v->password}}</td>
                <td style="text-align: center;">{{ $v->created_at }}</td>
                <td style="text-align: center;">
                    @if($v->status==1)
                    <a href="" class="layui-btn layui-btn-sm layui-btn-danger j-del" style="margin-right:5px;">未认证</a>
                    @else
                    <a href="" class="layui-btn layui-btn-sm layui-btn-normal ">已认证</a>
                    @endif
                </td>
                <td style="text-align: center;">
                    @if($v->status==1)
                    <a href="{{ url('userlist/edit', ['id' => $v->id ]) }}" id="id" class="layui-btn layui-btn-sm layui-btn-normal" style="margin-right:5px;">通过认证</a>
                    @else
                    <a href="{{url('userlist/save', ['id' => $v->id ])}}" class="layui-btn layui-btn-sm layui-btn-normal ">设为管理员</a>
                    @endif
                    <a href="{{url('userlist/delete', ['id' => $v->id ])}}" class="layui-btn layui-btn-sm layui-btn-danger j-del ">删除</a>
                </td>
            </tr>
            @endforeach
            @if(empty($arr))
            <tr>
                <td colspan="7" class="text-center">还没有添加内容</td>
            </tr>
            @endif
        </tbody>
    </table>
    {{csrf_field()}}
</form>

<!-- 分页 -->
{{$arr->links()}}

<script src="/static/build/layui.js"></script>
<script>
    
</script>
@endsection