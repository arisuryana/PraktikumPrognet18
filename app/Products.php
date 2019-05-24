<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    //
    protected $table = 'products';
    protected $fillable = ['product_name','price','description','stock','weight'];

    public function product_discount()
    {
        return $this->hasMany(Discount::class);
    }

    public function transaction_detail()
    {
        return $this->belongsToMany(Transaction::class, 'transaction_details', 'product_id', 'transaction_id');
    }

}
