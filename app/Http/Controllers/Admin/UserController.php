<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('type','user')->orderbydesc('id')->paginate(5);

       return view('admin.users.index' , compact('users'));
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('admin.users.index')->with('msgg','User deleted successully')->with('type','danger');
    }
}
