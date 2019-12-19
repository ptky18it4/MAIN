<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $table = 'tbl_checkout';
    protected $fillable = [
        'name', 'price', 'count', 'created_at'
    ];
}
