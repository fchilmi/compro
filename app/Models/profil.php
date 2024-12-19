<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profil extends Model
{
    use HasFactory;
    protected $fillable = ['namaPerusahaan', 'alamatToko', 'alamatGudang', 'deskripsiPerusahaan', 'logoPerusahaan', 'gambarPerusahaan1', 'gambarPerusahaan2', 'gambarPerusahan3'];
}
