<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderDetails extends Model
{
    use HasFactory;
    protected $filltable = ['order_id', 'product_id', 'product_name', 'price', 'quantity'];
}
