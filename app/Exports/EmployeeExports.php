<?php

namespace App\Exports;

use App\Models\Employee;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class EmployeeExports implements FromCollection, WithHeadings, WithStyles
{
    
    /**
    * @return Collection
    */

    public function collection(): Collection
    {
        return collect(Employee::all());

        // return Employee::all()
        //     ->get();
    }

    public function headings(): array
    {
        return ["id", "staff_id", "first_name", "last_name", "file_number", "dob", "gender", "state", "lga", "mda", "added_by", "last_update_by", "highest_qualification", "first_appointment_date", "current_rank", "status", "status_changed_date", "last_promotion_date", "created_at", "updated_at"];
    }

    public function styles(Worksheet $sheet): array
    {
        return [
          1 => [
              'font' => ['bold' => true],
              'fill' => ['fillType' => Fill::FILL_SOLID]
          ]
        ];
    }
}
