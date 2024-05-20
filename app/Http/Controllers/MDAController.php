<?php
namespace App\Http\Controllers;

use App\Models\Mda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MdaExport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;



class MDAController extends Controller {
    public function index() {
        $mdas = Mda::all();
        return view('mdas.index', compact('mdas'));
    }

    public function create() {
        return view('mdas.create');
    }

    public function store(Request $request) {
        //TO-DO: make each mda unique (consider alias)
        $request->validate([
            'name' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'mda_alias' => 'required|string',
            'mda_level' => 'required|string',
        ]);

        MDA::create(array_merge($request->all(), ['added_by' => Auth::id()]));

        return redirect()->route('mda.index')->with('success', 'MDA created successfully');
    }

    public function show(Mda $mda) {
        return view('mdas.show', compact('mda'));
    }

    public function edit(Mda $mda) {
        return view('mdas.show', compact('mda'));
    }

    public function update(Request $request, Mda $mda) {
        // Validate the form data
        $request->validate([
            'name' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'mda_alias' => 'required|string',
            'mda_level' => 'required|string',
        ]);

        
        $mda->update(array_merge($request->all(), ['added_by' => Auth::id()]));

        return redirect()->route('mda.index')->with('success', 'MDA updated successfully');
    }

    public function destroy(Mda $mda) {
        $mda->delete();
        return redirect()->route('mda.index')->with('success', 'MDA deleted successfully');
    }

    public function downloadMda(): BinaryFileResponse {
        return Excel::download(new MdaExport, 'MDAs.xlsx');
    }



}
