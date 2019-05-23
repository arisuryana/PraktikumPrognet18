<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductImages extends Model
{
    //
    protected $table = 'product_images';
    protected $primary_key = 'id';
    protected $fillable = ['product_id','image_name'];

    public function product()
    {
        return $this->belongsTo('App\Products');
    }
}
