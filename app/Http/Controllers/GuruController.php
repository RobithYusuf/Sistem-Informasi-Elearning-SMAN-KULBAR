<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Guru::orderBy('nama_guru', 'asc');

        //query untuk mencari
        if ($search) {
            $query->where('nama_guru', 'LIKE', '%' . $search . '%');
        }
        $data = $query->get();

        foreach ($data as $guru) {
            $guru->tgl_lahir = Carbon::parse($guru->tgl_lahir);
        }
        return view('guru.dataguru', compact('data', 'search'));
    }

    public function profilguru()
    {
        // Mendapatkan ID pengguna yang sedang login
        $userId = Auth::id();
        $data =  Guru::selectRaw("guru.id_guru, mapel.nama_mapel, users.name, guru.nama_guru, guru.alamat, guru.tgl_lahir, users.email, guru.no_telp")
            ->join('users', 'users.id', '=', 'guru.user_id')
            ->join('mapel', 'mapel.id_guru', '=', 'guru.id_guru')
            ->where('users.id', $userId) // Filter berdasarkan ID pengguna yang sedang login
            ->get();
        return view('profil.dataguru', compact('data'));
    }

    public function editguru(Request $request)
    {
        $userId = Auth::id();
        $data = Guru::where('user_id', $userId)->with('users')->first();

        $email = $data->users->email ?? '';

        if (!$data) {
            abort(404); // Tampilkan halaman 404 jika data tidak ditemukan
        }

        return view('profil.editguru', compact('data', 'email'));
    }

    public function updateguru(Request $request)
    {
        $userId = Auth::id();
        $data = Guru::where('user_id', $userId)->with('users')->first();

        if (!$data) {
            abort(404); // Tampilkan halaman 404 jika data tidak ditemukan
        }

        $data->nama_guru = $request->input('nama_guru');
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

        return redirect('/profilguru')->with('update', 'Profil Berhasil Diupdate');
    }


    public function tambahdataguru()
    {
        return view('guru.tambahguru');
    }

    public function insertdataguru(Request $request)
    {
        $data = new Guru();
        $data->id_guru = $request->id_guru;
        $data->nama_guru = $request->nama_guru;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->alamat = $request->alamat;
        $data->no_telp = $request->no_telp;

        $data->save();

        return redirect('/guru')->with('success', 'Data Guru berhasil disimpan.');
    }

    public function tampildataguru(Request $request, $id)
    {
        $data = Guru::where('id_guru', $id)->first();
        return view('guru.tampilguru', compact('data'));
    }

    public function updatedataguru(Request $request, $id)
    {
        $data = Guru::where('id_guru', $id)->first();
        $data->id_guru = $request->id_guru;
        $data->nama_guru = $request->nama_guru;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->alamat = $request->alamat;
        $data->no_telp = $request->no_telp;
        $data->save();
        return Redirect('/guru')->with('update', 'Data Guru Berhasil DiUpdate.');
    }

    public function deletedataguru(Request $request, $id)
    {
        $data = Guru::where('id_guru', $id);
        $data->delete();
        return Redirect('/guru')->with('delete', 'Data Berhasil DiHapus');
    }

    public function daftarguru(Request $request, $id)
    {
        $data = Guru::where('id_guru', $id)->first();
        $users = DB::table('users')
            ->select('users.id', 'users.email')
            ->where('users.role', 'guru')
            ->whereNotExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('guru')
                    ->whereRaw('users.id = guru.user_id');
            })
            ->get();

        return view('guru.daftarguru', compact('data', 'users'));
    }

    public function insertakunguru(Request $request)
    {
        $id_guru = $request->input('id_guru');
        $data = Guru::where('id_guru', $id_guru)->first();
        $user_id = $request->input('email');

        if ($user_id) {
            $user = User::find($user_id);

            if ($user) {
                $data->user_id = $user->id;
                $data->save();

                return redirect('/guru')->with('daftar', 'Akun Berhasil Terdaftar');
            }
        }

        return redirect()->back()->with('error', 'Akun tidak dapat terdaftar');
    }
}
