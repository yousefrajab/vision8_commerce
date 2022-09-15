<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index()
    {
        // dd(Auth::user());
        // //Auth::user() => كل بيانات الشخص  المسجل دخول
        return view('admin.index');
    }
}
