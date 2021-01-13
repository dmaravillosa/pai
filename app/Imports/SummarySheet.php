<?php
namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class SummarySheet implements WithCalculatedFormulas
{
    public function collection(Collection $rows)
    {
        //
    }
}



?>