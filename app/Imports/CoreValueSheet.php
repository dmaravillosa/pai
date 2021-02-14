<?php
namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class CoreValueSheet implements WithCalculatedFormulas
{
    public function collection(Collection $rows)
    {
        //
    }
}



?>