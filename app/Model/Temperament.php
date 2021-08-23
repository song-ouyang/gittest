<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Temperament extends Model
{
    protected $table='temperament';
    protected $primaryKey='temperament_id';
    public  $timestamps=false;
    protected $guarded = [];
}
