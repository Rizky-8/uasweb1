<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['suku_cadang_id', 'jumlah', 'total_harga'];

    public function sukuCadang()
    {
        return $this->belongsTo(SukuCadang::class);
    }
}