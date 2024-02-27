<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\RoleHasPermission;
use App\Models\Permissions;
use DB;

class PermissionController extends Controller
{
    //
    public function index()
    {
         $permissions = Permission::simplePaginate(4);
         return view('permissions.index',compact('permissions'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('permissions.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name',
        ]);

        $permission = Permission::create(['name' => $request->input('name')]);

        return redirect()->route('permissions.index')
                        ->with('success','Permissions created successfully');
    }
    //
    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('permissions.edit',compact('permission'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $permission = Permission::where('id', $id)->first();
        $permission->name = $request->input('name');
        $permission->update();
        return redirect()->route('permissions.index')
        ->with('success', 'Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::find($id)->delete();

        return redirect()->route('permissions.index')
                        ->with('success','Permission deleted successfully');
    }

    
}
