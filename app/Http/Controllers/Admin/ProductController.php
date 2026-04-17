<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $categories=Category::all();
        // return view('admin.create_products', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //for category find
        $categories=Category::find($request->category_id);

        //for Product insert
        $request->validate(
            [
                'name'=>'required',
                'price'=>'required',
                'category_id'=>'required',
                'stock'=>'required'
            ]
        );

        //image upload
        $imagename=null;
        if($request->hasFile('image')){
            $imagename= Str::slug($categories->name).'_'.
                        Str::slug($request->name).'_'.
                        date('YmdHis').'.'.
                        $request->image->extension();
            $request->image->move(public_path('images'),$imagename);
        }
            //SKU and Slug
            $sku=$request->name.'PRD'.rand(0,9999);
            $slug=Str::slug($request->name);
            Product::create(
                [
                        'name'=>$request->name,
                        'sku'=>$request->sku,
                        'short_description'=>$request->short_description,
                        'description'=>$request->description,
                        'price'=>$request->price,
                        'image'=>$imagename,
                        'slug'=>$request->slug,
                        'category_id'=>$request->category_id,
                        'stock'=>$request->stock,
                        'meta_title'=>$request->metatitle,
                        'meta_description'=>$request->metadescription

                ]
            );

            return redirect()->back()->with('Success','Product Added');



        



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
