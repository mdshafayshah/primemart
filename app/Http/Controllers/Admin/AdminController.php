<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function orders(){
        return view('admin.orders');
    }
    public function categories(){
        return view('admin.categories');
    }
    public function product(){
        return view('admin.product');
    }
    
}
