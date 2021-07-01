<?php

namespace App\Http\Controllers\Career;

use App\Http\Controllers\Controller;
use App\Model\Temperament;
use Illuminate\Http\Request;

class TemperamentController extends Controller
{




    //获取Temperament总共的数据
    public function Temperamentnum()
    {
        $date=Temperament::num();
        dd($date);
        return $date?
            json_success('获取成功!',$date,200) :
            json_fail('获取失败!',null,100);
    }



    //获取Temperament的分
    public function Temperamentcheck(Request $request)
    {
        $date=Temperament::data($request);
        dd($date);
        return $date?
            json_success('获取成功!',$date,200) :
            json_fail('获取失败!',null,100);
    }


    //显示Temperament的结果并且存入数据库
    public function TemperamentResult(Request $request)
    {
       $date=Temperament::result($request);
        $date1=Temperament::add($request);
        dd ($date);
        dd ($date1);
        return $date?
            json_success('获取成功!',$date,200) :
            json_fail('获取失败!',null,100);
    }

}
