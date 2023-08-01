<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\TahunajarController;
use App\Http\Controllers\MaterisiswaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| //mengatur cookies di session.php (mengatur time, ketika sudah log out dan klik back
| // akan muncul halaman lagi tetapi dalam waktu yang telah di atur)
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login.login');
});

//route login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');

Route::group(['middleware' => ['auth', 'hakakses:admin']], function () {
    Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda')->middleware('auth');
    //route register
    Route::get('/register', [LoginController::class, 'register'])->name('register');
    Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');
    //route user
    Route::get('/users', [LoginController::class, 'users'])->name('users')->middleware('auth');
    Route::get('/tampildatauser/{id}', [LoginController::class, 'tampildatauser'])->name('tampildatauser')->middleware('auth');
    Route::post('/updatedatauser/{id}', [LoginController::class, 'updatedatauser'])->name('updatedatauser')->middleware('auth');
    Route::get('/deletedatauser/{id}', [LoginController::class, 'deletedatauser'])->name('deletedatauser')->middleware('auth');
    //route profil
    Route::get('/profil', [AdminController::class, 'index'])->name('profil')->middleware('auth');
    Route::get('/editadmin', [AdminController::class, 'editadmin'])->name('editadmin')->middleware('auth');
    Route::post('/updateadmin', [AdminController::class, 'updateadmin'])->name('updateadmin')->middleware('auth');
    //route tahunajar
    Route::get('/tahunajar', [TahunajarController::class, 'index'])->name('tahunajar')->middleware('auth');
    Route::get('/tahunajaran', [TahunajarController::class, 'tampil'])->name('tahunajaran')->middleware('auth');
    Route::post('/tambahdata', [TahunajarController::class, 'tambahdata'])->name('tambahdata')->middleware('auth');
    Route::get('/tampildataajar/{id}', [TahunajarController::class, 'tampildataajar'])->name('tampildataajar')->middleware('auth');
    Route::post('/updatedataajar/{id}', [TahunajarController::class, 'updatedataajar'])->name('updatedataajar')->middleware('auth');
    Route::get('/deletedataajar/{id}', [TahunajarController::class, 'deletedataajar'])->name('deletedataajar')->middleware('auth');
    //route guru
    Route::get('/guru', [GuruController::class, 'index'])->name('guru')->middleware('auth');
    Route::get('/tambahdataguru', [GuruController::class, 'tambahdataguru'])->name('tambahdataguru')->middleware('auth');
    Route::post('/insertdataguru', [GuruController::class, 'insertdataguru'])->name('insertdataguru')->middleware('auth');
    Route::post('/insertakunguru', [GuruController::class, 'insertakunguru'])->name('insertakunguru')->middleware('auth');
    Route::get('/daftarguru/{id}', [GuruController::class, 'daftarguru'])->name('daftarguru')->middleware('auth');
    Route::get('/tampildataguru/{id}', [GuruController::class, 'tampildataguru'])->name('tampildataguru')->middleware('auth');
    Route::post('/updatedataguru/{id}', [GuruController::class, 'updatedataguru'])->name('updatedataguru')->middleware('auth');
    Route::get('/deletedataguru/{id}', [GuruController::class, 'deletedataguru'])->name('deletedataguru')->middleware('auth');
    //route kelas
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas')->middleware('auth');
    Route::get('/lihatdatakelas/{id}', [KelasController::class, 'lihatdatakelas'])->name('lihatdatakelas')->middleware('auth');
    Route::get('/tambahdatakelas', [KelasController::class, 'tambahdatakelas'])->name('tambahdatakelas')->middleware('auth');
    Route::post('/insertdatakelas', [KelasController::class, 'insertdatakelas'])->name('insertdatakelas')->middleware('auth');
    Route::get('/tampildatakelas/{id}', [KelasController::class, 'tampildatakelas'])->name('tampildatakelas')->middleware('auth');
    Route::post('/updatedatakelas/{id}', [KelasController::class, 'updatedatakelas'])->name('updatedatakelas')->middleware('auth');
    Route::get('/deletedatakelas/{id}', [KelasController::class, 'deletedatakelas'])->name('deletedatakelas')->middleware('auth');
    //route siswa
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa')->middleware('auth');
    Route::get('/tambahdatasiswa', [SiswaController::class, 'tambahdatasiswa'])->name('tambahdatasiswa')->middleware('auth');
    Route::post('/insertdatasiswa', [SiswaController::class, 'insertdatasiswa'])->name('insertdatasiswa')->middleware('auth');
    Route::get('/tampildatasiswa/{id}', [SiswaController::class, 'tampildatasiswa'])->name('tampildatasiswa')->middleware('auth');
    Route::post('/updatedatasiswa/{id}', [SiswaController::class, 'updatedatasiswa'])->name('updatedatasiswa')->middleware('auth');
    Route::post('/insertakunsiswa', [SiswaController::class, 'insertakunsiswa'])->name('insertakunsiswa')->middleware('auth');
    Route::get('/daftarsiswa/{id}', [SiswaController::class, 'daftarsiswa'])->name('daftarsiswa')->middleware('auth');
    Route::get('/deletedatasiswa/{id}', [SiswaController::class, 'deletedatasiswa'])->name('deletedatasiswa')->middleware('auth');
    //route mapel
    Route::get('/mapel', [MapelController::class, 'index'])->name('mapel')->middleware('auth');
    Route::get('/tambahdatamapel', [MapelController::class, 'tambahdatamapel'])->name('tambahdatamapel')->middleware('auth');
    Route::post('/insertdatamapel', [MapelController::class, 'insertdatamapel'])->name('insertdatamapel')->middleware('auth');
    Route::get('/tampildatamapel/{id}', [MapelController::class, 'tampildatamapel'])->name('tampildatamapel')->middleware('auth');
    Route::post('/updatedatamapel/{id}', [MapelController::class, 'updatedatamapel'])->name('updatedatamapel')->middleware('auth');
    Route::get('/deletedatamapel/{id}', [MapelController::class, 'deletedatamapel'])->name('deletedatamapel')->middleware('auth');
    //route riwayat
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat')->middleware('auth');
    Route::get('/cetak', [RiwayatController::class, 'cetak'])->name('cetak')->middleware('auth');
});

