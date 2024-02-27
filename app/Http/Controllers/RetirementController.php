<?php
namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Mda;



class RetirementController extends Controller {
    public function index($mdaID = 0){
        $currentDate = now();
        $retirementAge = 60;
        // TO:DO: Just return count for them
        if($mdaID === 0){
            $retiredEmployees =  Employee::where('status', 'Retired')->get();
            $retireesByAppoitment = Employee::whereRaw("DATEDIFF('$currentDate', first_appointment_date) / 365 >= 30")
                ->where('status', 'Active')
                ->orWhere('status', 'Retired')->get();
            $retireesByAge = Employee::whereRaw("DATEDIFF('$currentDate', dob) / 365 >= 60")
                ->where('status', 'Active')
                ->orWhere('status', 'Retired')->get();
            $overdueRetirees =  (count($retireesByAge) + count($retireesByAppoitment)) - count($retiredEmployees);
        }else{
            $retiredEmployees =  Employee::where(['status'=>'Retired', 'mda'=>$mdaID])->get();
            $retireesByAppoitment = Employee::whereRaw("DATEDIFF('$currentDate', first_appointment_date) / 365 >= 30")
              ->where('status', 'Active')
              ->where('mda', $mdaID)
              ->orWhere('status', 'Retired')->get();
            $retireesByAge = Employee::whereRaw("DATEDIFF('$currentDate', dob) / 365 >= 60")
              ->where('status', 'Active')
              ->where('mda', $mdaID)
              ->orWhere('status', 'Retired')->get();
            $overdueRetirees =  (count($retireesByAge) + count($retireesByAppoitment)) - count($retiredEmployees);
        }

        $selectedMda = ($mdaID === 0) ? [] : Mda::findOrFail($mdaID);

        $mdas = Mda::pluck('name', 'id', 'mda_alias');
        return view('employees.retirement.index', compact('selectedMda','mdas','retiredEmployees', 'retireesByAppoitment', 'retireesByAge', 'overdueRetirees'));
    }


    public function viewCategory($mda = null, $category = null){
        //retired, appointment, dob, overdue
        //TO-DO: change to fetch using param url
        $category = request()->query('category');
        $mdaId = request()->query('mda') ?? '';

        if($category === 'retired') return $this->showRetired($mdaId);
        if($category === 'appointment') return $this->showByAppointment($mdaId);
        if($category === 'dob') return $this->showByDOB($mdaId);
        if($category === 'overdue') return $this->showOverdue($mdaId);
    }


    public function showRetired($mda){
        $retirees = ($mda === '') ? 
          Employee::where('status', 'Retired')->get() : 
          Employee::where(['status' => 'Retired', 'mda'=>$mda])->get();
        $selectedMda = ($mda === '') ?  'ALL MDA' : Mda::findOrFail($mda);
        $subTitle = 'Retired';

        return view('employees.retirement.show', compact('retirees', 'selectedMda', 'subTitle'));
    }

    public function showByAppointment($mda){
        $currentDate = now();
        $retirementAge = 60;

        $retirees = ($mda === '') ? 
          Employee::whereRaw("DATEDIFF('$currentDate', first_appointment_date) / 365 >= 30")
            ->where('status', 'Active')
            ->orWhere('status', 'Retired')->get() :
          Employee::whereRaw("DATEDIFF('$currentDate', first_appointment_date) / 365 >= 30")
            ->where('status', 'Active')
            ->where('mda', $mda)
            ->orWhere('status', 'Retired')->get();
        
        $selectedMda = ($mda === '') ?  'ALL MDA' : Mda::findOrFail($mda);
        $subTitle = 'Retirees by years of service';

        return view('employees.retirement.show', compact('retirees', 'selectedMda', 'subTitle'));
    }

    public function showByDOB($mda){
        $currentDate = now();

        $retirees = ($mda === '') ? 
          Employee::whereRaw("DATEDIFF('$currentDate', dob) / 365 >= 60")
            ->where('status', 'Active')
            ->orWhere('status', 'Retired')->get() :
          Employee::whereRaw("DATEDIFF('$currentDate', dob) / 365 >= 60")
            ->where('status', 'Active')
            ->where('mda', $mda)
            ->orWhere('status', 'Retired')->get();
        
        $selectedMda = ($mda === '') ?  'ALL MDA' : Mda::findOrFail($mda);
        $subTitle = 'Retirees by date of birth';

        return view('employees.retirement.show', compact('retirees', 'selectedMda', 'subTitle'));
    }

    public function showOverdue($mda){
        //those due to retire but status not showing 'Retired'
        //TO-DO: The blade file might likely show a combination of 
        $currentDate = now();

        if ($mda === '') {
            $queryByAppointment = Employee::whereRaw("DATEDIFF('$currentDate', first_appointment_date) / 365 >= 30")
              ->where('status', 'Active');
            $queryByDOB = Employee::whereRaw("DATEDIFF('$currentDate', dob) / 365 >= 60")
              ->where('status', 'Active');
        }else{
            $queryByAppointment = Employee::whereRaw("DATEDIFF('$currentDate', first_appointment_date) / 365 >= 30")
              ->where('mda', $mda)
              ->where('status', 'Active');
            $queryByDOB = Employee::whereRaw("DATEDIFF('$currentDate', dob) / 365 >= 60")
              ->where('mda', $mda)
              ->where('status', 'Active');
        }

        $combinedQuery = $queryByAppointment->union($queryByDOB);
        $retirees = $combinedQuery->distinct()->get();

        $selectedMda = ($mda === '') ?  'ALL MDA' : Mda::findOrFail($mda);
        $subTitle = 'Retirees without status of RETIRED';
        return view('employees.retirement.show', compact('retirees', 'selectedMda', 'subTitle'));
    }

}