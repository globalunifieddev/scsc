<?php
namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Mda;



class ConfermentController extends Controller {
  public function index($mdaID = 0){
    $currentDate = now();
    $retirementAge = 60;
    // TO:DO: Just return count for them
    if($mdaID === 0){
        $employeesOnProbation =  Employee::where('status', 'Probation')->get();
        $dueForConferment = Employee::whereRaw("DATEDIFF('$currentDate', first_appointment_date) / 365 >= 2")
            ->where('status', 'Probation')->get();
    }else{
        $employeesOnProbation =  Employee::where(['status'=>'Probation', 'mda'=>$mdaID])->get();
        $dueForConferment = Employee::whereRaw("DATEDIFF('$currentDate', first_appointment_date) / 365 >= 2")
          ->where('status', 'Probation')
          ->where('mda', $mdaID)->get();
    }

    $selectedMda = ($mdaID === 0) ? [] : Mda::findOrFail($mdaID);

    $mdas = Mda::pluck('name', 'id', 'mda_alias');
    return view('employees.conferment.index', compact('selectedMda','mdas','employeesOnProbation', 'dueForConferment'));
}


public function viewCategory($mda = null, $category = null){
    //retired, appointment, dob, overdue
    //TO-DO: change to fetch using param url
    $category = request()->query('category');
    $mdaId = request()->query('mda') ?? '';

    if($category === 'probation') return $this->showOnProbation($mdaId);
    if($category === 'overdue') return $this->showOverdue($mdaId);
}


public function showOnProbation($mda){
    $onProbation = ($mda === '') ? 
      Employee::where('status', 'Probation')->get() : 
      Employee::where(['status' => 'Probation', 'mda'=>$mda])->get();
    $selectedMda = ($mda === '') ?  'ALL MDA' : Mda::findOrFail($mda);
    $subTitle = 'On probabtion';

    return view('employees.conferment.show', compact('onProbation', 'selectedMda', 'subTitle'));
}

public function showOverdue($mda){
    //those due to retire but status not showing 'Retired'
    //TO-DO: The blade file might likely show a combination of 
    $currentDate = now();

    if ($mda === '') {
        $queryByAppointment = Employee::whereRaw("DATEDIFF('$currentDate', first_appointment_date) / 365 >= 2")
          ->where('status', 'Probation');
        $queryByDOB = Employee::whereRaw("DATEDIFF('$currentDate', dob) / 365 >= 2")
          ->where('status', 'Probation');
    }else{
        $queryByAppointment = Employee::whereRaw("DATEDIFF('$currentDate', first_appointment_date) / 365 >= 2")
          ->where('mda', $mda)
          ->where('status', 'Probation');
        $queryByDOB = Employee::whereRaw("DATEDIFF('$currentDate', dob) / 365 >= 2")
          ->where('mda', $mda)
          ->where('status', 'Probation');
    }

    $combinedQuery = $queryByAppointment->union($queryByDOB);
    $onProbation = $combinedQuery->distinct()->get();

    $selectedMda = ($mda === '') ?  'ALL MDA' : Mda::findOrFail($mda);
    $subTitle = 'Employees without status of Active';
    return view('employees.conferment.show', compact('onProbation', 'selectedMda', 'subTitle'));
}

}