Route::group(['middleware' => ['auth', 'hakakses:guru']], function () {
    //Route Hak Guru
    Route::get('/berandaguru', [BerandaController::class, 'berandaguru'])->name('berandaguru')->middleware('auth');
    Route::get('/profilguru', [GuruController::class, 'profilguru'])->name('profilguru')->middleware('auth');
    Route::get('/editguru', [GuruController::class, 'editguru'])->name('editguru')->middleware('auth');
    Route::post('/updateguru', [GuruController::class, 'updateguru'])->name('updateguru')->middleware('auth');
    //route kontenguru-materi
    Route::get('/kontenguru', [MateriController::class, 'index'])->name('kontenguru')->middleware('auth');
    Route::get('/materipelajaran/{id}', [MateriController::class, 'materipelajaran'])->name('materipelajaran')->middleware('auth');
    Route::get('/tambahdatamateri', [MateriController::class, 'tambahdatamateri'])->name('tambahdatamateri')->middleware('auth');
    Route::post('/uploadmateri', [MateriController::class, 'uploadmateri'])->name('uploadmateri')->middleware('auth');
    Route::get('/tampildatamateri/{id}', [materiController::class,'tampildatamateri'])->name('tampildatamateri')->middleware('auth');
    Route::post('/updatedatamateri/{id}', [materiController::class,'updatedatamateri'])->name('updatedatamateri')->middleware('auth');
    Route::get('/deletedatamateri/{id}', [MateriController::class, 'deletedatamateri'])->name('deletedatamateri')->middleware('auth');
    //route kontenguru-tugas
    Route::get('/tugaspelajaran/{id}', [TugasController::class, 'tugaspelajaran'])->name('tugaspelajaran')->middleware('auth');
    Route::get('/tambahdatatugas', [TugasController::class, 'tambahdatatugas'])->name('tambahdatatugas')->middleware('auth');
    Route::post('/uploadtugas', [TugasController::class, 'uploadtugas'])->name('uploadtugas')->middleware('auth');
    Route::get('/jawabansiswa/{id}', [TugasController::class, 'jawabansiswa'])->name('jawabansiswa')->middleware('auth');
    Route::get('/tampildatatugas/{id}', [TugasController::class,'tampildatatugas'])->name('tampildatatugas')->middleware('auth');
    Route::post('/updatedatatugas/{id}', [TugasController::class,'updatedatatugas'])->name('updatedatatugas')->middleware('auth');
    Route::get('/deletedatatugas/{id}', [TugasController::class, 'deletedatatugas'])->name('deletedatatugas')->middleware('auth');
});

Route::group(['middleware' => ['auth', 'hakakses:siswa']], function () {
    //Route Hak Siswa
    Route::get('/berandasiswa', [BerandaController::class, 'berandasiswa'])->name('berandasiswa')->middleware('auth');
    Route::get('/profilsiswa', [SiswaController::class, 'profilsiswa'])->name('profilsiswa')->middleware('auth');
    Route::get('/edit', [SiswaController::class, 'edit'])->name('edit')->middleware('auth');
    Route::post('/update', [SiswaController::class, 'update'])->name('update')->middleware('auth');
    //route daftar pelajaran
    Route::get('/pelajaran', [MaterisiswaController::class, 'index'])->name('pelajaran')->middleware('auth');
    Route::get('/materi/{id}', [MaterisiswaController::class, 'materi'])->name('materi')->middleware('auth');
    Route::get('/tugas/{id}', [MaterisiswaController::class, 'tugas'])->name('tugas')->middleware('auth');
    Route::get('/jawaban/{id}', [MaterisiswaController::class, 'jawaban'])->name('jawaban')->middleware('auth');
    Route::get('/editjawaban/{id}', [MaterisiswaController::class, 'editjawaban'])->name('editjawaban')->middleware('auth');
    Route::post('/uploadjawaban', [MaterisiswaController::class, 'uploadjawaban'])->name('uploadjawaban')->middleware('auth');
});
