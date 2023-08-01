<?php

namespace App\Http\Controllers;

use App\Models\Tb_admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {

        // Mendapatkan ID pengguna yang sedang login
        $userId = Auth::id();
        $data =  Tb_admin::selectRaw("tb_admin.id_admin, users.name, tb_admin.nama_admin, tb_admin.alamat, tb_admin.tgl_lahir, users.email, tb_admin.no_telp")
            ->join('users', 'users.id', '=', 'tb_admin.user_id')
            ->where('users.id', $userId) // Filter berdasarkan ID pengguna yang sedang login
            ->get();
        return view('profil.dataadmin', compact('data'));
    }

    public function editadmin(Request $request)
    {
        $userId = Auth::id();
        $data = Tb_admin::where('user_id', $userId)->with('users')->first();

        $email = $data->users->email ?? '';
        // $password = $data->users->password ?? '';

        if (!$data) {
            abort(404); // Tampilkan halaman 404 jika data tidak ditemukan
        }

        return view('profil.editadmin', compact('data', 'email',));
    }

    public function updateadmin(Request $request)
    {
    $userId = Auth::id();
    $data = Tb_admin::where('user_id', $userId)->with('users')->first();
    
    if (!$data) {
        abort(404); // Tampilkan halaman 404 jika data tidak ditemukan
    }
    
    $data->nama_admin = $request->input('nama_admin');
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
    $data->users->save(); // Menyimpan perubahan pada relasi users


    return redirect('/profil')->with('update', 'Profil Berhasil Diupdate');
    }

}
