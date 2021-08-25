<?php

namespace App\Models;

use \Exception;

use Illuminate\Database\Eloquent\Model;

class Sds extends Model
{
    protected $table='sds';
    protected $primaryKey='sds_id';
    public  $timestamps=false;
    protected $guarded = [];



    /***
     * 查询sds测试了几次
     * zcr
     * @return $res
     */
    public static function zcr_num(){
        try {
            $res = Sds::count();
            return $res;
        }catch (\Exception $e){
            logError('获取数目失败',[$e->getMessage()]);
            return false;
        }
    }


    /***
     * 测试完成后添加分数
     * zcr
     * @param user_email,reality_score,research_score,art_score,society_score,enterprise_score,tradition_score
     * @return $res
     */
    public static function zcr_score($score){
        try {
            $res = self::create([
                'user_email' => $score['user_email'],
                'reality_score' => $score['reality_score'],
                'research_score' => $score['research_score'],
                'art_score' => $score['art_score'],
                'society_score' => $score['society_score'],
                'enterprise_score' => $score['enterprise_score'],
                'tradition_score' => $score['tradition_score'],
            ]);
            return $res;
        }catch (\Exception $e){
            logError('存入分数失败',[$e->getMessage()]);
            return false;
        }
    }

    /***
     * 返回测试分数结果
     * zcr
     * @param user_email
     * @return $res
     */
    public static function zcr_result($result){
        try {
            $res1 = Sds::select()->where('user_email',$result['user_email'])->count();
            if ($res1){
                $res2 = Sds::select(
                    'reality_score',
                    'research_score',
                    'art_score',
                    'society_score',
                    'enterprise_score',
                    'tradition_score'
                )->where('user_email',$result['user_email'])->get();
                return $res2;
            }
        }catch (\Exception $e){
            logError('返回结果失败',[$e->getMessage()]);
            return false;
        }
    }

    /***
     * 将分数置0，令其可以再次答题
     * zcr
     * @param user_email
     * @return $res
     */
    public static function zcr_remove($remove){
        try {
            $res = self::where('user_email',$remove['user_email'])->update([
                'reality_score' => null,
                'research_score' => null,
                'art_score' => null,
                'society_score' => null,
                'enterprise_score' => null,
                'tradition_score' => null
            ]);
            return $res;
        }catch (\Exception $e){
            logError('重置结果失败失败',[$e->getMessage()]);
            return false;
        }
    }

}
