<?php

namespace App\Http\Controllers\Admin;


use App\Models\Payment;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index()
    {
        // dd(Auth::user());
        // //Auth::user() => كل بيانات الشخص  المسجل دخول
        // return view('admin.index');
        // App::setlocale($locale);
        $c_count = Category::count();
        $p_count = Product::count();
        $m_earning = Payment::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->sum('total');
        $y_earning = Payment::whereYear('created_at', date('Y'))->sum('total');

        return view('admin.index', compact('c_count', 'p_count', 'm_earning', 'y_earning'));
    }
}
