<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisEvent extends Model
{
    protected $fillable = [
        'nama_jenis_event','deskripsi'
    ];
}
