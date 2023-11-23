<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $filltable=['user_id', 'fullName', 'phoneNumber', 'address', 'subTotal','fax', 'shipping', 'total'];
    
}
