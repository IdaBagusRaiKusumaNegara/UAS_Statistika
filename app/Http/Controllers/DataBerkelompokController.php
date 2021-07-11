<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DataBerkelompokController extends Controller
{
    public function index()
    {
        $maxNilai = Data::max('nilai');
        $minNilai = Data::min('nilai');
        $n = Data::count('nilai');

        $rentangan = $maxNilai - $minNilai;

        $kelas = ceil(1 + 3.3 * log10($n));

        $interval = ceil($rentangan / $kelas);

        $batasBawah = $minNilai;
        $batasAtas = 0;

        for ($i = 0; $i < $kelas; $i++) {
            $batasAtas = $batasBawah + $interval - 1;

            $frekuensi[$i] = Data::select(DB::raw('count(*) as frekuensi, nilai'))
                ->where([
                    ['nilai', '>=', $batasBawah],
                    ['nilai', '<=', $batasAtas],
                ])
                ->groupBy()
                ->count();
            $data[$i] = $batasBawah . " - " . $batasAtas;
            $batasBawah = $batasAtas + 1;
        }


        return view('DataBerkelompok.data-berkelompok', [
            'data' => $data,
            'frekuensi' => $frekuensi,
            'batasAtas' => $batasAtas,
            'batasBawah' => $batasBawah,
            'kelas' => $kelas,
            'interval' => $interval,
            'rentangan' => $rentangan,
        ]);
    }
}