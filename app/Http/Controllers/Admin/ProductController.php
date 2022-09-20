<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->orderbydesc('id')->paginate(5);

        return view('Admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $product = new Product();
        return view('Admin.products.create', compact('categories', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
            'image' => 'required',
            'content_en' => 'required',
            'content_ar' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
        ]);

        $img_name = rand() . time() . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/products/'), $img_name);

        //convert name to json
        $name = json_encode([
            'en' => $request->name_en,
            'ar' => $request->name_ar,
            // 'fr'=> $request->name_fr,
        ], JSON_UNESCAPED_UNICODE);
        $content = json_encode([
            'en' => $request->content_en,
            'ar' => $request->content_ar,
            // 'fr'=> $request->name_fr,
        ], JSON_UNESCAPED_UNICODE);

        $slugcount=Product::where('slug','like','%'. Str::slug($request->name_en).'%')->count();
        $slug=Str::slug($request->name_en);
        if($slugcount){
        $slug=Str::slug($request->name_en).'-'.$slugcount;
        }

        //Store Data to Database

        // dd($request->all());
        $product = Product::create([
            'name' => $name,
            'slug' => $slug,
            'image' => $img_name,
            'content' => $content,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
        ]);
        //Upload album to images table if exists

        if ($request->has('album')) {
            foreach ($request->album as $item) {
                $img_name = rand() . time() . $item->getClientOriginalName();
                $item->move(public_path('uploads/products/'), $img_name);
                Image::create([
                    'path' => $img_name,
                    'product_id' => $product->id
                ]);
            }
        }

        //Redirect
        return redirect()->route('admin.products.index')->with('msg', 'Product created successully')->with('type', 'success');
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
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('Admin.products.edit', compact('categories', 'product'));
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
        $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
            'image' => 'nullable',
            'content_en' => 'required',
            'content_ar' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
        ]);

        $product = Product::findOrFail($id);
        $img_name = $product->image;
        if ($request->hasFile('image')) {
            $img_name = rand() . time() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/products/'), $img_name);
        }


        //convert name to json
        $name = json_encode([
            'en' => $request->name_en,
            'ar' => $request->name_ar,
            // 'fr'=> $request->name_fr,
        ], JSON_UNESCAPED_UNICODE);
        $content = json_encode([
            'en' => $request->content_en,
            'ar' => $request->content_ar,
            // 'fr'=> $request->name_fr,
        ], JSON_UNESCAPED_UNICODE);
        //Insert to Database

        // dd($request->all());
        $product->update([
            'name' => $name,
            'image' => $img_name,
            'content' => $content,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
        ]);
        //Upload album to images table if exists

        if ($request->has('album')) {
            foreach ($request->album as $item) {
                $img_name = rand() . time() . $item->getClientOriginalName();
                $item->move(public_path('uploads/products/'), $img_name);
                Image::create([
                    'path' => $img_name,
                    'product_id' => $product->id
                ]);
            }
        }

        //Redirect
        return redirect()->route('admin.products.index')->with('msg', 'Product updated successully')->with('type', 'info');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        File::delete(public_path('uploads/products/' . $product->image));
        // Category::where('parent_id',$product->id)->update(['parent_id'=>null]);
        //   $product->children()->update(['parent_id'=>null]);
        $product->album()->delete();
        $product->delete();
        return redirect()->route('admin.products.index')->with('msg', 'Product deleted successully')->with('type', 'danger');
    }

    public function delete_image($id)
    {
        Image::destroy($id);
        return redirect()->back();
    }
}
