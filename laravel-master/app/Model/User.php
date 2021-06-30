<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class user extends Model
{
protected $table='user';
protected $primaryKey='user_id';
public  $timestamps=false;
protected $guarded = [];
}
