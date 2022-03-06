<?php

namespace App\Exports;

use App\Models\Pines;
use Maatwebsite\Excel\Concerns\FromCollection;

class PinesModelExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pines::all();
    }
}
