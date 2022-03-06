<?php

namespace App\Imports;

use App\Models\Pines;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportPines implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        // dd($rows->toArray());
        foreach ($rows->toArray() as $key => $value) {

            Pines::firstOrCreate(
                [
                    'pin'   => $value[0],
                ]
                ,[
                'pin'   => $value[0],
                'platform_id'   => 1,
                'institution_id'=> -1,
                'book_id'       => 2,
                'caduce_id'     => 1,
                'time_id'       => 1,
                'printing_id'   => 1,
            ]);    
        }
        
    }
}
