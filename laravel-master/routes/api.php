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
   Route::get('sds/num','SdsController@sdsNum');//查看sds完成数量
   Route::post('sds/score','SdsController@sdsScore');//写入分数
   Route::post('sds/result','SdsController@sdsResult');//查看结果并返回
   Route::post('sds/remove','SdsController@sdsRemove');//点击重做将分数归零
});//zcr



