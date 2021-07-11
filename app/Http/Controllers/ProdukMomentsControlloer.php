<?php

namespace App\Http\Controllers;

use App\Exports\ProdukMomentExport;
use App\Imports\ProdukMomentImport;
use App\Models\ProdukMoment;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProdukMomentsControlloer extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ProdukMoment::all();
        $jumlahData = ProdukMoment::count();
        $jumlahX = ProdukMoment::count('x');
        $jumlahY = ProdukMoment::count('y');

        $rata2X = ProdukMoment::average('x');
        $rata2Y = ProdukMoment::average('y');

        $sumX = ProdukMoment::sum('x');
        $sumY = ProdukMoment::sum('y');

        $sumXKuadrat = 0;
        $sumYKuadrat = 0;
        $sumXY = 0;
        for ($i = 0; $i < $jumlahX; $i++) {

            $xKecil[$i] = $data[$i]->x - $rata2X;
            $yKecil[$i] = $data[$i]->y - $rata2Y;
            $xKuadrat[$i] = $xKecil[$i] * $xKecil[$i];
            $sumXKuadrat += $xKuadrat[$i];

            $yKuadrat[$i] = $yKecil[$i] * $yKecil[$i];
            $sumYKuadrat += $yKuadrat[$i];

            $xKaliY[$i] = $xKecil[$i] * $yKecil[$i];
            $sumXY += $xKaliY[$i];
        }

        $korelasimoment = $sumXY / sqrt($sumXKuadrat * $sumYKuadrat);

        return view('ProdukMoment.produkmoment', [
            'data' => $data,
            'jumlahData' => $jumlahData,
            'xKuadrat' => $xKuadrat,
            'yKuadrat' => $yKuadrat,
            'xKecil' => $xKecil,
            'yKecil' => $yKecil,
            'xKaliY' => $xKaliY,
            'sumX' => $sumX,
            'sumY' => $sumY,
            'sumXKuadrat' => $sumXKuadrat,
            'sumYKuadrat' => $sumYKuadrat,
            'sumXY' => $sumXY,
            'korelasimoment' => $korelasimoment,
            'rata2X' => $rata2X,
            'rata2Y' => $rata2Y,
        ]);
    }

    public function dataexport()
    {
        return Excel::download(new ProdukMomentExport, 'produkmoment.xlsx');
    }

    public function dataimportexcel(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('ImportProdukMoment', $namaFile);

        Excel::import(new ProdukMomentImport, public_path('/ImportProdukMoment/' . $namaFile));
        return redirect('produkmoment');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ProdukMoment.create-produkmoment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'x' => 'required',
            'y' => 'required',
        ]);

        ProdukMoment::create([
            'x' => $request->x,
            'y' => $request->y,
        ]);
        return redirect('produkmoment');
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
        $data = ProdukMoment::findorfail($id);
        return view('ProdukMoment.edit-produkmoment', compact('data'));
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
        $validated = $request->validate([
            'x' => 'required',
            'y' => 'required',
        ]);

        $data = ProdukMoment::findorfail($id);
        $data->update($request->all());
        return redirect('produkmoment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ProdukMoment::findorfail($id);
        $data->delete();
        return back();
    }
}