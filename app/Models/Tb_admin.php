<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_admin extends Model
{
    use HasFactory;

    protected $table = 'tb_admin';
    protected $fillable = ['id_admin','user_id','nama_admin','tgl_lahir','email','alamat','no_telp'];
    protected $primaryKey = 'id_admin';

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

}
