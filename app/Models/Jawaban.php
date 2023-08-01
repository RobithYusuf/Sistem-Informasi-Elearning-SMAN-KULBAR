<?php

namespace App\Models;

use App\Models\Siswa;
use App\Models\Tugas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jawaban extends Model
{
    use HasFactory;

    protected $table = 'jawaban';
    protected $fillable = ['id_jawaban','id_siswa','kode_tugas','file', 'created_at'];
    protected $primaryKey = 'id_jawaban';

    public function siswa()
    {
    return $this->belongsTo(Siswa::class, 'id_siswa', 'id_siswa');
    }

    public function tugas()
    {
    return $this->belongsTo(Tugas::class, 'kode_tugas', 'kode_tugas');
    }

}
