<?php
namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Mda;
use App\Models\Promotion;
use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EmployeeImport;


class EmployeeController extends Controller {
    public function index(){
        $mdas = Mda::pluck('name', 'id', 'mda_alias');
        return view('employees.index', compact('mdas'));
    }

  

    public function store(Request $request) {

        $request->validate([
            'staff_id' => 'string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'file_number' => 'string|unique:employees|max:255',
            'dob' => 'required|date',
            'gender' => 'required|in:male,female',
            'lga' => 'required|string|max:255',
            'mda' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'highest_qualification' => 'required|string|max:255',
            'first_appointment_date' => 'required|date',
            'current_rank' => 'required|string|max:255',
            'last_promotion_date' => 'required|date',
            'status_changed_date'=> 'date'

        ]);

        $employee = new Employee(array_merge($request->all(), [
            'status_changed_date'=> $request->input('last_promotion_date'),
          ]));

        // $employee = new Employee($request->all());
        $employee->added_by = Auth::id();
        $employee->save();

         return redirect()->route('uploads.create', ['employee' => $employee->id])->with('success', 'Employee created successfully. Go ahead and upload any necessary documents or skip for now');
    }

    public function show(Employee $employee) {
        //TO-DO: make everything in one call
        $transfers = Transfer::where('employee_id', $employee->id)->get();
        $promotions = Promotion::where('employee_id', $employee->id)->get();

        return view('employees.show', compact('employee', 'transfers', 'promotions'));
    }

    public function edit(Request $request, Mda $mdas, $id){
        $employeeId = $request->query('employee') ?? $id;

        $employee = DB::table('employees')
        ->join('mdas', 'employees.mda', '=', 'mdas.id')
        ->select('employees.*', 'mdas.name', 'mdas.mda_alias')
        ->where('employees.id', $employeeId)
        ->first();
        // TO-DO: look for more efficient way to do this
        $mdas = MDA::all();
        $employeeMda = MDA::findOrFail($employee->mda);
        return view('employees.edit', compact('employee', 'mdas', 'employeeMda'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'staff_id' => 'string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|in:male,female',
            'lga' => 'required|string|max:255',
            'mda' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'highest_qualification' => 'required|string|max:255',
            'first_appointment_date' => 'required|date',
            'current_rank' => 'required|string|max:255',
            'last_promotion_date' => 'required|date'
        ]);

        $employeeModel = Employee::findOrFail($id);
        $employeeModel->update($request->all());
        $employeeModel->last_update_by = Auth::id();
        $employeeModel->save();


        return redirect()->back()->with('success', 'Employee updated successfully');
    }

    public function showUpload(){
        $mdas = Mda::all();
        return view('employees.upload', compact('mdas'));
    }
    

    public function uploadEmployees(Request $request){
        $request->validate([
            'mda' => 'required',
            'file' => 'required|mimes:xlsx,xls,clv',
        ]);

        $addedBy = Auth::id();

        try {
            $file = $request->file('file');
            $filePath = $file->storeAs('uploads', 'import_file.xlsx', 'public');
            Excel::import(new EmployeeImport($request->mda, $addedBy), storage_path("app/public/{$filePath}"));
            return redirect()->back()->with('success', 'Data imported successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error importing data: ' . $e->getMessage());
        }
    }

    public function showEmployeeExport(){
        $employees = Employee::all();
        return view('employees.export', compact('employees'));
    }

    public function showRetirement(){
        $employees = Employee::all();
        return view('employees.retirement', compact('employees'));
    }
}

