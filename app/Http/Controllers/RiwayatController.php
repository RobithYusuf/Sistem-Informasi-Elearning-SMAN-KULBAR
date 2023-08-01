<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Materi;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\Session;

class RiwayatController extends Controller
{
    public function index(Request $request)
    {
        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');
        $filterOption = $request->input('mapel');

        $query = Mapel::select('mapel.nama_mapel', 'guru.nama_guru', 'materi.judul_materi', 'materi.created_at', 'kelas.nama_kelas')
            ->leftJoin('materi', function ($join) {
                $join->on('mapel.kode_mapel', '=', 'materi.kode_mapel');
            })
            ->leftJoin('guru', 'mapel.id_guru', '=', 'guru.id_guru')
            ->leftjoin('tahun_ajar', 'materi.tahun_id', '=', 'tahun_ajar.id_ajar') //kondisi tahun ajar berlangsung
            ->leftJoin('kelas', 'materi.kode_kelas', '=', 'kelas.kode_kelas')
            ->where('tahun_ajar.status', 'Berlangsung'); //kondisi tahun ajar berlangsung

        // Filter berdasarkan nama_mapel jika ada pencarian
        if ($filterOption) {
            // Lakukan filter berdasarkan nama_mapel
            $query->where('mapel.nama_mapel', $filterOption);
        }

         // Filter berdasarkan tanggal jika search tidak kosong
        if ($start_date && $end_date) {
        $query->whereBetween('materi.created_at', [$start_date, $end_date]);
        }

        $data = $query->orderBy('materi.created_at', 'desc')->get();

        // Simpan data di dalam Session dengan key 'cetak_data'
        Session::put('cetak_data', $data);

        return view('history.riwayat', compact('data', 'start_date','end_date','filterOption'));
    }

    public function cetak()
    {
        // Ambil data dari Session dengan key 'cetak_data'
        $data = Session::get('cetak_data');

        // Check if the data is empty
        if ($data->isEmpty()) {
        return redirect()->back()->with('error', 'No data available to generate PDF.');
        }

        $pdf = app('dompdf.wrapper')->loadView('history.cetak', compact('data'));

        return $pdf->download('riwayat_e-learning.pdf');
    }

    //FUNGSI UNTUK MENAMPILKAN VIEW CETAK
    // public function cetak(Request $request)
    // {
    //     // Ambil data dari Session dengan key 'cetak_data'
    //     $data = Session::get('cetak_data');

    //     return view('history.cetak', compact('data'));
    // }

}
