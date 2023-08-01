<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';
    protected $fillable = ['id_guru','nama_guru','tgl_lahir','user_id','alamat','no_telp'];
    protected $primaryKey = 'id_guru';

    public function mapel()
    {
        return $this->hasMany(Mapel::class, 'id_guru');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

}
