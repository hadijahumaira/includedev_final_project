<?php

namespace App\Exports;

use App\Models\listify;
use Maatwebsite\Excel\Concerns\FromCollection;

class ListifyExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return listify::all();
    }
}
