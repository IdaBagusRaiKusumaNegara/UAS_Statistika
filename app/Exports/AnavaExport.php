<?php

namespace App\Exports;

use App\Models\UjiAnava;
use Maatwebsite\Excel\Concerns\FromCollection;

class AnavaExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return UjiAnava::all();
    }
}