@extends('admin/layouts/admin')
@section('title', '内容列表')
@section('main')
<div class="main-title">
    <h2>内容管理</h2>
</div>
<div class="layui-container">

    <div class=" form-inline layui-row">
        <div class="layui-col-md1">
            <a href="{{ url('content/add') }}" class="layui-btn">+ 新增</a>
        </div>
        <div class="layui-col-md2">
            <select class="j-select form-control" style="min-width:120px;margin-left:8px" lay-verify="required">
                <option value="{{ url('content', ['id' => 0]) }}">所有分类</option>
                @foreach($category as $v)
                @if($v['level'])
                <option value="{{ url('content', ['d' => $v['id']]) }}" data-id="{{$v['id']}}">
                    <small class="text-muted">--</small> {{$v['name']}}
                </option>
                @else
                <option value="{{ url('content', ['id' => $v['id']]) }}" data-id="{{$v['id']}}">
                    {{$v['name']}}
                </option>
                @endif
                @endforeach
            </select>
        </div>
    </div>
</div>
<!-- 表格 -->
<div class="main-section">
    <form method="post" action="{{ url('category/sort')}}" class="j-form">
        <table class="layui-table" lay-skin="line">
            <thead>
                <tr class="table-title">
                    <th width="75">序号</th>
                    <th>分类</th>
                    <th>图片</th>
                    <th>标题</th>
                    <th style="text-align: center;">状态</th>
                    <th style="text-align: center;">创建时间</th>
                    <th width="150" style="text-align: center;">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($content as $v)
                <!-- 此处编写内容列表代码 isset(-->
                <tr class="j-pid-{{ $v->pid }}" @if($v->level)style="display:none"@endif>
                    <td>{{ $v->id }}</td>
                    <td>{{$v->category->name}}</td>
                    <td><img @if($v->image) src="/static/upload/{{ $v->image}}" @else src="{{asset('admin')}}/img/noimg.png" @endif width="50" height="50"></td>
                    <td>{{ $v->title }}</td>
                    <td style="text-align: center;">
                    @if($v->status==1)
                    <a href="" class="layui-btn layui-btn-sm layui-btn-primary" style="margin-right:5px;">默认</a>
                    @else
                    <a href="" class="layui-btn layui-btn-sm layui-btn-primary layui-border-blue ">推荐</a>
                    @endif
                </td>
                    <td style="text-align: center;">{{ $v->created_at }}</td>
                    <td style="text-align: center;">
                        <a href="{{ url('content/edit', ['id' => $v->id ]) }}" class="layui-btn layui-btn-sm layui-btn-normal" style="margin-right:5px;">编辑</a>
                        <a href="{{ url('content/delete', ['id' => $v->id ]) }}" class="layui-btn layui-btn-sm layui-btn-danger j-del ">删除</a>
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

</div>
<script>
    main.menuActive('content');
    $('.j-select').change(function() {
      location.href = $(this).val();
    });
    $('option[data-id=' + {{$cid}} + ']').attr('selected', true);
    $('.j-del').click(function() {
      if (confirm('您确定要删除此项？')) {
        var data = { _token: '{{ csrf_token() }}' };
        main.ajaxPost({url:$(this).attr('href'), data: data}, function(){
          location.reload();
        });
      }
      return false;
    });
  </script>
@endsection