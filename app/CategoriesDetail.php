<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CategoriesDetail extends Model
{
    //
    protected $table = 'product_category_details';
    protected $fillable = ['product_id','category_id'];
}
