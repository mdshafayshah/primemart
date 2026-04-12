<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    //
    public function store(Request $request){
       // dd($request->all());
        //validation
        $request->validate(
            [
                'name'=>'required|string|max:255',
                'icon'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]
        );
        //image Upload
        $imagename=time().'.'.$request->icon->extension();
        $request->icon->move(public_path('images'),$imagename);

        //SaveData
        Category::create(
            [
                'name'=>$request->name,
                'icon'=>$imagename,
                'slug' => Str::slug($request->name),
            ]
        );
        return back()->with('success', 'Category Added');

    }

}
