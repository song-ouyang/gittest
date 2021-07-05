<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sds extends Model
{
    protected $table='sds';
    protected $primaryKey='sds_id';
    public  $timestamps=false;
    protected $guarded = [];


}
