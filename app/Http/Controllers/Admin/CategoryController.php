<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('all_categories');

        $categories =Category::with('parent')->orderbydesc('id')->paginate(5);
        // dd($categories);
        //with('parent') => عشان ما =يستهلك كثير وقت بالsql
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
            'name_fr'=>'required',
            'image'=>'required',
            'parent_id'=>'nullable|exists:categories,id'
        ]);
        //Upload File
        $img_name = rand().time(). $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/categories/'),$img_name);

        //convert name to json
        $name = json_encode([
            'en'=> $request->name_en,
            'ar'=> $request->name_ar,
            'fr'=> $request->name_fr,
        ], JSON_UNESCAPED_UNICODE);
        //Insert to Database
        Category::create([
            'name'=>$name,
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
            'name_fr'=>'required',
            'parent_id'=>'nullable|exists:categories,id',
        ]);

        //Upload File
        $category = Category::findOrFail($id);
        $img_name = $category->image;
      if($request->hasFile('image'))
      {
        File::delete(public_path('uploads/categories/'.$category->image));
        $img_name = rand().time(). $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/categories/'),$img_name);
      }

      $name = json_encode([
        'en'=> $request->name_en,
        'ar'=> $request->name_ar,
        'fr'=> $request->name_fr,
    ], JSON_UNESCAPED_UNICODE);
        //Insert to Database
       $category->update([
            'name'=>$name,
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
        //Category::onlyTrashed()->forcedelete();
        File::delete(public_path('uploads/categories/'.$category->image));
       // Category::where('parent_id',$category->id)->update(['parent_id'=>null]);
      $category->children()->update(['parent_id'=>null]);
        $category->delete();
        return redirect()->route('admin.categories.index')->with('msgg','Category deleted successully')->with('type','danger');
    }
    public function trash()
    {
        $categories = Category::onlyTrashed()->get();

        return view('admin.categories.trash', compact('categories'));
    }

    public function restore($id)
    {
        Category::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.categories.trash')->with('msgg', 'Category restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        $category = Category::onlyTrashed()->find($id);
        $category->children()->update(['parent_id'=>null]);
        File::delete(public_path('uploads/categories/'. $category->image));
        $category->forcedelete();

        return redirect()->route('admin.categories.trash')->with('msgg', 'Category deleted permanintly successfully')->with('type', 'danger');
    }

    public function restore_all()
    {
        Category::onlyTrashed()->restore();
        return redirect()->route('admin.categories.index')->with('msgg', 'categories restore successfully')->with('type', 'warning');
    }

    public function delete_all()
    {
        Category::onlyTrashed()->forcedelete();
        return redirect()->route('admin.categories.index')->with('msgg', 'categories deleted successfully')->with('type', 'danger');
    }
}
