<?php

namespace App\Http\Controllers\admin;

use App\Models\role;
use App\Models\ability;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

  class rolecontroller extends Controller
{
    public function index()
    {
        $roles = role::paginate(10);
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $abilities = ability::all();
        return view('admin.roles.create', compact('abilities'));
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
            'name' => 'required'
        ]);

        $role = role::create([
            'name' => $request->name
        ]);

        $role->abilities()->attach($request->ability);

        return redirect()->route('admin.roles.index');
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
    public function edit(role $role)
    {
        // $role = Role::findOrFail($id);
        $abilities = ability::all();
        return view('admin.roles.edit', compact('abilities', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, role $role)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $role->update([
            'name' => $request->name
        ]);

        $role->abilities()->sync($request->ability);

        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roles = role::findOrFail($id);
        $roles->delete();
        return redirect()->route('admin.roles.index')->with('msgg','Role deleted successully')->with('type','danger');
    }

    /**
     * Display a trashed listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $roles = role::onlyTrashed()->get();
        return view('admin.roles.trash', compact('roles'));
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        role::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.roles.trash')->with('msgg', 'Role restored successfully')->with('type', 'warning');
    }

    /**
     * forcedelete the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forcedelete($id)
    {
        $role = role::onlyTrashed()->find($id);
        // File::delete(public_path('uploads/categories/'. $category->image));
        $role->forcedelete();

        return redirect()->route('admin.roles.trash')->with('msgg', 'Role deleted permanintly successfully')->with('type', 'danger');
    }
    public function restore_all()
    {
        role::onlyTrashed()->restore();
        return redirect()->route('admin.roles.index')->with('msgg', 'roles restore successfully')->with('type', 'warning');
    }

    public function delete_all()
    {
        role::onlyTrashed()->forcedelete();
        return redirect()->route('admin.roles.index')->with('msgg', 'role deleted successfully')->with('type', 'danger');
    }
}
