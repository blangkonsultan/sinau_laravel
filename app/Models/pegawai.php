<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    protected $table = 'pegawai';
    use HasFactory;

    protected $fillable = [
        'jabatan_id', 'unit_id', 'nip', 'nik', 'nama', 'alamat', 'dob', 'gender'
    ];

    protected $casts = [
        'dob' => 'date',
    ];
}
