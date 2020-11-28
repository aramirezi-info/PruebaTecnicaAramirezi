<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'customer_name', 
        'customer_mobile', 
        'customer_email',
        'product_id',
        'transaction_id'
    ];

    function product(){
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
}
