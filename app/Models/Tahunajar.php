<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahunajar extends Model
{
    use HasFactory;

    protected $table = 'tahun_ajar';
    protected $fillable = ['id_ajar','tahun_ajaran','semester','status'];
    protected $primaryKey = 'id_ajar';

}
