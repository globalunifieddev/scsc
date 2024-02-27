<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Transfer;
use App\Models\Mda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class TransferController extends Controller {
    
    public function create(Request $request){
        $employeeId = $request->query('employee');
        
        $employee = DB::table('employees')
        ->join('mdas', 'employees.mda', '=', 'mdas.id')
        ->select('employees.*', 'mdas.name', 'mdas.mda_alias')
        ->where('employees.id', $employeeId)
        ->first();

        $mdas = Mda::pluck('name', 'id', 'mda_alias');
        
        $transfers = Transfer::where('employee_id', $employeeId)->get();
        return view('transfers.create', compact('employee', 'transfers', 'mdas'));
    }

    public function store(Request $request, Employee $employee) {
        $request->validate([
            'employee_id' => 'required|numeric',
            'application_date' => 'required|date',
            'from_MDA' => 'required|string',
            'to_MDA' => 'required|string',
            'applied_by' => 'nullable|numeric',
            'present_appointment' => 'nullable|string',
            'present_gl_salary' => 'nullable|string',
            'gazette_or_notice' => 'nullable|string',
            'education_qualification' => 'nullable|string',
            'last_promotion' => 'nullable|string',
            'comment' => 'nullable|string'
        ]);

        // Create a new transfer record
        $transfer = Transfer::create([
            'employee_id' => $request->input('employee_id') ?? $employee->id,
            'application_date' => $request->input('application_date'),
            'from_MDA' => $request->input('from_MDA'),
            'to_MDA' => $request->input('to_MDA'),
            'applied_by' => $request->input('applied_by', Auth::id()),
            'present_appointment' => $request->input('present_appointment'),
            'present_gl_salary' => $request->input('present_gl_salary'),
            'gazette_or_notice' => $request->input('gazette_or_notice'),
            'education_qualification' => $request->input('education_qualification'),
            'last_promotion' => $request->input('last_promotion'),
            'self_apply' => $request->input('self_apply', false),
            'comment' => $request->input('comment')
        ]);

        return redirect()->back()->with('success', 'Transfer created successfully.');
    }

    public function showPendingTransfer(){
        $approvedTransfers = Transfer::where(['status'=>'Approve', 'self_apply'=> true])->get();
        $pendingTransfers = Transfer::where(['status'=>'Pending', 'self_apply'=> true])->get();
        $deniedTransfers = Transfer::where(['status'=>'Deny', 'self_apply'=> true])->get();

        return view('transfers.pending-transfers', compact('approvedTransfers', 'pendingTransfers', 'deniedTransfers'));
    }

    public function showManageTransfer(Request $request, $transferID = null){
        // TO-DO: fix the url param
        $transferID = $request->query('transfer-id') ?? '';
        $transfer = Transfer::findOrFail($transferID);
        
        if(!isset($transfer->employee_id)) return redirect()->back()->with('error', 'Could not find transfer');
        $employee = Employee::findOrFail($transfer->employee_id);
        
        return view('transfers.manage-transfer', compact('transfer', 'employee'));
    }

    public function updateTransferStatus(Request $request, $employeeID=null, $transferID=null, $toMDA = null){

        $request->validate([
            'comment' => 'string',
            'action' => 'required|string'
        ]);

        if($request->input('action') === 'Approve'){
            $employeeModel = Employee::findOrFail($employeeID);
            $employeeModel->last_update_by = Auth::id();
            $employeeModel->mda = $toMDA;
            $employeeModel->save();
        }

        $transferModel = Transfer::findOrFail($transferID);
        $transferModel->status = $request->input('action');
        $transferModel->comment = $request->input('comment');
        $transferModel->approved_by = Auth::id();
        $transferModel->transfer_date = now();
        $transferModel->save();

        return redirect()->route('transfers.show')
          ->with('success','Transfer status updated successfully');
    }

}