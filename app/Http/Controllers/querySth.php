<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\User;
use App\Models\category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class querySth extends Controller
{
    public function category(){
        $category = DB::table('categories')->get();
 
        return view('men', ['ct' => $category]);
    }
}
