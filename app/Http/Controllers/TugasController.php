<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Tugas;
use App\Models\Jawaban;
use App\Models\Tahunajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TugasController extends Controller
{
    public function tugaspelajaran($kodeKelas)
    {
        // Mendapatkan ID guru atau siswa yang sedang login
        $guruId = Auth::id();

        $data = Tugas::selectRaw("tugas.kode_tugas, kelas.nama_kelas, tugas.nama_tugas, tugas.file, 
                            tugas.deadline, tugas.created_at, tugas.deskripsi, tahun_ajar.status")
            ->join('kelas', 'kelas.kode_kelas', '=', 'tugas.kode_kelas')
            ->join('mapel', 'mapel.kode_mapel', '=', 'tugas.kode_mapel')
            ->join('guru', 'guru.id_guru', '=', 'mapel.id_guru')
            ->join('users', 'users.id', '=', 'guru.user_id')
            ->join('tahun_ajar', 'tugas.tahun_id', '=', 'tahun_ajar.id_ajar')
            ->where('kelas.kode_kelas', $kodeKelas)
            ->where('users.id', $guruId) // Menambahkan kondisi untuk user yang login
            ->where('tahun_ajar.status', 'Berlangsung') // Menambahkan kondisi untuk status "berlangsung" dari tabel Tahunajar
            ->get();

        $data->transform(function ($item) {
            $item->deadline = \Carbon\Carbon::parse($item->deadline)->format('Y-m-d H:i');
            return $item;
        });

        return view('Tugas.tugas', compact('data'));
    }


    public function tambahdatatugas()
    {
        $mapelData = DB::table('mapel')->select('kode_mapel', 'nama_mapel')
            ->orderBy('nama_mapel', 'asc')
            ->get();
        $kelasData = DB::table('kelas')->select('kode_kelas', 'nama_kelas')->get();

        return view('tugas.uploadtugas', compact('mapelData', 'kelasData'));
    }

    public function uploadtugas(Request $request)
    {
        // Mendapatkan ID tahun ajar yang sedang berlangsung
        $tahunAjar = Tahunajar::where('status', 'Berlangsung')->first();

        $data = new Tugas();
        $data->kode_tugas = null;
        $data->nama_tugas = $request->nama_tugas;
        $data->deskripsi = $request->deskripsi;
        $data->deadline = $request->deadline;

        // Menghubungkan tugas dengan tahun ajar yang sedang berlangsung
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
            $file->move(public_path('tugas'), $filename);

            // Simpan nama file ke database
            $data->file = $filename;
        }

        $data->save();

        return redirect('/berandaguru')->with('berhasil', 'Tugas Berhasil Di-Upload');
    }

    public function tampildatatugas(Request $request, $id)
    {
        $data = Tugas::with('kelas')->where('kode_tugas', $id)->select('kode_tugas', 'nama_tugas', 'deskripsi', 'file', 'deadline', 'kode_kelas')->first();
        $kelasData = Kelas::select('kode_kelas', 'nama_kelas')->get();

        return view('tugas.tampiltugas', compact('data', 'kelasData'));
    }

    public function updatedatatugas(Request $request, $id)
    {
        $data = Tugas::where('kode_tugas', $id)->first();

        // Dapatkan 'tahun_id' yang sudah ada dari tabel 'Tugas'
        $tahunId = $data->tahun_id;


        $data->nama_tugas = $request->nama_tugas;
        $data->deskripsi = $request->deskripsi;
        $data->deadline = $request->deadline;

        $dt_kelas = $request->input('nama_kelas');
        var_dump($dt_kelas);
        $kelas = Kelas::where('kode_kelas', $dt_kelas)->first();
        var_dump($kelas);

        // Periksa apakah file diunggah
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $nama_file = $file->getClientOriginalName();
            $file->move(public_path('tugas'), $nama_file);
            $data->file = $nama_file;
        }

        $data->tahun_id = $tahunId;
        $data->save();
        return redirect('/berandaguru')->with('edit', 'Tugas Berhasil Di-Update');
    }

    public function jawabansiswa($kodeTugas)
    {
        $data = Jawaban::select('jawaban.id_jawaban', 'tugas.nama_tugas', 'siswa.nama_siswa', 'kelas.nama_kelas', 'jawaban.file', 'tugas.deadline', 'jawaban.created_at')
            ->join('tugas', 'jawaban.kode_tugas', '=', 'tugas.kode_tugas')
            ->join('siswa', 'jawaban.id_siswa', '=', 'siswa.id_siswa')
            ->join('kelas', 'siswa.kode_kelas', '=', 'kelas.kode_kelas')
            ->where('tugas.kode_tugas', $kodeTugas)
            ->where(function ($query) {
                // Subquery untuk mendapatkan created_at terbaru untuk setiap siswa
                $query->whereRaw('jawaban.created_at = (
                SELECT MAX(j2.created_at)
                FROM jawaban j2
                WHERE j2.id_siswa = jawaban.id_siswa
            )');
            })
            ->get();

        return view('Tugas.jawabansiswa', compact('data'));
    }
    public function deletedatatugas(Request $request, $id)
    {
        $data = Tugas::where('kode_tugas', $id);
        $data->delete();
        return Redirect('berandaguru')->with('delete', 'Tugas Berhasil Di Hapus');
    }
}
