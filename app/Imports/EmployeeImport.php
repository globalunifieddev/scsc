<?php
// app/Imports/EmployeeImport.php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Employee;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EmployeeImport;

class EmployeeImport implements ToModel, WithHeadingRow
{
    private $mdaId, $addedBy;

    public function __construct($mdaId, $addedBy){
        $this->mdaId = $mdaId;
        $this->addedBy = $addedBy;

    }
    
    public function model(array $row)
    {
        return new Employee([
            'mda' => $this->mdaId,
            'staff_id' => $row['staff_id'],
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'file_number' => $row['file_number'],
            'dob' => $row['dob'],
            'gender' => $row['gender'],
            'state' => $row['state'],
            'lga' => $row['lga'],
            'highest_qualification' => $row['highest_qualification'],
            'first_appointment_date' => $row['first_appointment_date'],
            'current_rank' => $row['current_rank'],
            'status' => $row['status'],
            'added_by' => $this->addedBy,
            'last_promotion_date' => $row['last_promotion_date'],
            'status_changed_date' => $row['last_promotion_date']
        ]);
    }
}
