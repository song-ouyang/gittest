<?php

namespace App\Http\Controllers\Career;

use App\Http\Controllers\Controller;
use App\Http\Requests\TemperamentRemoveRequest;
use App\Http\Requests\TemperamentResultRequest;
use App\Http\Requests\TemperamentScoreRequest;
use App\Models\Temperament;
class TemperamentController extends Controller
{
    /***
     * 查询进行几次气质测试
     * gujiayu
     *  @return \Illuminate\Http\JsonResponse
     */
    public function Temnum(){
        $res = Temperament::gjy_num();
        return $res ?
            json_success('查询成功！',$res,200):
            json_fail('查询失败',null,100);
    }
    /***
     * 添加成绩
     * gujiayu
     * @param TemperamentScoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function Temscore(TemperamentScoreRequest $request){
        $res = Temperament::gjy_score($request);
        return $res ?
            json_success('查询成功！',$res,200):
            json_fail('查询失败',null,100);
    }
    /***
     * 返回气质测试结果
     * gujiayu
     * @param TemperamentResultRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function Temresult(TemperamentResultRequest $request){
        $res = Temperament::gjy_result($request);
        return $res ?
            json_success('返回结果成功！',$res,200):
            json_fail('返回结果失败',null,100);
    }

    /***
     * 申请再次答题
     * gujiayu
     * @param TemperamentRemoveRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function Temremove(TemperamentRemoveRequest $request){
        $res = Temperament::gjy_remove($request);
        return $res ?
            json_success('可以再次答题！',$res,200):
            json_fail('申请再次答题失败！',null,100);
    }
}
