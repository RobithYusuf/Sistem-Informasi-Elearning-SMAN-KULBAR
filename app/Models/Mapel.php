<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapel';
    protected $fillable = ['kode_mapel','nama_mapel', 'id_guru'];
    protected $primaryKey = 'kode_mapel';

    public function guru()
    {  
        return $this->belongsTo(Guru::class, 'id_guru');
    }
}
