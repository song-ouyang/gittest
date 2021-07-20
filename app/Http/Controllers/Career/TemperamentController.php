<?php

namespace App\Http\Controllers\Career;

use App\Http\Controllers\Controller;
use App\Http\Requests\Temperamentcheckrequest;
use App\Http\Requests\TemperamentRemoveRequest;
use App\Http\Requests\TemperamentResultrequest;
use App\Models\Temperament;
use Illuminate\Http\Request;

class TemperamentController extends Controller
{


    /**
     *  获取Temperament总共的数据
     * @param
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function Temperamentnum()
    {
        $date=Temperament::num();
        return $date?
            json_success('获取成功!',$date,200) :
            json_fail('获取失败!',null,100);
    }





    /**
     *  获取Temperament的分
     * @param \Temperamentcheckrequest
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function Temperamentcheck(Temperamentcheckrequest $request)
    {
        $date=Temperament::data($request);
        return $date?
            json_success('获取成功!',$date,200) :
            json_fail('获取失败!',null,100);
    }



    /**
     *  显示Temperament的结果并且存入数据库
     * @param \TemperamentResultrequest
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function Temperamentresult(TemperamentResultrequest  $request)
    {
       $date=Temperament::result($request);
        $date1=Temperament::add($request);
        return $date?
            json_success('获取成功!',$date,200) :
            json_fail('获取失败!',null,100);
    }



/**
 *   再次答题
 * @param \TemperamentRemoveRequest
 * @return \Illuminate\Http\JsonResponse
 * @throws \Exception
 */
public function Temperamentremove(TemperamentRemoveRequest $request){
    $res = Temperament::oys_remove($request);
    return $res ?
        json_success('可以再次答题！',$res,200):
        json_fail('申请再次答题失败！',null,100);
}
}
