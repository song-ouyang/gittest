<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pdp extends Model
{
    protected $table='pdp';
    protected $primaryKey='pdp_id';
    public  $timestamps=false;
    protected $guarded = [];
}
