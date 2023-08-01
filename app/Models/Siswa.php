<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $fillable = ['id_siswa','kode_kelas','nama_siswa','tgl_lahir','user_id','alamat','no_telp'];
    protected $primaryKey = 'id_siswa';

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kode_kelas');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

}
