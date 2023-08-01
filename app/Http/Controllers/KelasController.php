<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $data =  Kelas::all();
        return view('kelas.datakelas', compact('data'));
    }

    public function lihatdatakelas($kodeKelas)
    {
        $data =  Siswa::selectRaw("siswa.id_siswa, kelas.nama_kelas, siswa.nama_siswa, siswa.alamat")
                ->join ('kelas','kelas.kode_kelas','=','siswa.kode_kelas')
                ->where('kelas.kode_kelas', $kodeKelas)
                -> get();
        return view('kelas.lihatkelas', compact('data'));
    }

    public function tambahdatakelas(){
        return view('kelas.tambahkelas');
    }

    public function insertdatakelas(Request $request)
    {
        $data = new Kelas();
            $data->kode_kelas = null;
            $data->nama_kelas = $request->nama_kelas;
        $data->save();

        return Redirect('/kelas')->with('success', 'Data Berhasil DiTambahkan');
    }

    public function tampildatakelas(Request $request, $id)
    {
        $data = Kelas::where('kode_kelas',$id)->first();
        return view('kelas.tampilkelas', compact('data'));  
    }

    public function updatedatakelas(Request $request, $id)
    {
        $data = Kelas::where('kode_kelas',$id)->first();
            if ($data) {
            $data->nama_kelas = $request->nama_kelas;
        $data->save(); 
            }
        return Redirect('/kelas')->with('update', 'Data Berhasil DiUpdate');
    }

    public function deletedatakelas(Request $request, $id)
    {
        $data = Kelas::where('kode_kelas',$id);
        $data->delete();
        return Redirect('/kelas')->with('delete', 'Data Berhasil DiHapus');
    }
}
