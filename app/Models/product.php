<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $filltable = ['product_name', 'product_src', 'quantity', 'price', 'description', 'gender', 'brand_id', 'cat_id '];
}
