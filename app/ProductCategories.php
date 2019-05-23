<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductCategories extends Model
{
    //
    protected $table = 'product_categories';
    protected $fillable = ['category_name'];

}
