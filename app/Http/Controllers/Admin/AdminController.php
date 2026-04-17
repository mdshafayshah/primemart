<?php

namespace App\Http\Controllers\Admin;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Return views
    public function active_orders(){
        return view('admin.active_orders');
    }
    public function all_orders(){
        return view('admin.all_orders');
    }
    public function all_products(){
        $products = Product::with('category')->get();;
        $categories = Category::all();

        return view('admin.all_products', compact('products', 'categories'));
    }
    public function categories(){
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }
    public function create_products(){
        $categories = Category::all();
        return view('admin.create_products', compact('categories'));
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function settings(){
        return view('admin.settings');
    }   

    
}
