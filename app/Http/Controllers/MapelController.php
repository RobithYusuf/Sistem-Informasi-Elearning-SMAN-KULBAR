<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapelController extends Controller
{
    public function index()
    {
        $data =  Mapel::selectRaw("mapel.kode_mapel, mapel.nama_mapel, guru.nama_guru")
        ->join ('guru','guru.id_guru','=','mapel.id_guru')
        ->orderBy('nama_mapel', 'asc')
        -> get();
        return view('mapel.datamapel', compact('data'));
    }

    public function tambahdatamapel(){
        $data = DB::table('guru')
        ->select('id_guru', 'nama_guru')
        ->whereNotIn('id_guru', function ($query) {
            $query->select('id_guru')->from('mapel');
        })
        ->get();
    
        return view('mapel.tambahmapel', ['data' => $data]);
    }
    
    public function insertdatamapel(Request $request)
    {
        // var_dump($request);
        $data = new Mapel();
       // $data->kode_mapel = $request->kode_mapel;
        $data->kode_mapel = null;
        $data->nama_mapel = $request->nama_mapel;

    $dt_guru = $request->input('nama_guru');
	var_dump($dt_guru);
    $guru = Guru::where('id_guru', $dt_guru)->first();
	var_dump($guru);

    if ($guru) {
    $data->id_guru = $guru->id_guru;
    $data->save();

    return redirect('/mapel')->with('success', 'Data mapel berhasil disimpan.');
    } else {
    return redirect()->back()->with('error', 'Nama guru tidak valid.');
    }

    } //end func. insertdatamapel

    public function tampildatamapel(Request $request, $id)
    {
        $data = Mapel::with('guru')->where('kode_mapel', $id)->first();
        $guruData = Guru::select('id_guru', 'nama_guru')->get();
        return view('mapel.tampilmapel', compact('data', 'guruData'));
    }

    public function updatedatamapel(Request $request, $id)
    {
        $data = Mapel::where('kode_mapel', $id)->first();
        $data->nama_mapel= $request->nama_mapel;

        $dt_guru = $request->input('nama_guru');
        var_dump($dt_guru);
        $guru = Guru::where('id_guru', $dt_guru)->first();
        var_dump($guru);

        if ($guru) {
            $data->id_guru = $guru->id_guru;
            $data->save();

            return redirect('/mapel')->with('update', 'Data mata pelajaran berhasil DiUpdate');
        } else {
            return redirect()->back()->with('error', 'Nama guru tidak valid.');
        }
    }

    public function deletedatamapel(Request $request, $id)
    {
        $data = Mapel::where('kode_mapel',$id);
        $data->delete();
        return Redirect('/mapel')->with('delete', 'Data Berhasil DiHapus');
    }
}
