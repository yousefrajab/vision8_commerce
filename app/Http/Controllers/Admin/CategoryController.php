<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories =Category::orderbydesc('id')->paginate(10);
        return view('Admin.categories.index' ,compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =Category::all();
        return view('Admin.categories.create' ,compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate Data
        $request->validate([
            'name_en'=>'required',
            'name_ar'=>'required',
            'image'=>'required',
            'parent_id'=>'nullable|exists:categories,id',
        ]);
        //Upload File
        $img_name = rand().time(). $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/categories/'),$img_name);
        //Insert to Database
        Category::create([
            'name'=>$request->name_en .' '.$request->name_ar,
            'image'=>$img_name,
            'parent_id'=>$request->parent_id
        ]);

        //Redirect
        return redirect()->route('admin.categories.index')->with('msg','Category created successully')->with('type','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories =Category::all();
        $category = Category::findOrFail($id);
        return view('Admin.categories.edit' ,compact('categories','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate Data
        $request->validate([
            'name_en'=>'required',
            'name_ar'=>'required',
            'parent_id'=>'nullable|exists:categories,id',
        ]);

        //Upload File
        $category = Category::findOrFail($id);
        $img_name = $category->image;
      if($request->hasFile('image'))
      {
        $img_name = rand().time(). $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/categories/'),$img_name);
      }
        //Insert to Database
       $category->update([
            'name'=>$request->name_en .' '.$request->name_ar,
            'image'=>$img_name,
            'parent_id'=>$request->parent_id
        ]);

        //Redirect
        return redirect()->route('admin.categories.index')->with('msg','Category updated successully')->with('type','info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        File::delete(public_path('uploads/categories/'.$category->image));
       // Category::where('parent_id',$category->id)->update(['parent_id'=>null]);
      $category->children()->update(['parent_id'=>null]);
        $category->delete();
        return redirect()->route('admin.categories.index')->with('msg','Category deleted successully')->with('type','danger');
    }
}
