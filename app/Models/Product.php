<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'description', 
        'price'
    ];

    function order(){
        return $this->belongsTo('App\Models\Order');
    }
}
