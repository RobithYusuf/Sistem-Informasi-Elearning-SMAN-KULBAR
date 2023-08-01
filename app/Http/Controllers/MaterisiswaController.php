<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\Tugas;
use App\Models\Materi;
use App\Models\Jawaban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaterisiswaController extends Controller
{
    public function index()
    {
        // Retrieve the authenticated student's data
        $siswa = Siswa::where('user_id', Auth::id())->first();

        // Check if the student is logged in and has a class
        if ($siswa && $siswa->kelas) {
            $kodeKelas = $siswa->kelas->kode_kelas;

            if ($kodeKelas == 1 || $kodeKelas == 2) {
                $mapelFilter = [
                    'Pendidikan Agama Islam',
                    'Kewarganegaraan',
                    'Bahasa Indonesia',
                    'Bahasa Inggris',
                    'Matematika',
                    'Fisika',
                    'Kimia',
                    'Biologi',
                    'Sejarah Indonesia',
                    'Penjaskes',
                    'Seni Budaya',
                    'Bimbingan Konseling'
                ];
            } elseif ($kodeKelas == 3) {
                $mapelFilter = [
                    'Pendidikan Agama Islam',
                    'Kewarganegaraan',
                    'Bahasa Indonesia',
                    'Bahasa Inggris',
                    'Matematika',
                    'Geografi',
                    'Sosiologi',
                    'Sejarah',
                    'Sejarah Indonesia',
                    'Penjaskes',
                    'Seni Budaya',
                    'PKWU',
                    'Bimbingan Konseling'
                ];
            } else {
                $mapelFilter = []; // If no matching filter for the kode_kelas is found, display all subjects
            }

            $data = Mapel::selectRaw("mapel.kode_mapel, mapel.nama_mapel, guru.nama_guru")
                ->join('guru', 'guru.id_guru', '=', 'mapel.id_guru');

            if (!empty($mapelFilter)) {
                $data->whereIn('nama_mapel', $mapelFilter);
                $data->orderByRaw("FIELD(nama_mapel, '" . implode("', '", $mapelFilter) . "')");
            } else {
                $data->orderBy('nama_mapel', 'asc');
            }
            $data = $data->get();

            return view('materisiswa.index', compact('data'));
        }

        // If the student is not logged in or does not have a class, take appropriate action (e.g., display an error message)
        // ...
    }


    public function materi($kodemapel)
    {
        // Mendapatkan ID siswa yang sedang login
        $siswaId = Auth::id();

        $data = Materi::selectRaw("materi.kode_materi, materi.judul_materi, materi.deskripsi, materi.file, materi.created_at")
            ->join('kelas', 'kelas.kode_kelas', '=', 'materi.kode_kelas')
            ->join('siswa', 'siswa.kode_kelas', '=', 'kelas.kode_kelas')
            ->join('users', 'users.id', '=', 'siswa.user_id')
            ->join('tahun_ajar', 'materi.tahun_id', '=', 'tahun_ajar.id_ajar')
            ->where('users.id', $siswaId)
            ->where('tahun_ajar.status', 'Berlangsung')
            ->where('materi.kode_mapel', $kodemapel) // Menambahkan kondisi untuk memfilter berdasarkan kode_mapel
            ->get();

        return view('materisiswa.materi', compact('data'));
    }

    public function tugas($kodemapel)
    {
        // Mendapatkan ID siswa yang sedang login
        $siswaId = Auth::id();

        $data = Tugas::selectRaw("tugas.kode_tugas, tugas.nama_tugas, tugas.deadline, tugas.deskripsi, tugas.file")
            ->join('kelas', 'kelas.kode_kelas', '=', 'tugas.kode_kelas')
            ->join('siswa', 'siswa.kode_kelas', '=', 'kelas.kode_kelas')
            ->join('users', 'users.id', '=', 'siswa.user_id')
            ->join('tahun_ajar', 'tugas.tahun_id', '=', 'tahun_ajar.id_ajar')
            ->where('users.id', $siswaId)
            ->where('tahun_ajar.status', 'Berlangsung')
            ->where('tugas.kode_mapel', $kodemapel) // Menambahkan kondisi untuk memfilter berdasarkan kode_mapel
            ->get();

        $data->transform(function ($item) {
            $item->deadline = \Carbon\Carbon::parse($item->deadline)->format('Y-m-d H:i');
            return $item;
        });

        return view('materisiswa.tugas', compact('data'));
    }

    public function jawaban(Request $request, $id)
    {
        $tugas = Tugas::where('kode_tugas', $id)->first();
        return view('materisiswa.jawaban', ['tugas' => $tugas]);
    }

    public function uploadjawaban(Request $request)
    {
        $tugas = Tugas::where('kode_tugas', $request->input('kode_tugas'))->first();
        $siswa = Siswa::where('user_id', Auth::id())->first();
        $siswaId = $siswa->id_siswa;

        // Validasi jika tugas tidak ditemukan atau sudah melewati batas waktu

        // Mendapatkan ID siswa yang sedang login
        // $siswaId = Auth::id();

        // Simpan data jawaban ke dalam tabel Jawaban
        $data = new Jawaban();
        $data->id_siswa = $siswaId;
        $data->kode_tugas = $tugas->kode_tugas;

        // Verifikasi file
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $originalFilename = $file->getClientOriginalName();

            // Menentukan ekstensi file yang diizinkan
            $allowedExtensions = ['doc', 'docx', 'pdf', 'ppt', 'pptx'];

            // Memvalidasi ekstensi file
            $extension = $file->getClientOriginalExtension();
            if (!in_array($extension, $allowedExtensions)) {
                return redirect('/pelajaran')->with('error', 'Jenis file tidak diizinkan.');
            }

            // Menyimpan file dengan nama asli
            $filename = $originalFilename;
            $file->move(public_path('jawaban'), $filename);

            // Simpan nama file ke database
            $data->file = $filename;
        }

        $data->save();
        return redirect('/berandasiswa')->with('success', 'Jawaban berhasil diupload');
    }

    public function editjawaban()
    {
        return view('materisiswa.tampiljawaban');
    }
}
