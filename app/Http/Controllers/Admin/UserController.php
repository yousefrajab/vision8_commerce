<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('type','user')->orderbydesc('id')->paginate(5);

       return view('admin.users.index' , compact('users'));
    }

     public function create()
    {
        $users =user::all();
        return view('Admin.users.create' ,compact('users'));
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
            'name' => 'required',
            'email' => 'required',
            'password'=>'required'

        ]);

        $user = user::create([
            'name' => $request->name ,
            'email' => $request->email,
            'password'=>$request->password,
        ]);

        // $role->abilities()->attach($request->ability);

        return redirect()->route('admin.users.index')->with('msg','User Created successully')->with('type','warning');
    }

    public function destroy($id)
    {

        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('admin.users.index')->with('msg','User deleted successully')->with('type','danger');
    }

    public function trash()
    {
        $users = User::onlyTrashed()->get();

        return view('admin.users.trash', compact('users'));
    }

    public function restore($id)
    {
        User::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.users.trash')->with('msg', 'User restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {

        $user = User::onlyTrashed()->find($id);
        // File::delete(public_path('uploads/users/' . $user->image));

        // $user->children()->update(['parent_id'=>null]);
        // File::delete(public_path('uploads/users/'. $user->image));
        $user->forcedelete();

        return redirect()->route('admin.users.trash')->with('msg', 'User deleted permanintly successfully')->with('type', 'danger');
    }

    public function restore_all()
    {
        User::onlyTrashed()->restore();
        return redirect()->route('admin.users.index')->with('msg', 'users restore successfully')->with('type', 'warning');
    }

    public function delete_all()
    {
        User::onlyTrashed()->forcedelete();
        return redirect()->route('admin.users.index')->with('msg', 'users deleted successfully')->with('type', 'danger');
    }
}
