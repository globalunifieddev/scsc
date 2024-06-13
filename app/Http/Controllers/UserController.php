<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Asset;
use App\Models\Role;
use App\Models\Location;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

// TO-DO: Rework this whole logic
class UserController extends Controller
{


    public function index()
    {
    

    $users = User::whereHas('roles', function ($query) {
        $query->whereIn('name', ['director', 'management']);
    })
    
    ->get();

    return view('admin.users.index', compact('users'));
    }


    public function create()
    {
        $roles = Role::get(['id', 'name']);
        $locations = Location::get();
        $departments = Department::get();
        return view('admin.users.create', compact('roles', 'locations', 'departments'));
    }

    public function store(Request $request)
    {
        $user = User::create([
                  'first_name'      =>  $request->first_name,
                  'middle_name' =>  $request->middle_name,
                  'sur_name'    =>  $request->sur_name,
                  'staff_id'      =>  $request->staff_id,
                  'department_id' => $request->department_id,
                  'location_id' => $request->location_id,
                  'phone'     =>  $request->phone,
                  'email'     =>  $request->email,
                  'password'  =>  Hash::make($request->password),
                ]);

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with('success', 'User created succssfully.');
    }

    public function show($id)
    {
    $user = User::select('users.*', 'locations.name as location_name', 'departments.name as department_name', 'assets.name as asset_name')
        ->leftJoin('locations', 'users.location_id', '=', 'locations.id')
        ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
        ->leftJoin('assets', 'users.id', '=', 'assets.assigned_to')
        ->where('users.id', $id)
        ->first();
        $assignedAssets = Asset::where('assigned_to', $user->id)->get();

    return view('admin.users.show', compact('user', 'assignedAssets'));
    }

    public function edit($id)
    {
        $roles = Role::get(['id', 'name']);
        $userLocation = auth()->user()->location_id;
        $locations = Location::get();
        $departments = Department::get();
        $user = User::select('users.*', 'locations.name as location_name', 'departments.name as department_name')
        ->join('locations', 'users.location_id', '=', 'locations.id')
        ->join('departments', 'users.department_id', '=', 'departments.id')
        ->where('users.id', $id)
        ->first();
        $userRoles = $user->roles->pluck('id')->toArray();

        return view('admin.users.edit', compact('user','roles','locations','departments','userRoles'));
    }

    public function update(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $user->update(['phone' => $request->phone]);
        $user->update(['staff_id' => $request->staff_id]);
        $user->update(['location_id' => $request->location_id]);
        $user->update(['department_id' => $request->department_id]);
        $user->update(['name' => $request->name]);
        $user->update(['email' => $request->email]);
        $user->syncRoles($request->input('roles'));

        return redirect()->route('users.index')->with('success', 'User updated succssfully.');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');

    }
}