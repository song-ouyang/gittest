<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Temperament extends Model
{
    protected $table = 'temperament';
    protected $primaryKey = 'temperament_id';
    public $timestamps = false;
    protected $guarded = [];


    /*请求前台的分数，根据分数判断属于什么气质
     1.当一个气质达到20分以上就是典型气质
     2.一般形气质：10-20
     3.气质表现不明显：10分以下
     4，混合型气质：两种分差不大于4分
     5.表明排斥性是负分
     bile_score:胆汁质
     bloody_score:多血质
     mucus_score:黏液质
     depression_score:抑郁质
    */
    /***返回Temperament总结果
     *某一项气质大于20，则为典型气质；气质在10-20则为一般气质；气质低于10分则为气质表达不明显；两种分差不大于四分则是混合性气质；如果某一项低于0则是表明排斥性
     * @param Request $request
     * @return $date1
     * @author gujiayu
     */
    public static function gjy_result($result)
    {
        try {
            $bile_score = $result->get('bile_score');
            $bloody_score = $result->get('bloody_score');
            $mucus_score = $result->get('mucus_score');
            $depression_score = $result->get('depression_score');
            $sum=array($bile_score,$bloody_score,$mucus_score,$depression_score);
            $date= array();
            for($i=0;$i<4;$i++){

                if($sum[$i]>20){
                    array_push($date,"你的典型气质是".$sum[$i]);
                }
                if($sum[$i]>=10&&$sum[$i]<=20){
                    array_push($date,"你的一般型气质是".$sum[$i]);
                }
                if($sum[$i]<10&&$sum[$i]>=0){
                    array_push($date,"你的一般型气质是".$sum[$i]);
                }
                if($sum[$i]<0){
                    array_push($date,"你的".$sum[$i]."表现排斥性");
                }
                for($j=$i;$j<=3;$j++){
                    if($sum[$i]-$sum[$j+1]==4||$sum[$i]-$sum[$j+1]==-4){
                        array_push($date,"你的混合型气质有".$sum[$i]."和".$sum[$j+1]);
                    }
                }
            }
            $date1 = implode(" ",$date);
            return $date1;
        } catch (\Exception $e) {
            logError('获取用户信息错误', [$e->getMessage()]);
            return null;
        }
    }
    /***查询是否做过气质测试
     *
     * @author gujiayu
     * gjy
     * @return $res
     */
    public static function gjy_num(){
        try{
            $res = Temperament::count();
            return $res;
        }catch (\Exception $e){
            logError('获取数目失败',[$e->getMessage()]);
            return false;
        }
    }
    /***
     * 测试完成后添加分数
     * gujiayu
     * @param user_email,bile_score,bloody_score,mucus_score,depression_score
     * @return $res
     */
    public static function gjy_score($score){
        try{
            $res = self::create(
                [
                    'user_email'=>$score['user_email'],
                    'bile_score'=>$score['bile_score'],
                    'bloody_score'=>$score['bloody_score'],
                    'mucus_score'=>$score['mucus_score'],
                    'depression_score'=>$score['depression_score'],
                ]);
            return $res;
        }catch (\Exception $e){
            logError('存入分数失败',[$e->getMessage()]);
            return false;
        }
    }
    /***
     * 将分数置0，令其可以再次答题
     * gujiayu
     * @param user_email
     * @return $res
     */
    public static function gjy_remove($remove){
        try{
            $res = self::where('user_email',$remove['user_email'])->update([
                'bile_score'=>null,
                'bloody_score'=>null,
                'mucus_score'=>null,
                'depression_score'=>null
            ]);
            return $res;
        }catch (\Exception $e){
            logError('重置结果失败失败',[$e->getMessage()]);
            return false;
        }
    }

}





