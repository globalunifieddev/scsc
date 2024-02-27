<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Employee;
// use App\Models\Transfer;
use App\Models\Promotion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PromotionController extends Controller {

    public function create(Request $request){
        $employeeId = $request->query('employee');
        
        $employee = DB::table('employees')
        ->join('mdas', 'employees.mda', '=', 'mdas.id')
        ->select('employees.*', 'mdas.name', 'mdas.mda_alias')
        ->where('employees.id', $employeeId)
        ->first();
        
        $promotions = Promotion::where('employee_id', $employeeId)->get();
        return view('promotions.create', compact('employee', 'promotions'));
    }


    public function store(Request $request){
        
        $validatedData = $request->validate([
            'employee_id' => 'required',
            'promotion_date' => 'required|date',
            'previous_rank' => 'required',
            'new_rank' => 'required',
            'reason' => 'nullable',
            'approved_by' => 'nullable',
            'comment' => 'nullable',
        ]);

        Promotion::create($validatedData);
        return redirect()->back()->with('success', 'Promotion added successfully.');
    }

}
