<?php

namespace App\Models;

use App\Models\Jawaban;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tugas';
    protected $fillable = ['kode_tugas','kode_mapel','nama_tugas','deskripsi','file','deadline','kode_kelas','tahun_id','created_at'];
    protected $primaryKey = 'kode_tugas';

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'kode_mapel', 'kode_mapel');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kode_kelas', 'kode_kelas');
    }

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class, 'kode_tugas', 'kode_tugas');
    }

    public function tahunajar()
    {
        return $this->belongsTo(Tahunajar::class, 'tahun_id', 'id_ajar');
    }
}

