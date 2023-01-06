@extends('admin/layouts/admin')
@section('title', '编辑内容')
@section('main')
<div class="main-title">
  <h2>编辑内容</h2>
</div>
<div class="layui-container">
  <form method="post" action="{{ url('/content/save') }}" class="j-form layui-form">
    <div class="layui-form-item">
      <label class="layui-form-label">所属分类</label>
      <div class="layui-input-block">
        <select name="cid" class="form-control" lay-verify="required">
          <option value="0">请选择</option>
          @foreach($category as $v)
              @if($v['level'])
                <option value="{{$v['id']}}" @if($v['id'] == $content->category->id) selected @endif><small class="text-muted">├──</small> {{$v['name']}}</option>
              @else
                <option value="{{$v['id']}}" @if($v['id'] == $content->category->id) selected @endif> {{$v['name']}}</option>
              @endif
            @endforeach
          <select>
          </select>
      </div>
    </div>
    <!-- 标题 -->
    <div class="layui-form-item">
      <label class="layui-form-label">标题</label>
      <div class="layui-input-block">
        <input type="text" name="title" required lay-verify="required" value="{{ $content->title }}" autocomplete="off" class=" layui-input">
      </div>
    </div>
    <!-- 上传图片按钮 -->
    <div class="layui-form-item">
            <label class="layui-form-label">图片</label>
            <div class="layui-input-block">
            <input type="file" id="file1" name="image" value="上传图片" multiple="true">
            <div class="upload-img-box" id="uploadImg">
            @if($content->image)
              <div class="upload-pre-item" style="max-height:100%;"><img src="/static/upload/{{ $content->image }}" style="width:100px;height:100px"/> <input type="hidden" name="image" value="{{$content->image}}" class="icon_banner"/></div>
            @endif
            </div>
            </div>
        </div>
    <!-- 简介 -->
    
    <div class="layui-form-item">
            <label class="layui-form-label">简介</label>
            <div class="layui-input-block">
                <!-- <textarea class="j-goods-content" name="content" style="height:500px"></textarea> -->
        <script type="text/plain" class="j-goods-content" name="content" style="height:500px">{!! $content->content !!}</script>
            </div>
        </div>
    <!-- 状态 -->
    <!--  -->

    <div class="layui-form-item">
            <label class="layui-form-label">状态</label>
            <div class="layui-input-block">
                <input type="radio" name="status" value="1" title="默认" @if($content->status == 1) checked @endif >
                <input type="radio" name="status" value="2" title="推荐" @if($content->status == 2) checked @endif>
            </div>
        </div>
    <!-- 按钮 -->
    

    <div class="layui-form-item">
            <div class="layui-input-block">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$content->id}}">
                <!-- <button type="submit" class="btn btn-primary mr-2">提交表单</button> -->
                <!-- <a href="{{ url('content') }}" class="btn btn-secondary">返回列表</a> -->
                <button class="layui-btn" lay-submit lay-filter="formDemo">提交表单</button>
                <a href="{{url('content')}}" class="layui-btn layui-btn-primary">返回列表</a>
            </div>
        </div>
  </form>
</div>
<link href="{{asset('admin')}}/common/uploader/uploadifive.css" rel="stylesheet" />
<script src="{{asset('admin')}}/common/uploader/jquery.uploadifive.js"></script>
<script src="{{asset('admin')}}/common/editor/ueditor1.4.3.3/ueditor.config.js"></script>
<script src="{{asset('admin')}}/common/editor/ueditor1.4.3.3/ueditor.all.min.js"></script>
<script src="{{asset('admin')}}/common/editor/main.editor.js"></script>
<script>
    main.menuActive('addcontent');
    $(function() {
      $('#file1').uploadifive({
        'auto'            : true,  //自动上传
        'fileObjName'     : 'image',  //文件对象名称
        'fileType'        : 'image',  //文件类型
        'buttonText'      : '上传图片',  //上传按钮显示显示文本
        'formData'        : { '_token' : "{{ csrf_token() }}" },  //表单数据
        'method'          : 'post',  //请求方式
        'queueID'         : 'uploadImg',  //进度条ID
        'removeCompleted' : true,  //从列表中移除上传的文件
        'uploadScript'    : '{{ url('content/upload')}}',  //上传服务器地址
        'onUploadComplete': uploadPicture_icon  //上传成功事件
    });
    });
    function uploadPicture_icon(file, data) {
      var obj = $.parseJSON(data);
      var src = '';
      if (obj.code) {
        filename = obj.data.filename;
        path = obj.data.path;
        $('.upload-img-box').empty();
        $('.upload-img-box').html(
          '<div class="upload-pre-item" style="max-height:100%;"><img src="' + path + '" style="width:100px;height:100px"/> <input type="hidden" name="image" value="'+filename+'" class="icon_banner"/></div>'
        );
      } else {
        alert(data.info);
      }
    }
    main.editor($('.j-goods-content'), 'goods_edit', function(opt) {
      opt.UEDITOR_HOME_URL = '{{asset('admin')}}/common/editor/ueditor1.4.3.3/';
    }, function(editor) {
      $('.j-form').submit(function() {
        editor.sync();
      });
    });
</script>
@endsection