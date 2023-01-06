<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 引入静态文件 -->
    <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.bootcdn.net/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/layui/2.7.2/css/layui.css">
    <link href="{{asset('admin')}}/css/common.css" rel="stylesheet">
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/echarts/3.8.3/echarts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/layui/2.7.2/layui.js"></script>
    <script src="{{asset('admin')}}/js/main.js"></script>
    <title>@yield('title')</title>
</head>

<body>
    <div class="layui-layout layui-layout-admin">
        <!-- 头部区域（可配合layui 已有的水平导航） -->
        <div class="layui-header">
            <div class="layui-logo layui-hide-xs layui-bg-black">后台管理系统</div>
            <ul class="layui-nav layui-layout-right">
                <li class="layui-nav-item layui-hide layui-show-md-inline-block">
                    <a href="javascript:;">
                        <img src="/static/upload/{{ session()->get('avatar.image') }}" class="layui-nav-img">
                        {{ session()->get('user.name') }}
                    </a>
                    <dl class="layui-nav-child">
                        <dd><a href="{{url('userlist/user')}}">个人主页</a></dd>
                        <dd><a href="{{ url('admin/logout') }}">退出登录</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item" lay-header-event="menuRight" lay-unselect>
                    <a href="javascript:;">
                        <i class="layui-icon layui-icon-more-vertical"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- 侧边栏 -->
        <div class="layui-side layui-bg-black">
            <div class="layui-side-scroll">
                <!-- 左侧导航区域（可配合layui已有的垂直导航） class="layui-nav layui-nav-tree" lay-shrink="all"-->
                <ul class="layui-nav layui-nav-tree" lay-shrink="all" lay-filter="test">
                    <li class="layui-nav-item"><a href="{{ url('admin/index') }}">首页</a></li>
                    <li class="layui-nav-item layui-nav-itemed ">
                        <a class="" href="#">栏目管理</a>
                        <dl class="layui-nav-child">
                            <dd><a href="{{ url('category/add') }}">添加栏目</a></dd>
                            <dd><a href="{{ url('category') }}">栏目列表</a></dd>
                        </dl>
                    </li>
                    <li class="layui-nav-item layui-nav-itemed">
                        <a href="#">内容管理</a>
                        <dl class="layui-nav-child">
                            <dd><a href="{{ url('content/add') }}">添加内容</a></dd>
                            <dd><a href="{{ url('content') }}">内容列表</a></dd>
                        </dl>
                    </li>

                    <li class="layui-nav-item"><a href="{{url('userlist/comment')}}">评论管理</a></li>
                    <li class="layui-nav-item"><a href="{{url('userlist/list')}}">用户管理</a></li>
                    <li class="layui-nav-item"><a href="{{url('adminuserlist/list')}}">管理员设置</a></li>
                </ul>
            </div>
        </div>

        <div class="layui-body">
            <!-- 内容主体区域 -->
            <div class="layui-container">
                <div class="">
                    <div>@yield('main')</div>
                </div>
            </div>
        </div>
    </div>

    <!-- 消息提示 -->
    @if(!empty(session('message')))　
    <div class="alert alert-success" role="alert" style="text-align:center;margin:0 auto;width: 400px">
        {{session('message')}}
    </div>
    @endif
    @if(!empty(session('tip')))　
    <div class="alert alert-warning" role="alert" style="text-align:center;margin:0 auto;width: 400px">
        {{session('tip')}}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-warning">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <script>
        main.layout();
        setInterval(function() {
            $('.alert').remove();
        }, 3000);

        // 可视化表格
        var myChart = echarts.init(document.getElementById('main'));
        var myChart2 = echarts.init(document.getElementById('main2'));
        var myChart3 = echarts.init(document.getElementById('main3'));

        // 指定图表的配置项和数据
        var option = {
            title: {
                text: '各个栏目数量'
            },
            tooltip: {},
            legend: {
                data: ['数量']
            },
            xAxis: {
                data: ['新闻', '体育', '生活', '健康', '世界', '科技']
            },
            yAxis: {},
            series: [{
                name: '数量',
                type: 'bar',
                data: [5, 20, 36, 10, 10, 20]
            }]
        };

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);


        // 饼图
        option = {
            title: {
                text: '新闻评论详情',
                left: 'center'
            },
            tooltip: {
                trigger: 'item',
                formatter: '{a} <br/>{b} : {c} ({d}%)'
            },
            legend: {
                orient: 'vertical',
                left: 'left',
                data: ['体育', '世界', '科技', '健康', '生活']
            },
            series: [{
                name: '访问来源',
                type: 'pie',
                radius: '55%',
                center: ['50%', '60%'],
                data: [{
                        value: 335,
                        name: '体育'
                    },
                    {
                        value: 310,
                        name: '世界'
                    },
                    {
                        value: 234,
                        name: '科技'
                    },
                    {
                        value: 135,
                        name: '健康'
                    },
                    {
                        value: 1548,
                        name: '生活'
                    }
                ],
                emphasis: {
                    itemStyle: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }]
        };

        let currentIndex = -1;

        setInterval(function() {
            var dataLen = option.series[0].data.length;
            // 取消之前高亮的图形
            myChart2.dispatchAction({
                type: 'downplay',
                seriesIndex: 0,
                dataIndex: currentIndex
            });
            currentIndex = (currentIndex + 1) % dataLen;
            // 高亮当前图形
            myChart2.dispatchAction({
                type: 'highlight',
                seriesIndex: 0,
                dataIndex: currentIndex
            });
            // 显示 tooltip
            myChart2.dispatchAction({
                type: 'showTip',
                seriesIndex: 0,
                dataIndex: currentIndex
            });
        }, 1000);
        myChart2.setOption(option);

        // 区域面积图
        option = {
            title: {
                text: '每月新增内容数量'
            },
            xAxis: {
                data: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月']
            },
            yAxis: {
                type: 'value',
                name: '添加数量'
            },
            series: [{
                    data: [10, 22, 28, 23, 19, 25, 38, 20, 15, 18, 36, 5],
                    type: 'line',
                    areaStyle: {}
                },
                {
                    data: [25, 14, 23, 35, 25, 18, 22, 28, 23, 30, 25, 40, ],
                    type: 'line',
                    areaStyle: {
                        color: '#ff0',
                        opacity: 0.5
                    }
                }
            ]
        };
        myChart3.setOption(option);
    </script>

</body>

</html>