<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class user extends Model
{


protected $table='user';
protected $primaryKey='user_id';
public  $timestamps=false;
protected $guarded = [];


    /**根据邮箱获取用户信息
     * @author ouyangsong
     * @param $user_email
     * @return $date
     */
    public static function selectuser($request)
    {
        try {
            $user_email=$request->get('user_email');
            $date = self::where('user_email',$user_email)->get();
            return $date;
        } catch (\Exception $e) {
            logError('获取用户信息错误', [$e->getMessage()]);
            return null;
        }
    }


    /**展示所有用户信息
     * @author ouyangsong
     * @param
     * @return  $date
     */
    public static function selectalluser()
    {
        try {
            $date = self::get();
            return $date;
        } catch (\Exception $e) {
            logError('获取用户信息错误', [$e->getMessage()]);
            return null;
        }
    }

}
