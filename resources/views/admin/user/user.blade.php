@extends('admin/layouts/admin')
@section('title', '个人中心')
@section('main')
<div class="main-title">
    <h2>个人主页</h2>
</div>
<div class="layui-container">
    <div class="card mb-3">

        <div class="card-body">
            <!-- <div class="ant-card ant-card-bordered ant-card-hoverable card___2QC5L"><div class="ant-card-cover"><img alt="支付宝" src="https://gw.alipayobjects.com/zos/rmsportal/uMfMFlvUuceEyPpotzlq.png" _mstalt="7200310"></div><div class="ant-card-body"><div class="ant-card-meta"><div class="ant-card-meta-detail"><div class="ant-card-meta-title"><a _msthash="2178799" _msttexthash="7200310">支付宝</a></div><div class="ant-card-meta-description" _msthash="1913239" _msttexthash="158624258">那是一种内在的东西， 他们到达不了，也无法触及的</div></div></div><div class="cardItemContent___3Dd3x"><span _msthash="1601950" _msttexthash="7615777">几秒前</span><div class="avatarList___36vmi"><div class="avatarList___36y58"><ul> <li class="avatarItem___1RqHP avatarItemSmall___t_DWx"><span class="ant-avatar ant-avatar-sm ant-avatar-circle ant-avatar-image" style="cursor: pointer;"><img src="https://gw.alipayobjects.com/zos/rmsportal/ZiESqWwCXBRQoaPONSJe.png"></span></li><li class="avatarItem___1RqHP avatarItemSmall___t_DWx"><span class="ant-avatar ant-avatar-sm ant-avatar-circle ant-avatar-image" style="cursor: pointer;"><img src="https://gw.alipayobjects.com/zos/rmsportal/tBOxZPlITHqwlGjsJWaF.png"></span></li><li class="avatarItem___1RqHP avatarItemSmall___t_DWx"><span class="ant-avatar ant-avatar-sm ant-avatar-circle ant-avatar-image" style="cursor: pointer;"><img src="https://gw.alipayobjects.com/zos/rmsportal/sBxjgqiuHMGRkIjqlQCd.png"></span></li> </ul></div></div></div></div></div> -->
            <div class="layui-row layui-col-space10">
                <div class="layui-col-md3">
                    <div class="card" style="">
                        <div class="card-header">
                            <div class="user-header">
                                <img src="/static/upload/{{ session()->get('avatar.image') }}" class="card-img-top user-image" alt="...">
                                <div>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        上传头像
                                    </button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">上传头像</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                        <input type="file" id="file1" name="image" value="上传图片" multiple="true">
                                                        <div class="upload-img-box" id="uploadImg"></div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                                                    <a href="{{url('userlist/avatar')}}">提交</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>
                                <i class="layui-icon layui-icon-username" style="font-size: 30px; color: #1E9FFF;"></i>
                                <i style="font-size: 15px;line-height:30px">{{ session()->get('user.name') }}</i>
                            </p>
                            <p>
                                <i class="layui-icon layui-icon-email" style="font-size: 30px; color: #1E9FFF;"></i>
                                <span style="font-size: 15px;line-height:30px">{{ session()->get('user.email') }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="layui-col-md9">
                    <div class="layui-tab layui-tab-card">
                        <ul class="layui-tab-title">
                            <li class="layui-this">文章</li>
                            <li>安全管理</li>
                            <li>应用</li>
                        </ul>
                        <div class="layui-tab-content" style="height: 400px;">
                            <!--  -->
                            <div class="layui-tab-item layui-show">
                                <div class="layui-row layui-col-space10">
                                    <div class="layui-col-md6">
                                        <div class="card" style="">
                                            <img src="https://gw.alipayobjects.com/zos/rmsportal/iXjVmWVHbCJAyqvDxdtx.png" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">蚂蚁设计</h5>
                                                <p class="card-text">生命就像一盒巧克力，结果往往出人意料</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="layui-col-md6">
                                        <div class="card" style="">
                                            <img src="https://gw.alipayobjects.com/zos/rmsportal/gLaIAoVWTtLbBWZNYEMg.png" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">蚂蚁设计专业版</h5>
                                                <p class="card-text">城镇中有那么多的酒馆，她却偏偏走进了我的酒馆</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <div class="layui-tab-item">
                                <ul>
                                    <li>账户密码</li>
                                    <li>当前密码强度：强</li>
                                </ul>
                                <ul>
                                    <li>密保手机</li>
                                    <li>已绑定手机：138****8293</li>
                                </ul>
                                <ul>
                                    <li>备用邮箱</li>
                                    <li>已绑定邮箱：ant***sign.com</li>
                                </ul>
                            </div>
                            <!--  -->
                            <div class="layui-tab-item">暂无应用</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
            'auto': true, //自动上传
            'fileObjName': 'image', //文件对象名称
            'fileType': 'image', //文件类型
            'buttonText': '上传图片', //上传按钮显示显示文本
            'formData': {'_token': "{{ csrf_token() }}"}, //表单数据
            'method': 'post', //请求方式
            'queueID': 'uploadImg', //进度条ID
            'removeCompleted': true, //从列表中移除上传的文件
            'uploadScript'    : '{{ url('userlist/upload')}}',  //上传服务器地址
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
                '<div class="upload-pre-item" style="max-height:100%;"><img src="' + path + '" style="width:100px;height:100px"/> <input type="hidden" name="image" value="' + filename + '" class="icon_banner"/></div>'
            );
        } else {
            alert(data.info);
        }
    }
    main.editor($('.j-goods-content'), 'goods_edit', function(opt) {
        opt.UEDITOR_HOME_URL = '{{asset('admin ')}}/common/editor/ueditor1.4.3.3/';
    }, function(editor) {
        $('.j-form').submit(function() {
            editor.sync();
        });
    });
</script>
@endsection