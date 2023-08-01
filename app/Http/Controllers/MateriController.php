<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Materi;
use App\Models\Tahunajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MateriController extends Controller
{
    //materi konten guru
    public function index() //menampilkan data kelas
    {
        $data =  Kelas::all();
        return view('materi.index', compact('data'));
    }

    public function materipelajaran($kodeKelas)
    {
        // Mendapatkan ID guru yang sedang login
        $guruId = Auth::id();

        // Mendapatkan data materi berdasarkan guru, kelas, dan mapel yang dipilih dengan status "berlangsung"
        $data = Materi::selectRaw("materi.kode_materi, kelas.nama_kelas, mapel.nama_mapel, 
                    materi.judul_materi, materi.file, materi.created_at, materi.deskripsi, tahun_ajar.status")
            ->join('kelas', 'kelas.kode_kelas', '=', 'materi.kode_kelas')
            ->join('mapel', 'mapel.kode_mapel', '=', 'materi.kode_mapel')
            ->join('guru', 'guru.id_guru', '=', 'mapel.id_guru')
            ->join('users', 'users.id', '=', 'guru.user_id')
            ->join('tahun_ajar', 'materi.tahun_id', '=', 'tahun_ajar.id_ajar')
            ->where('kelas.kode_kelas', $kodeKelas)
            ->where('users.id', $guruId) // Menambahkan kondisi untuk user yang login
            ->where('tahun_ajar.status', 'Berlangsung') // Menambahkan kondisi untuk status "berlangsung" dari tabel Tahunajar
            ->get();

        return view('materi.materi', compact('data'));
    }


    public function tambahdatamateri()
    {
        $mapelData = DB::table('mapel')->select('kode_mapel', 'nama_mapel')
            ->orderBy('nama_mapel', 'asc')
            ->get();
        $kelasData = DB::table('kelas')->select('kode_kelas', 'nama_kelas')->get();

        return view('materi.uploadmateri', compact('mapelData', 'kelasData'));
    }

    public function uploadmateri(Request $request)
    {

        // Mendapatkan ID tahun ajar yang sedang berlangsung
        $tahunAjar = Tahunajar::where('status', 'Berlangsung')->first();

        // Membuat materi baru dan menyimpan relasi dengan tahun ajar
        $data = new Materi();
        $data->kode_materi = null;
        $data->judul_materi = $request->judul_materi;
        $data->deskripsi = $request->deskripsi;

        // Menghubungkan materi dengan tahun ajar yang sedang berlangsung
        if ($tahunAjar) {
            $data->tahunajar()->associate($tahunAjar);
        }


        $dt_mapel = $request->input('nama_mapel');
        $mapel = Mapel::where('kode_mapel', $dt_mapel)->first();

        if ($mapel) {
            $data->mapel()->associate($mapel);
        }

        $dt_kelas = $request->input('nama_kelas');
        $kelas = Kelas::where('kode_kelas', $dt_kelas)->first();

        if ($kelas) {
            $data->kelas()->associate($kelas);
        }

        // Verifikasi file
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $originalFilename = $file->getClientOriginalName();

            // Menentukan ekstensi file yang diizinkan
            $allowedExtensions = ['doc', 'docx', 'pdf', 'ppt', 'pptx'];

            // Memvalidasi ekstensi file
            $extension = $file->getClientOriginalExtension();
            if (!in_array($extension, $allowedExtensions)) {
                return redirect('/berandaguru')->with('error', 'Jenis file tidak diizinkan.');
            }
            // Menyimpan file dengan nama asli
            $filename = $originalFilename;
            $file->move(public_path('materi'), $filename);

            // Simpan nama file ke database
            $data->file = $filename;
        }

        $data->save();

        return redirect('/berandaguru')->with('success', 'Materi Berhasil Di Upload');
    }


    public function tampildatamateri(Request $request, $id)
    {
        $data = Materi::with('kelas')->where('kode_materi', $id)->select('kode_materi', 'judul_materi', 'deskripsi', 'file', 'kode_kelas')->first();
        $kelasData = Kelas::select('kode_kelas', 'nama_kelas')->get();

        return view('materi.tampilmateri', compact('data', 'kelasData'));
    }

    public function updatedatamateri(Request $request, $id)
    {
        $data = Materi::where('kode_materi', $id)->first();

        // Dapatkan 'tahun_id' yang sudah ada dari tabel 'Materi'
        $tahunId = $data->tahun_id;

        $data->judul_materi = $request->judul_materi;
        $data->deskripsi = $request->deskripsi;

        $dt_kelas = $request->input('nama_kelas');
        var_dump($dt_kelas);
        $kelas = Kelas::where('kode_kelas', $dt_kelas)->first();
        var_dump($kelas);

        // Periksa apakah file diunggah
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $nama_file = $file->getClientOriginalName();
            $file->move(public_path('materi'), $nama_file);
            $data->file = $nama_file;
        }

        if ($kelas) {
            $data->kode_kelas = $kelas->kode_kelas;

            $data->tahun_id = $tahunId;
            $data->save();

            return redirect('/berandaguru')->with('update', 'Materi Berhasil Di Update');
        } else {
            return redirect()->back()->with('error', 'Nama Kelas tidak valid.');
        }
    }

    public function deletedatamateri(Request $request, $id)
    {
        $data = Materi::where('kode_materi', $id);
        $data->delete();
        return Redirect('berandaguru')->with('delete', 'Materi Berhasil Di Hapus');
    }
}
