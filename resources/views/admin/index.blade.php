@extends('admin/layouts/admin')
@section('title', '后台首页')
@section('main')
<div>
  <div class="main-title">
    <h2>首页</h2>
  </div>
  <div class="container">
    <div class="row">
      <!-- 内容数量 -->
      <div class="col-sm bg-purple heigth">
        <div class="text-left">
          <span>
            <b style="color: #3073D6">14332</b>
            <span>篇</span>
          </span>
          <p class="p">内容数量</p>
        </div>
        <div class="border" style="background-color:#3073D6;float: right">
          <i class="el-icon-document coco"></i>
        </div>
      </div>
      <!-- 评论总量 -->
      <div class="col-sm bg-purple heigth">
        <div class="text-left">
          <span>
            <b style="color:#16B6A1">36234</b>
            <span>篇</span>
          </span>
          <p class="p">评论数量</p>
        </div>
        <div class="border" style="background-color:#3073D6;float: right">
          <i class="el-icon-document coco"></i>
        </div>
      </div>
      <!-- 访问总量 -->
      <div class="col-sm bg-purple heigth">
        <div class="text-left">
          <span>
            <b style="color: #D63059">56285</b>
            <span>篇</span>
          </span>
          <p class="p">访问总量</p>
        </div>
        <div class="border" style="background-color:#3073D6;float: right">
          <i class="el-icon-document coco"></i>
        </div>
      </div>
    </div>
    <!-- 可视化图表 -->
    <div class="layui-container">
      <div class="layui-row">
        <div class="layui-col-md12">
          <div id="main3" style="width: 100%;height:400px;"></div>
        </div>
      </div>
      <div class="layui-roe">
        <div class="layui-col-md6">
        <div id="main" style="width: 100%;height:400px;"></div>
        </div>
        <div class="layui-col-md6">
        <div id="main2" style="width: 100%;height:400px;"></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection