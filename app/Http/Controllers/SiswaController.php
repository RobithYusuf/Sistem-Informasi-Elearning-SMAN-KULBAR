<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $filterOption = $request->input('kelas');
        $search = $request->input('search');

        $query = Siswa::join('kelas', 'siswa.kode_kelas', '=', 'kelas.kode_kelas')
            ->orderBy('siswa.nama_siswa', 'asc');

        if ($filterOption) {
            // Lakukan sesuatu dengan nilai filterOption, misalnya:
            $query->where('kelas.nama_kelas', $filterOption);
        } 
        
        //query untuk mencari
        if ($search) {
            $query->where('nama_siswa', 'LIKE', '%' . $search . '%');
        }
        $data = $query->get();

        foreach ($data as $siswa) {
            $siswa->tgl_lahir = Carbon::parse($siswa->tgl_lahir);
        }

        return view('siswa.datasiswa', compact('data', 'filterOption', 'search'));
    }


    public function profilsiswa()
    {

        // Mendapatkan ID pengguna yang sedang login
        $userId = Auth::id();
        $data =  Siswa::selectRaw("siswa.id_siswa, users.name, kelas.nama_kelas, siswa.nama_siswa, siswa.alamat, siswa.tgl_lahir, users.email, siswa.no_telp")
            ->join('users', 'users.id', '=', 'siswa.user_id')
            ->join('kelas', 'kelas.kode_kelas', '=', 'siswa.kode_kelas')
            ->where('users.id', $userId) // Filter berdasarkan ID pengguna yang sedang login
            ->get();
        return view('profil.datasiswa', compact('data'));
    }

    public function edit(Request $request)
    {
        $userId = Auth::id();
        $data = Siswa::where('user_id', $userId)->with('users')->first();

        $email = $data->users->email ?? '';

        if (!$data) {
            abort(404); // Tampilkan halaman 404 jika data tidak ditemukan
        }

        return view('profil.editsiswa', compact('data', 'email'));
    }

    public function update(Request $request)
    {
        $userId = Auth::id();
        $data = Siswa::where('user_id', $userId)->with('users')->first();

        if (!$data) {
            abort(404); // Tampilkan halaman 404 jika data tidak ditemukan
        }

        $data->nama_siswa = $request->input('nama_siswa');
        $data->tgl_lahir = $request->input('tgl_lahir');
        $data->alamat = $request->input('alamat');
        $data->no_telp = $request->input('no_telp');
        $data->users->email = $request->input('email'); // Memperbarui email pada relasi users
        $password_old = $data->users->password;
        if (!$request->password) {
            $data->users->password = $password_old;
        }
        else {
            $data->users->password = Hash::make($request->password);
        }
        $data->users->remember_token = Str::random(60); // Memperbarui password pada relasi users

        $data->save();
        $data->users->save(); // Menyimpan perubahan email pada relasi users

        return redirect('/profilsiswa')->with('update', 'Profil Berhasil Diupdate');
    }


    public function tambahdatasiswa()
    {
        $dt_kelas = DB::table('kelas')->select('kode_kelas', 'nama_kelas')->get();
        return view('siswa.tambahsiswa', compact('dt_kelas'));;
    }

    public function insertdatasiswa(Request $request)
    {
        // var_dump($request);
        $data = new Siswa();
        $data->id_siswa = $request->id_siswa;
        $data->nama_siswa = $request->nama_siswa;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->alamat = $request->alamat;
        $data->no_telp = $request->no_telp;

        $dt_kelas = $request->input('nama_kelas');
        $kelas = Kelas::where('kode_kelas', $dt_kelas)->first();

        if ($kelas) {
            $data->kelas()->associate($kelas);
        }

        $data->save();

        return redirect('/siswa')->with('success', 'Data Siswa Berhasil DiTambah');
    }

    public function tampildatasiswa(Request $request, $id)
    {
        $data = Siswa::with('kelas')->where('id_siswa', $id)->first();
        $kelasData = Kelas::select('kode_kelas', 'nama_kelas')->get();

        return view('siswa.tampilsiswa', compact('data', 'kelasData'));
    }


    public function updatedatasiswa(Request $request, $id)
    {
        $data = Siswa::where('id_siswa', $id)->first();
        $data->id_siswa = $request->id_siswa;
        $data->nama_siswa = $request->nama_siswa;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->alamat = $request->alamat;
        $data->no_telp = $request->no_telp;


        $dt_kelas = $request->input('nama_kelas');
        var_dump($dt_kelas);
        $kelas = Kelas::where('kode_kelas', $dt_kelas)->first();
        var_dump($kelas);

        if ($kelas) {
            $data->kode_kelas = $kelas->kode_kelas;
            $data->save();

            return redirect('/siswa')->with('update', 'Data Siswa Berhasil DiUpdate.');
        } else {
            return redirect()->back()->with('error', 'Nama Kelas tidak valid.');
        }
    }

    public function deletedatasiswa(Request $request, $id)
    {
        $data = Siswa::where('id_siswa', $id);
        $data->delete();
        return Redirect('/siswa')->with('delete', 'Data Siswa Berhasil DI Hapus');
    }

    public function daftarsiswa(Request $request, $id)
    {
        $data = Siswa::where('id_siswa', $id)->first();
        $users = DB::table('users')
            ->select('users.id', 'users.email')
            ->where('users.role', 'siswa')
            ->whereNotExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('siswa')
                    ->whereRaw('users.id = siswa.user_id');
            })
            ->get();

        return view('siswa.daftarsiswa', compact('data', 'users'));
    }

    public function insertakunsiswa(Request $request)
    {
        $id_siswa = $request->input('id_siswa');
        $data = Siswa::where('id_siswa', $id_siswa)->first();
        $user_id = $request->input('email');

        if ($user_id) {
            $user = User::find($user_id);

            if ($user) {
                $data->user_id = $user->id;
                $data->save();

                return redirect('/siswa')->with('daftar', 'Akun Berhasil Terdaftar');
            }
        }

        return redirect()->back()->with('error', 'Akun tidak dapat terdaftar');
    }
}
