<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;
use App\Models\Mda;
use Coderatio\SimpleBackup\SimpleBackup;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // dd(env('DB_PORT'));
        $simpleBackup = SimpleBackup::setDatabase([env('DB_DATABASE'), env('DB_USERNAME'), env('DB_PASSWORD'), env('DB_HOST')])
        ->storeAfterExportTo('pathtostore', 'ff.sql');
  dd($simpleBackup);
  if(Auth::user()->hasRole('admin')){
            return $this->showAdminDashboard();
        }
        else if(Auth::user()->hasRole('management'))
        {
            return view('management.dashboard.index');
        }
        else if(Auth::user()->hasRole('director'))
        {
            return view('director.dashboard.index');
        }
        else
        {
            return view('/');
        }
    }


    public function showAdminDashboard(){
        $allEmployeesCount = Employee::all()->count();
        $probationEmployeesCount = Employee::where('status', 'Probation')->count();
        $activeEmployeesCount = Employee::where('status', 'Active')->count();
        $retiredEmployeesCount = Employee::where('status', 'Retired')->count();
        $activeMaleEmployeesCount = Employee::where('status', 'Active')->where('gender', 'Male')->count();
        $activeFemaleEmployeesCount = Employee::where('status', 'Active')->where('gender', 'Female')->count();
        $mdaCount = MDA::count();
    
        return view('admin.dashboard.index', compact(
            'allEmployeesCount',
            'activeEmployeesCount',
            'retiredEmployeesCount',
            'activeMaleEmployeesCount',
            'activeFemaleEmployeesCount',
            'probationEmployeesCount',
            'mdaCount'
        ));
    }

    //CHANGE PASSWORD
    public function changePassword()
    {
        return view('update-password');
    }
    //UPDATE PASSWORD
    public function updatePassword(Request $request)
    {
        #Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
        ]);

        #Match the old password
        if(!Hash::check($request->old_password, auth()->user()->password))
        {
            return back()->with("error", "Old Password Doesn't match!");
        }
        #Update the new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with("status", "Password change successfully!");
    }

}
