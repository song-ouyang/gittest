<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Pdp extends Model
{
    protected $table='pdp';
    protected $primaryKey='pdp_id';
    public  $timestamps=false;
    protected $guarded = [];



    /***
     * 查看完成pdp的人数
     * wzh
     * @return $res
     */
    public function wzh_num()
    {
        //利用 try catch语句
        try {
         $res=pdp::count(); //查询数据库
         return $res;  //返回值
        }
        catch (\Exception $e){
            logError('查询数目失败',[$e->getMessage()]);
            return false;
        }

    }
    /***
     * 查看完成pdp的人数
     * wzh
     * @param Request $request
     * @return $data
     */
    public function wzh_score($score){
        try {
            //录入数据
        $data=self::create(
            [   'user_email'=>$score['user_email'],
                'tiger_score'=>$score['tiger_score'],
                'peacock_score'=>$score['peacock_score'],
                'koala_score'=>$score['koala_score'],
                'owl_score'=>$score['owl_score'],
                'chameleon_score'=>$score['chameleon_score']
            ]
        );
        //返回值
        return $data;
        }
        catch (\Exception $e){
            logError('添加失败',[$e->getMessage()]);
            return false;
        }
    }
    /***
     * 查看完成pdp的人数
     * wzh;
     * @param Request $request
     * @return $res2
     */
    public function wzh_result($result){
        try {
            //调用表单分数
            $tiger=$result->get('tiger_score');
            $peacock=$result->get('peacock_score');
            $koala=$result->get('koala_score');
            $owl=$result->get('owl_score');
            $chameleon=$result->get('chameleon_score');
            $max=max($peacock,$koala,$owl,$tiger,$chameleon);
            //返回值
            if($tiger==$max)
            {
                $date="你的性格是老虎";
            }
            if($peacock==$max)
            {
                $date="你的性格是孔雀";
            }
            if($koala==$max)
            {
                $date="你的性格是考拉";
            }
            if($owl==$max)
            {
                $date="你的性格是猫头鹰";
            }
            if($chameleon==$max)
            {
                $date="你的性格是变色龙";
            }
            return $date;
        }
        catch (\Exception $e){
            logError('反馈失败',[$e->getMessage()]);
            return false;
        }
    }
    /***
     * 点击重做将分数归零
     * wzh;
     * @param Request $request
     * @return $res3
     */
    public function wzh_remove($remove){
        try {
            //更新数据，，清零
            $res = self::where('user_email',$remove['user_email'])->update([
            'tiger_score' => null,
            'peacock_score' => null,
            'koala_score' => null,
            'owl_score' => null,
            'chameleon_score' => null,
        ]);
            //返回值
            return $res;

        }
        catch (\Exception $e){
            logError('重做失败',[$e->getMessage()]);
            return false;
        }
    }
}
