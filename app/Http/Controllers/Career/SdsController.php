<?php

namespace App\Http\Controllers\Career;
use http\Client\Curl\User;
use App\Models\Sds;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SdsController extends Controller
{

    /***
     * 查询sds测试进行了几次
     * zcr
     * @return \Illuminate\Http\JsonResponse
     */
    public function sdsNum(){
        $res = Sds::zcr_num();
        return $res ?
            json_success('查询成功！',$res,200):
            json_fail('查询失败',null,100);
    }

    /***
     * 添加成绩
     * zcr
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sdsScore(Request $request){
        $res1 = Sds::zcr_score($request);
        /*if($res1){
            $res2 = User::zcr_sds($res1);
        }*/
        return $res1 ?
            json_success('添加成绩成功！',$res1,200):
            json_fail('添加成绩失败',null,100);
    }

    /***
     * 返回sds测试结果
     * zcr
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sdsResult(Request $request){
        $res = Sds::zcr_result($request);
        return $res ?
            json_success('返回结果成功！',$res,200):
            json_fail('返回结果失败',null,100);
    }

    /***
     * 申请再次答题
     * zcr
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sdsRemove(Request $request){
        $res = Sds::zcr_remove($request);
        return $res ?
            json_success('可以再次答题！',$res,200):
            json_fail('申请再次答题失败！',null,100);
    }

}
