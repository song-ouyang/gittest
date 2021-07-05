<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Temperament extends Model
{
    protected $table='temperament';
    protected $primaryKey='temperament_id';
    public  $timestamps=false;
    protected $guarded = [];



    /***查看Temperament总数据条数
     *
     * @author ouyangsong
     * @param
     * @return $data
     */
    public static function num(){
        try{
            $data =self::count();
            return $data;
        }catch(\Exception $e){
            logError('获取用户信息错误',[$e->getMessage()]);
            return null;
        }
    }




    /***查看Temperament总结果
     *如果有一个 >20就直接典型气质， 如果都小于<10 气质不明显  如果都<20的就是 混合
     * @author ouyangsong
     * @param  bile_score,bloody_score,mucus_score.depression_score
     * @return null
     */
    public static function result($request){
        try{
            $bile_score=$request->get('bile_score');
            $bloody_score=$request->get('bloody_score');
            $mucus_score=$request->get('mucus_score');
            $depression_score=$request->get('depression_score');
            $maxscope=max($bile_score,$bloody_score,$mucus_score,$depression_score);
            if( $bile_score==$maxscope)
            {
                $date="你的气质类型是胆汁质";
            }
            if($bloody_score==$maxscope)
            {
                $date="你的性格是多血质";
            }
            if( $mucus_score==$maxscope)
            {
                $date="你的性格是粘液质";
            }
            if($depression_score==$maxscope) {
                $date = "你的性格是抑郁质";
            }
            return $date;
        }catch(\Exception $e){
            logError('获取用户信息错误',[$e->getMessage()]);
            return null;
        }
    }




    /***增加Temperament
     *
     * @author ouyangsong
     * @param  bile_score,bloody_score,mucus_score.depression_score,user_email
     * @return null
     */
    public static function add($request){
        try{
            $result=self::create([
                'user_email'=>$request['user_email'],
                'bile_score'=>$request['bile_score'],
                'bloody_score'=>$request['bloody_score'],
                'mucus_score'=>$request['mucus_score'],
                'depression_score'=>$request['depression_score'],
            ]);
                 return $result;
        }catch(\Exception $e){
            logError('获取用户信息错误',[$e->getMessage()]);
            return null;
        }
    }



    /***查看的Temperament有没有写，
     *
     * @author ouyangsong
     * @param
     * @return $data
     */
    public static function data($request)
    {
        try{
            $data =self::select('bile_score','bloody_score','mucus_score','depression_score')->where('user_email',$request['user_email'])->get();
            return $data;
        }catch(\Exception $e){
            logError('获取用户信息错误',[$e->getMessage()]);
            return null;
        }
    }



    /**允许更还
     * @author ouyangsong
     * @param  user_email
     * @return $res
     */
    public static function oys_remove($remove){
        try {
            $res = self::where('user_email',$remove['user_email'])->update([
                'bile_score' => null,
                'bloody_score' => null,
                'mucus_score' => null,
                'depression_score' => null,
            ]);
            return $res;
        }catch (\Exception $e){
            logError('重置结果失败失败',[$e->getMessage()]);
            return false;
        }
    }







}
