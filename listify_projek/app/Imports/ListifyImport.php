<?php

namespace App\Imports;

use App\Models\Listify;
use Maatwebsite\Excel\Concerns\ToModel;

class ListifyImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Listify([
            'nama' => $row[1],
            'status' => $row[2],
        ]);
    }
}