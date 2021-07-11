<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\Tb_Zed;
use Illuminate\Support\Facades\DB;

class LillieforsController extends Controller
{
    public function index()
    {
        $n = Data::count('nilai');
        $rata2 = number_format(Data::average('nilai'), 2);

        //function standar deviasi
        function std_deviation($my_arr)
        {
            $no_element = count($my_arr);
            $var = 0.0;
            $avg = array_sum($my_arr) / $no_element;
            foreach ($my_arr as $i) {
                $var += pow(($i - $avg), 2);
            }
            return (float)sqrt($var / $no_element);
        }

        //function desimal
        function desimal($nilai)
        {
            if ($nilai < 0) {
                $des = substr($nilai, 0, 4);
            } else {
                $des = substr($nilai, 0, 3);
            }
            return $des;
        }

        //function label
        function label($nilai)
        {
            if ($nilai < 0) {
                $str1 = substr($nilai, 4, 1);
            } else {
                $str1 = substr($nilai, 3, 1);
            }

            switch ($str1) {
                case '0':
                    $sLabel = 'nol';
                    break;
                case '1':
                    $sLabel = 'satu';
                    break;
                case '2':
                    $sLabel = 'dua';
                    break;
                case '3':
                    $sLabel = 'tiga';
                    break;
                case '4':
                    $sLabel = 'empat';
                    break;
                case '5':
                    $sLabel = 'lima';
                    break;
                case '6':
                    $sLabel = 'enam';
                    break;
                case '7':
                    $sLabel = 'tujuh';
                    break;
                case '8':
                    $sLabel = 'delapan';
                    break;
                case '9':
                    $sLabel = 'sembilan';
                    break;
                default:
                    $sLabel = 'Tidak ada field';
            }

            return $sLabel;
        }

        //ambil nilai 
        $anggota = Data::select('nilai')->get();

        //masukin nilai ke dalam array biar bsa dipakek sama functionnya
        $i = 0;
        foreach ($anggota as $a) {
            $arrayNilai[$i] = $a->nilai;
            $i++;
        }

        //standar deviasi dari seluruh nilai
        $SD = number_format(std_deviation($arrayNilai), 2);

        //ngambil data dan frekuensinya
        for ($i = 0; $i < $n; $i++) {
            $frekuensi[$i] = Data::select('nilai', DB::raw('count(*) as frekuensi'))  //ambil nilai, hitung banyak nilai taruh di tabel frekuensi
                ->groupBy('nilai')    //urutkan sesuai nilai
                ->get();
            //ngambil banyak data setelah diambil frekuensinya     
            $banyakData = count($frekuensi[$i]);
        }

        //mencari f(zi) dari tabel z
        $fkum = 0;
        $totalLillie = 0;
        for ($i = 0; $i < $banyakData; $i++) {

            //frekuensi komulatif
            $fkum += $frekuensi[0][$i]->frekuensi;

            $fkum2[$i] = $fkum;

            //mencari nilai Zi
            $Zi[$i] = number_format(($frekuensi[0][$i]->nilai - $rata2) / $SD, 2);

            //mencari F(zi)dari tabel z
            $cariDesimalZi = desimal($Zi[$i]);
            if ($cariDesimalZi < -4) {
                $cariDesimalZi = -4;
            }
            $labelZi = label($Zi[$i]);
            $zTabel = Tb_Zed::where('z', '=', $cariDesimalZi)->get();
            $fZi[$i] = $zTabel[0]->$labelZi;

            //mencari S(Zi)
            $sZi[$i] = $fkum2[$i] / $n;

            //mencari |F(Zi)-S(Zi)|
            $lilliefors[$i] = abs($fZi[$i] - $sZi[$i]);

            //total
            $totalLillie += $lilliefors[$i];
        }


        return view('Lilliefors.lilliefors', [
            'frekuensi' => $frekuensi,
            'banyakData' => $banyakData,
            'fkum2' => $fkum2,
            'Zi' => $Zi,
            'fZi' => $fZi,
            'sZi' => $sZi,
            'lilliefors' => $lilliefors,
            'totalLillie' => $totalLillie,
            'n' => $n,
        ]);
    }
}