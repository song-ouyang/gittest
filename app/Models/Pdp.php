<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use http\Exception;
use Illuminate\Support\Facades\DB;

/**
 * @method static create(array $array)
 */
class Pdp extends Model
{
    protected $table='pdp';
    protected $primaryKey='pdp_id';
    public  $timestamps=false;
    protected $guarded = [];

    /***查看pdp结果
     *
     * @author ouyangsong
     * @param tiger_score,peacock_score,koala_score,owl_score,chameleon_score
     * @return $data
     */
    public static function result($request){
        try{
            $tiger_score=$request->get('tiger_score'); //老虎
            $peacock_score=$request->get('peacock_score'); //孔雀
            $koala_score=$request->get('koala_score'); //考拉
            $owl_score=$request->get('owl_score'); //猫头鹰
            $chameleon_score=$request->get('chameleon_score'); //变色龙
            $maxscope=max($peacock_score,$koala_score,$owl_score,$tiger_score,$chameleon_score);
            if($tiger_score==$maxscope)
            {
                $date="你的性格是老虎";
            }
        if($peacock_score==$maxscope)
            {
                $date="你的性格是孔雀";
            }
           if($koala_score==$maxscope)
            {
                $date="你的性格是考拉";
            }
          if($owl_score==$maxscope)
            {
                $date="你的性格是猫头鹰";
            }
            if($chameleon_score==$maxscope)
            {
                $date="你的性格是变色龙";
            }
            return $date;
        }catch(\Exception $e){
            logError('获取用户信息错误',[$e->getMessage()]);
            return null;
        }
    }


    /***查看pdp总数据条数
     *
     * @author ouyangsong
     * @param
     * @return data
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



    /***查看的pdp分数
     *
     * @author ouyangsong
     * @param  user_email
     * @return data
     */
    public static function pdpdata($request){
        try{
            $data =self::select('tiger_score', 'peacock_score', 'koala_score', 'owl_score', 'chameleon_score')->where('user_email',$request['user_email'])->get();
            return $data;
        }catch(\Exception $e){
            logError('获取用户信息错误',[$e->getMessage()]);
            return null;
        }
    }


    /***往pdp表中插入数据
     *
     * @author ouyangsong
     * @param tiger_score,peacock_score,koala_score,owl_score,chameleon_score,email,id
     * @return $result
     */

    public static function add($request){
        try{
            $result=self::create([
                'user_email'=>$request['user_email'],
                'tiger_score'=>$request['tiger_score'],
                'peacock_score'=>$request['peacock_score'],
                'koala_score'=>$request['koala_score'],
                'owl_score'=>$request['owl_score'],
               'chameleon_score'=>$request['chameleon_score'],
            ]);
            return $result;
        }catch(\Exception $e){
            logError('添加pdp数据错误',[$e->getMessage()]);
            return null;
        }
    }







    /**允许更还
     * @author ouyangsong
     * @param  user_email
     * @return null
     */

    public static function oys_remove($remove){
        try {
            $res = self::where('user_email',$remove['user_email'])->update([
                'tiger_score' => null,
                'peacock_score' => null,
                'koala_score' => null,
                'owl_score' => null,
                'chameleon_score' => null,
            ]);
            return $res;
        }catch (\Exception $e){
            logError('重置结果失败失败',[$e->getMessage()]);
            return false;
        }
    }







}
