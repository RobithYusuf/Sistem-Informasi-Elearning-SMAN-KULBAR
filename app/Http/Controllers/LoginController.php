<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function loginproses(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect('/beranda');
            } elseif ($user->role == 'guru') {
                return redirect('/berandaguru');
            } elseif ($user->role == 'siswa') {
                return redirect('/berandasiswa');
            }
        }
        return redirect('/login');
    }

    public function register()
    {
        return view('login.register');
    }

    public function registeruser(Request $request)
    { {
            $data = new User();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->role = $request->role;
            $data->password = Hash::make($request->password);
            $data->remember_token = Str::random(60);
            $data->save();
            return Redirect('/users')->with('success', 'Data Berhasil DiTambahkan');
        }
    }

    public function logout()
    {
        Auth::logout();
        return \redirect('/login');
    }

    public function users(Request $request)
    {
        $search = $request->input('search');

        $query = User::orderByRaw("CASE WHEN role = 'admin' THEN 1 WHEN role = 'guru' THEN 2 ELSE 3 END");

        // Query untuk mencari
        if ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        }

        $data = $query->get();

        return view('users.datausers', compact('data', 'search'));
    }


    public function tampildatauser(Request $request, $id)
    {
        $data = User::where('id', $id)->first();
        return view('users.edituser', compact('data'));
    }

    public function updatedatauser(Request $request, $id)
    {
        $data = User::where('id', $id)->first();
        $data->name = $request->name;
        $data->role = $request->role;
        $data->email = $request->email;
        $password_old = $data->password;
        if (!$request->password) {
            $data->password = $password_old;
        }
        else {
            $data->password = Hash::make($request->password);
        }
        $data->remember_token = Str::random(60);
        $data->save();
        return Redirect('/users')->with('update', "Data Berhasil Diupdate");
    }

    public function deletedatauser(Request $request, $id)
    {
        $data = User::where('id', $id);
        $data->delete();
        return Redirect('/users')->with('success', 'Data Berhasil DiHapus');
    }
}
