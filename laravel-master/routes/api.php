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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('test')->namespace('Career')->group(function (){
   Route::get('sds/num','SdsController@sdsNum');//查看sds完成数量 ok
   Route::post('sds/score','SdsController@sdsScore');//写入分数
   Route::post('sds/result','SdsController@sdsResult');//查看结果并返回
   Route::post('sds/remove','SdsController@sdsRemove');//点击重做将分数归零
});//zcr





//测试
Route::prefix('test')->namespace('Career')->group(function ()
{
    //pdp
    Route::get('pdp/num', 'PdpController@pdpnum');  //查看pdp数量  ok
    Route::post('pdp/pdpResult', 'PdpController@pdpResult'); //查看pdp结果 并且吧东西存入数据库 ok
    Route::post('pdp/pdpcheck', 'PdpController@pdpcheck');  //查看有没有写pdp  有就返回那几项结果 ok
    Route::post('pdp/pdpRemove', 'PdpController@pdpRemove');  //查看有没有写pdp  有就返回那几项结果 ok

    //气质
    Route::get('Temperament/num', 'TemperamentController@Temperamentnum');  //查看气质的数量  ok
    Route::post('Temperament/TemperamentResult', 'TemperamentController@TemperamentResult'); //查看气质结果 并且吧东西存入数据库 ok
    Route::post('Temperament/Temperamentcheck', 'TemperamentController@Temperamentcheck');  //查看有没有写temper 有就返回那几项结果 ok
    Route::post('Temperament/TemperamentRemove', 'TemperamentController@TemperamentRemove');  //查看有没有写pdp  有就返回那几项结果 ok
});


//后台
Route::prefix('home')->namespace('Admin')->group(function ()
{
    Route::get('userdata', 'UserdataController@userdata');  //查看单个用户数据 ok
    Route::get('useralldata', 'UserdataController@useralldata');  //查看所有用户数据 ok

});


//登录
Route::prefix('user')->namespace('Login')->group(function ()
{
    Route::post('login', 'LoginController@login'); //用户登录
    Route::post('register', 'LoginController@register'); //用户登录
    Route::post('logout', 'LoginController@logout'); //用户登录
});
