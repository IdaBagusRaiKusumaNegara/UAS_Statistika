<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FrekuensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maxNilai = Data::max('nilai');
        $minNilai = Data::min('nilai');
        $rata2 = number_format(Data::average('nilai'));
        $jumlah = Data::count('nilai');

        $frekuensi = Data::select('nilai', DB::raw('count(*) as frekuensi'))
            ->groupBy('nilai')
            ->get();

        $totalnilai = Data::sum('nilai');

        $totalfrekuensi = Data::count('nilai');

        return view(
            'Frekuensi.frekuensi',
            [
                'max' => $maxNilai,
                'min' => $minNilai,
                'rata2' => $rata2,
                'frekuensi' => $frekuensi,
                'totalnilai' => $totalnilai,
                'totalfrekuensi' => $totalfrekuensi,
            ],

        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}