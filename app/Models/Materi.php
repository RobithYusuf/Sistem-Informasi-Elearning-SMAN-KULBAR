<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materi';
    protected $fillable = ['kode_materi','kode_mapel','judul_materi','deskripsi','file','kode_kelas','tahun_id','created_at'];
    protected $primaryKey = 'kode_materi';

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'kode_mapel', 'kode_mapel');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kode_kelas', 'kode_kelas');
    }

    public function tahunajar()
    {
        return $this->belongsTo(Tahunajar::class, 'tahun_id', 'id_ajar');
    }

}
