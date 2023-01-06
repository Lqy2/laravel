@extends('admin/layouts/admin')
@section('title', '栏目列表')
@section('main')
<div class="main-title"><h2>栏目管理</h2></div>

<div class="main-section">
  <form method="post" action="{{ url('category/sort')}}" class="j-form">
    <div class="main-section form-inline">
  <!-- 添加栏目按钮 -->
  <a href="{{ url('category/add') }}" class="layui-btn">+ 新增</a>
  <input type="submit" value="改变排序" class="layui-btn layui-btn-normal">
</div>
    <table class=" layui-table">
      <thead>
      <tr class="table-title">
            <th width="75">序号</th>
            <th>名称</th>
            <th width="120" style="text-align: center;">是否需要审核</th>
            <th width="140" style="text-align: center;">操作</th>
        </tr>
      </thead>
      <tbody>
      <!-- 栏目列表 -->
      @foreach($category as $v)
        <tr class="j-pid-{{ $v['pid'] }}"
          @if($v['level'])style="display:none"@endif>
          <td><input type="text" class="form-control j-sort" maxlength="5" value="{{$v['sort']}}" data-name="sort[{{$v['id']}}]" style="height:25px;font-size:12px;padding:0 5px;"></td>
          <td>
            <!-- 判断有无子栏目 -->
            @if($v['level'])
            <!-- 有子栏目则显示折叠样式 -->
              <small class="text-muted">├──</small> {{$v['name']}}
            @else
            <!-- 没有子栏目则隐藏折叠样式 -->
              <a href="#" class="j-toggle" data-id="{{$v['id']}}">
                @if(!$v['isLeaf'])
                  <i class="fa fa-plus-square-o fa-minus-square-o fa-fw"></i>
                @endif
                {{$v['name']}}
              </a>
            @endif
          </td>
          <td style="text-align: center;">
                {{$v['examine']}}
            </td>
          <!-- 操作 -->
          <td>
          <a href="{{ url('category/edit', ['id' => $v['id']]) }}" class="layui-btn layui-btn-sm layui-btn-normal">编辑</a>
            <!-- <a href="{{ url('category/delete', ['id' => $v['id']]) }}" class="j-del text-danger">删除</a> -->
            <a href="{{ url('category/delete', ['id' => $v['id']]) }}" class="layui-btn layui-btn-sm j-del layui-btn-danger">删除</a>
          </td>
        </tr>
      @endforeach
      @if(empty($category))
        <tr><td colspan="4" class="text-center">还没有添加分类</td></tr>
      @endif
      </tbody>
    </table>
    {{csrf_field()}}
    <!-- 改变排序按钮 -->
    
  </form>
</div>
<script>
  // 展开该栏目下的子栏目
  main.menuActive('category');
  $('.j-toggle').click(function() {
    var id = $(this).attr('data-id');
    $(this).find('i').toggleClass('fa-plus-square-o');
    $('.j-pid-' + id).toggle();
    return false;
  });
  // 排序
  $('.j-sort').change(function() {
    $(this).attr('name', $(this).attr('data-name'));
  });
  // 删除提示
  $('.j-del').click(function() {
    // 确认用户是否删除
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
