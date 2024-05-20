<?php
// app/Imports/EmployeeImport.php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Employee;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EmployeeImport;
use Carbon\Carbon;

class EmployeeImport implements ToModel, WithHeadingRow
{
    private $mdaId, $addedBy;

    public function __construct($mdaId, $addedBy){
        $this->mdaId = $mdaId;
        $this->addedBy = $addedBy;

    }

    public function transformRow($date){
        // Assuming 'date_column' holds the date string
            try {
                // $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['first_appointment_date'] ?? '1880-01-01')->format('Y-m-d') ?? '1880-01-01',
            } catch (Exception $e) {
               $date = '1880-01-01';
            }

        return $date;
    }
    
    public function model(array $row)
    {
       
        return new Employee([
            'mda' => $this->mdaId,
            'staff_id' => 'NOID-'.$this->mdaId.'-'.rand(1,99999).rand(1,999),//$row['staff_id'],
            'first_name' => $row['first_name'] ?? '',
            'last_name' => $row['last_name'] ?? '',
            'file_number' => 'NOFILEID-'.$this->mdaId.'-'.rand(1,99999).rand(1,999),//$row['file_number'],
            'dob' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['dob'])->format('Y-m-d') ?? '1880-01-01',
            'gender' => $row['gender'],
            'state' => $row['state'] ?? 'NILL',
            'lga' => $row['lga'] ?? 'NILL',
            'highest_qualification' => $row['highest_qualification'] ?? 'NILL',
            'first_appointment_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['first_appointment_date'])->format('Y-m-d') ?? '1880-01-01',
            'current_rank' => $row['current_rank'] ?? 'NILL',
            'status' => $row['status'] ?? 'Active',
            'added_by' => $this->addedBy,
            'last_promotion_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['last_promotion_date'])->format('Y-m-d') ?? '1880-01-01',
            'status_changed_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['last_promotion_date'])->format('Y-m-d') ?? '1880-01-01',
        ]);
    }
}
