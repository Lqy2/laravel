<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

// 后台登录注册
Route::get('/admin/login', 'Admin\UserController@login');
Route::post('/admin/check', 'Admin\UserController@check');
Route::get('/admin/logout', 'Admin\UserController@logout');
Route::get('/admin/index', 'Admin\IndexController@index');


// 添加栏目
Route::prefix('category')->namespace('Admin')->middleware(['Admin'])->group(function () {
    Route::get('', 'CategoryController@index');
    Route::get('add', 'CategoryController@add');
    Route::post('save', 'CategoryController@save');
    Route::get('edit/{id}', 'CategoryController@edit');
    Route::post('delete/{id}', 'CategoryController@delete');
    Route::post('sort', 'CategoryController@sort');
});


// 用户列表
// Route::get('/userlist/list','Admin\UserlistController@userlist');

Route::prefix('userlist')->namespace('Admin')->middleware(['Admin'])->group(function () {
    Route::get('list', 'UserlistController@userlist');
    Route::get('user', 'UserlistController@user');
    Route::get('comment', 'UserlistController@comment');
    Route::get('edit/{id}', 'UserlistController@edit');
    Route::get('delete/{id}', 'UserlistController@delete');
    Route::get('save/{id}', 'UserlistController@save');
    Route::get('del/{id}', 'UserlistController@del');
    Route::get('avatar', 'UserlistController@avatar');
    
    Route::post('upload', 'UserlistController@upload');
});

// 管理员设置
// Route::get('/adminuserlist/list', 'Admin\AdminUserController@adminuserlist');
// 
Route::prefix('adminuserlist')->namespace('Admin')->middleware(['Admin'])->group(function () {
    Route::get('list', 'AdminUserController@adminuserlist');
    Route::get('edit/{id}', 'AdminUserController@edit');
    Route::get('delete/{id}', 'AdminUserController@delete');
    // Route::get('save/{id}', 'UserlistController@save');
});




// 后台添加内容
Route::prefix('content')->namespace('Admin')->middleware(['Admin'])->group(function () {

    Route::get('add', 'ContentController@add');
    Route::post('upload', 'ContentController@upload');
    Route::post('save', 'ContentController@save');
    Route::get('edit/{id}', 'ContentController@edit');
    Route::post('delete/{id}', 'ContentController@delete');
    Route::get('{id?}', 'ContentController@index');
});


// 前台首页
Route::get('/', 'IndexController@index');
// 注册
Route::post('/register', 'UserController@register');
// 登录
Route::post('/login', 'UserController@login');
// 退出登录
Route::get('/logout', 'UserController@logout');

// -----------avatar
// Route::get('/like', 'Admin/UserController@like');


// 内容列表
Route::get('/lists/{id}', 'IndexController@lists');
// 内容详情
Route::get('/detail/{id}', 'IndexController@detail');
// 点赞
Route::get('/like/{id}', 'IndexController@like');
// 评论
Route::get('/comment', 'IndexController@comment');

// 面包屑导航
Route::name('home')->get('/', 'IndexController@index');
Route::name('category')->get('/lists/{id}', 'IndexController@lists');
Route::name('detail')->get('/detail/{id}', 'IndexController@detail');
