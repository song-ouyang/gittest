<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('sds')->namespace('Career')->group(function (){
   Route::get('num','SdsController@sdsNum');//查看sds完成数量 ok
   Route::post('score','SdsController@sdsScore');//写入分数
   Route::post('result','SdsController@sdsResult');//查看结果并返回
   Route::post('remove','SdsController@sdsRemove');//点击重做将分数归零
});//zcr

<<<<<<< HEAD:laravel-master/routes/api.php



Route::prefix('pdp')->namespace('Career')->group(function () {
=======
Route::prefix('test/pdp')->namespace('Career')->group(function () {
>>>>>>> f989bf86f5a705c01d9a842f59edb722fea3a85d:routes/api.php
    Route::get('num', 'PdpController@pdpNum');//查看完成pdp的人数
    Route::post('score', 'PdpController@pdpScore');//录入分数 把分数录入到数据库
    Route::post('result', 'PdpController@pdpResult');//查看分数并返回结果
    Route::post('remove', 'PdpController@pdpRemove');//点击重做将分数归零
<<<<<<< HEAD:laravel-master/routes/api.php
}); //wzh

//气质
Route::prefix('Tem')->namespace('Career')->group(function (){
=======
});
//wzh
Route::prefix('test/Tem')->namespace('Career')->group(function (){
>>>>>>> f989bf86f5a705c01d9a842f59edb722fea3a85d:routes/api.php
    Route::get('num','TemperamentController@Temnum');//查看气质测试的完成人数
    Route::post('score','TemperamentController@Temscore');//写入分数
    Route::post('result','TemperamentController@Temresult');//查看结果并返回
    Route::post('remove','TemperamentController@Temremove');//点击重做将分数归零
<<<<<<< HEAD:laravel-master/routes/api.php
}); //gjy


=======
});
//gjy
     Route::view('addd', 'add');
>>>>>>> f989bf86f5a705c01d9a842f59edb722fea3a85d:routes/api.php
//后台
Route::prefix('home')->namespace('Admin')->group(function ()
{
    Route::post('userdata', 'UserdataController@userdata');  //查看单个用户数据 ok
    Route::get('useralldata', 'UserdataController@useralldata');  //查看所有用户数据 ok

});//oys



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('auth')->namespace('Admin')->group(function () {
    Route::post('login', 'AuthController@login'); //登陆
    Route::post('logout', 'AuthController@logout'); //退出登陆
    Route::post('refresh', 'AuthController@refresh'); //刷新token
    Route::post("regist",'AuthController@registered');//注册
});//--oys


Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::post('login', 'AdminController@login'); //管理员登陆php
    Route::post('logout', 'AdminController@logout'); //退出登陆
    Route::post('refresh', 'AdminController@refresh'); //刷新token
    Route::post("regist",'AdminController@registered');//注册
});//--oys

Route::prefix('person')->namespace('Person')->group(function () {

    Route::get('test','PersonController@test');
});//--oys



