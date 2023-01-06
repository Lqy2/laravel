<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.bootcdn.net/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">
    <link href="{{asset('admin')}}/css/common.css" rel="stylesheet">
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script src="{{asset('admin')}}/js/main.js"></script>
    <title>登录</title>
</head>

<body class="login">
    <!-- 后台登录 -->
    <div class="container">
        <!-- 登录表单 -->
        <form action="{{ url('admin/check') }}" method="post" class="j-login">
            <h1>后台管理系统</h1>
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="用户名" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="密码" required>
            </div>
            <div class="form-group">
                <input type="text" name="captcha" class="form-control" placeholder="验证码" required>
            </div>
            <!-- 验证码 -->
            <div class="form-group">
                <div class="login-captcha">
                    <img src="{{ captcha_src() }}" alt="captcha">
                    <span style="font-size:14px;color:#fff;margin-left:10px">看不清?&nbsp点击图片试试</span>
                </div>
            </div>
            <div class="form-group">
                {{csrf_field()}}
                <input type="submit" class="btn btn-lg btn-block btn-success" value="登录">
            </div>
        </form>
    </div>
    <script>
        $('.login-captcha img').click(function() {
            $(this).attr('src', '{{ captcha_src()}}' + '?_=' + Math.random());
        });
        main.ajaxForm('.j-login', function() {
            location.href = '/admin/index';
        });
        
    </script>
</body>

</html>