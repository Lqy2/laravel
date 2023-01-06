@extends('admin/layouts/admin')
@section('title', '栏目列表')
@section('main')
<div class="main-title">
    <h2>编辑分类</h2>
</div>
<div class="main-section">
    <div style="width:543px">
        <!-- 编辑表单 -->
        <form method="post" action="{{ url('/category/save') }}" class="layui-form">
            <div class="layui-form-item">
                <label class="layui-form-label">序号</label>
                <div class="layui-input-block">
                    <input type="text" name="sort" value="{{$data->sort}}" required lay-verify="required" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">上级栏目</label>
                <div class="layui-input-block">
                    <select name="pid" lay-verify="required">
                        <option value="0">请选择</option>
                        @foreach ($category as $v)
                        <option value="{{ $v->id }}"> {{ $v->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">名称</label>
                <div class="layui-input-block">
                    <input type="text" name="name" value="{{$data->name}}" required lay-verify="required" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">是否需要审核</label>
                <div class="layui-input-block">
                    <input type="radio" name="examine" value="是" title="是" checked>
                    <input type="radio" name="examine" value="否" title="否">
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$id}}">
                    <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                    <a href="{{url('category')}}" class="layui-btn layui-btn-primary">返回列表</a>
                    {{--<a href="{{url('category')}}">--}}
                    {{--<button class="btn btn-secondary">返回列表</button>--}}
                    {{--</a>--}}
                </div>
            </div>

            <!-- 按钮 -->
            
        </form>
    </div>
</div>
<script>
    main.menuActive('category');
</script>
@endsection