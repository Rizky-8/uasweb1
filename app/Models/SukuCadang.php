<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SukuCadang extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'kategori_id', 'pemasok_id', 'harga'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}