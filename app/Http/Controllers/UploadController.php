<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UploadController extends Controller {
    public function create(Request $request){
        $employeeId = $request->query('employee');
        
        $employee = DB::table('employees')
        ->join('mdas', 'employees.mda', '=', 'mdas.id')
        ->select('employees.*', 'mdas.name', 'mdas.mda_alias')
        ->where('employees.id', $employeeId)
        ->first();
        
        $uploads = Upload::where('employee_id', $employeeId)->get();
        return view('uploads.create', compact('employee', 'uploads'));
    }


    public function store(Request $request, Employee $employee) {
        
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,doc,docx,pdf|max:2048',
            'document_type' => 'required|string',
            'description' => 'nullable|string',
            'employee_id' => 'required'
        ]);

        $file = $request->file('file');
        $fileType = $file->getClientOriginalExtension();
        $fileName = $file->storeAs('uploads', uniqid().'.'.$fileType);
        $employeeId = $request->input('employee_id') ?? $employee->id;

        $upload = [
            'employee_id' => $employeeId,
            'file_type' => $fileType,
            'file_name' => $fileName,
            'document_type' => $request->input('document_type'),
            'description' => $request->input('description') ?? ''
        ];
        Upload::create($upload);

        // $employee->uploads()->save($upload);
        // $file->storeAs('uploads', $fileName);

        return redirect()->back()->with('success', 'File uploaded successfully.');
    }
}
