<?php

namespace App\Exports;

use App\Models\UjiT;
use Maatwebsite\Excel\Concerns\FromCollection;

class UjiTexport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return UjiT::all();
    }
}