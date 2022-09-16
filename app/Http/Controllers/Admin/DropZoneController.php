<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DropZoneController extends Controller
{
    public function dropzone()
    {
        return view('admin.dropzone');
    }

    public function dropzoneStore(Request $request)
    {
        $image = $request->file('file');
        $iamgename =time(). '.' .$image->extension();
        $image->move(public_path('uploads/images'),$iamgename);
        return response()->json(['success'=>$iamgename]);
    }
}
