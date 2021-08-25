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
     * @param bile_score,bloody_score,mucus_score,depression_score
     * @return $res
     * @author gujiayu
     */
    public static function gjy_result($result)
    {
        try {
            $bile_score = $result->get('bile_score');
            $bloody_score = $result->get('bloody_score');
            $mucus_score = $result->get('mucus_score');
            $depression_score = $result->get('depression_score');
            $sum=array("bile_score"=>$bile_score,"bloody_score"=>$bloody_score,"mucus_score"=>$mucus_score,"depression_score"=>$depression_score);
            $sum1=array($bile_score,$bloody_score,$mucus_score,$depression_score);
            $date= array();
            for($j=0;$j<4;$j++){
                for($i=$j+1;$i<4;$i++){
                    if($sum1[$j]-$sum1[$i] >=-4 && $sum1[$j] - $sum1[$j+1] <=4){
                        $date1 = $sum1[$j];
                        $date2 = $sum1[$i];
                    }}
            }
            foreach($sum as $name=>$value){
                if($value == $date1||$value == $date2){
                    array_push($date,"你的混合性气质是".$name);
                }
            }
            foreach ($sum as $name=>$value){
                if($value > 20) {
                    array_push($date, "你的典型气质是" . $name);
                }
                if($value >=10 &&$value<=20)
                {
                    array_push($date,"你的一般型气质是".$name);
                }
                if($value >=0&& $value<10){
                    array_push($date,"你的气质表现不明显的是".$name);
                }
                if($value<0){
                    array_push($date,"你的".$name."表现排斥性");
                }
            }

            $res = implode(" ",$date);
            return $res;
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





