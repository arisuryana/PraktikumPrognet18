<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Courier extends Model
{
    //
    protected $table = 'couriers';
    protected $fillable = ['courier'];
    
}
