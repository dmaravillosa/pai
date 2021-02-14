<?php

namespace App\Imports;

use App\Models\CoreValue;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class CoreValueImport implements WithMultipleSheets 
{
    public function sheets(): array
    {
        return [
            0 => new CoreValueSheet(),
        ];
    }
}
