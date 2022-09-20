<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index()
    {
        $products_slider = Product::orderbydesc('id')->take(3)->get();
        $categories = Category::orderbydesc('id')->take(3)->get();
        $products_latest = Product::orderbydesc('id')->take(9)->offset(3)->get();
        return view('site.index', compact('products_slider', 'categories','products_latest'));
    }
    public function about()
    {
        return view('site.about');
    }
    public function shop()
    {
        $products = Product::orderbydesc('id')->paginate(6);
        return view('site.shop',compact('products'));
    }
    public function category($id)
    {
        $category=category::findOrFail($id);
        $products = $category->products()->orderbydesc('id')->paginate(6);
        return view('site.shop',compact('products','category'));
    }
    public function contact()
    {
        return view('site.contact');
    }

    public function search(Request $request)
    {
        $products = Product::orderbydesc('id')->where('name','like','%'.$request->q.'%')->paginate(6);
        return view('site.search',compact('products'));
    }

    public function product($slug)
    {
        // dd($slug);
        $product = product::where('slug',$slug)->first();
        if(!$product){
            abort(404);
        }
        $next = product::where('id', '>' ,$product->id)->first();
        $prev = product::where('id', '<' ,$product->id)->orderbydesc('id')->first();

        $related =product::where('category_id',$product->category->id)->where('id','!=',$product->id)->get();
        // dd($next);
        // dd($product);
        return view('site.product' , compact('product','next','prev' ,'related'));
    }

    public function product_review(Request $request)
    {
        Review::create([
            'comment'=>$request->comment,
            'star'=>$request->rating,
            'product_id'=>$request->product_id,
            'user_id'=> Auth::id()
        ]);
        return redirect()->back();
    }
}
