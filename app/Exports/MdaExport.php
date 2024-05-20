<?php

namespace App\Exports;

use App\Models\Mda;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class MdaExport implements FromCollection, WithHeadings, WithStyles
{
    
    /**
    * @return Collection
    */

    public function collection(): Collection
    {
        return collect(Mda::all()->sortBy('name'));
    }

    public function headings(): array
    {
        return ["id", "name", "address", "phone", "email", "mda_category", "mda_alias", "mda_level", "added_by", "created_at", "updated_at"];
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
