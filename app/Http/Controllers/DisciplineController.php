<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class DisciplineController extends Controller {
    public function create(Request $request){
        $employeeId = $request->query('employee');
        
        $employee = DB::table('employees')
        ->join('mdas', 'employees.mda', '=', 'mdas.id')
        ->select('employees.*', 'mdas.name', 'mdas.mda_alias')
        ->where('employees.id', $employeeId)
        ->first();
        
        $disciplines = Discipline::where('employee_id', $employeeId)->get();
        return view('disciplines.create', compact('employee', 'disciplines'));
    }

    public function store(Request $request) {
        
        $request->validate([
            'employee_id' => 'required|numeric',
            'incident_date' => 'required|date',
            'description' => 'required|string',
            'status_of_incident' => 'required|string',
            'reported_by' => 'nullable|string'
        ]);

        $discipline = Discipline::create([
            'employee_id' => $request->input('employee_id'),
            'incident_date' => $request->input('incident_date'),
            'description' => $request->input('description', 'NA'),
            'status_of_incident' => $request->input('status_of_incident'),
            'reported_by' => $request->input('reported_by'),
            'added_by' => Auth::id()
        ]);

        return redirect()->back()->with('success', 'Discipline record created successfully.');
    }


}
