<?php

namespace App\Imports;

use App\Models\ProdukMoment;
use Maatwebsite\Excel\Concerns\ToModel;

class ProdukMomentImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new ProdukMoment([
            'x' => $row[1],
            'y' => $row[2]
        ]);
    }
}