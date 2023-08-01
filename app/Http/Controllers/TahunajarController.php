<?php

namespace App\Http\Controllers;

use App\Models\Tahunajar;
use Illuminate\Http\Request;

class TahunajarController extends Controller
{
    public function index()
    {
        $data = Tahunajar::orderBy('tahun_ajaran', 'asc')->get();
        return view('tahunajar.tahunajar', compact('data'));
    }


    public function tampil()
    {
        return view('tahunajar.tambah');
    }

    public function tambahdata(Request $request)
    {
        $data = new Tahunajar();
        $data->id_ajar = null;
        $data->tahun_ajaran = $request->tahun_ajaran;
        $data->semester = $request->semester;
        $data->status = $request->status;
        $data->save();

        return Redirect('/tahunajar')->with('success', 'Data Berhasil Ditambahkan');
    }


    public function tampildataajar(Request $request, $id)
    {
        $data = Tahunajar::where('id_ajar', $id)->first();
        return view('tahunajar.tampil', compact('data'));
    }

    public function updatedataajar(Request $request, $id)
    {
        $data = Tahunajar::where('id_ajar', $id)->first();
        if ($data) {
            $data->tahun_ajaran = $request->tahun_ajaran;
            $data->semester = $request->semester;
            $data->status = $request->status;
            $data->save();
        }
        return Redirect('/tahunajar')->with('update', 'Data Berhasil DiUpdate');
    }


    public function deletedataajar(Request $request, $id)
    {
        $data = Tahunajar::where('id_ajar', $id);
        $data->delete();
        return Redirect('/tahunajar')->with('delete', 'Data Berhasil DiHapus');
    }
}
