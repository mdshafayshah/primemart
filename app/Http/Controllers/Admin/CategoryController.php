<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

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


    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        if ($request->hasFile('icon')) {
            $imagename = time().'.'.$request->icon->extension();
            $request->icon->move(public_path('images'), $imagename);
            $category->icon = $imagename;
        }

        $category->save();

        return back();
    }
    public function destroy(Request $request,$id)
    {
        $category=Category::findorFail($id);

        $category->delete();

        return back()->with('success','Category Deleted');
    }

}
