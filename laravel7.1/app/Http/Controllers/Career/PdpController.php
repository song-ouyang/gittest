<?php

namespace App\Http\Controllers\Career;

use App\Http\Controllers\Controller;
use App\Http\Requests\pdpnumRequest;
use App\Http\Requests\pdpRequest;
use App\Model\Pdp;
use Illuminate\Http\Request;

class PdpController extends Controller
{
    //前台给用户显示pdp的结果并且存入数据库
    public function pdpResult(Request $request){
        $date=Pdp::result($request);
        $date1=Pdp::add($request);
        dd ($date);
        dd ($date1);
        return $date?
            json_success('获取成功!',$date,200) :
            json_fail('获取失败!',null,100);
    }


    //获取pdp总共的数据
    public function pdpnum()
    {
        $date=Pdp::num();
        return $date?
            json_success('获取成功!',$date,200) :
            json_fail('获取失败!',null,100);
    }

    //通过邮箱看有没有完成
    public function pdpcheck(Request $request)
    {
        $date=Pdp::pdpdata($request);
       return $date?
            json_success('获取成功!',$date,200) :
            json_fail('获取失败!',null,100);
    }

}
