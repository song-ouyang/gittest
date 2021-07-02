<?php

namespace App\Http\Controllers\Career;

use App\Http\Controllers\Controller;
use App\Http\Requests\pdpcheckRequest;
use App\Http\Requests\pdpRemoveRequest;
use App\Http\Requests\pdpResultRequest;
use App\Model\Pdp;
use Illuminate\Http\Request;

class PdpController extends Controller
{

    /**
     *    前台给用户显示pdp的结果并且存入数据库
     * @param \pdpResultRequest
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */



    public function pdpResult(pdpResultRequest $request){
        $date=Pdp::result($request);
        $date1=Pdp::add($request);
        dd ($date);
        dd ($date1);
        return $date?
            json_success('获取成功!',$date,200) :
            json_fail('获取失败!',null,100);
    }







    /**
     *    获取pdp总共的数据
     * @param
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function pdpnum()
    {
        $date=Pdp::num();
        return $date?
            json_success('获取成功!',$date,200) :
            json_fail('获取失败!',null,100);
    }


    /**
     *   通过邮箱看有没有完成
     * @param pdpcheckRequest
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function pdpcheck(pdpcheckRequest $request)
    {
        $date=Pdp::pdpdata($request);
       return $date?
            json_success('获取成功!',$date,200) :
            json_fail('获取失败!',null,100);
    }

    /**
     *   再次答题
     * @param pdpRemoveRequest
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function pdpRemove(pdpRemoveRequest $request){
        $res = Pdp::oys_remove($request);
        dd($res);
        return $res ?
            json_success('可以再次答题！',$res,200):
            json_fail('申请再次答题失败！',null,100);
    }


}
