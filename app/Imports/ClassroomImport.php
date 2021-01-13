<?php

namespace App\Imports;

use App\Models\Classroom;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ClassroomImport implements WithMultipleSheets 
{
    public function sheets(): array
    {
        return [
            5 => new SummarySheet(),
        ];
    }
}
