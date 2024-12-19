<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gambar extends Model
{
    use HasFactory;
    protected $fillable = ['namaGambar', 'idProduk', 'produk'];
    protected $with = ['produk'];

    public function produk(): BelongsTo
    {
        return $this->belongsTo(produk::class);
    }
}
