<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $primary_key = 'id';
    protected $fillable = [
        'timeout','address','regency','province','total','shipping_cost','sub_total','user_id','courier_id','proof_of_payment','status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product_detail()
    {
        return $this->belongsToMany(Products::class, 'transaction_details','transaction_id', 'product_id');
    }
}

