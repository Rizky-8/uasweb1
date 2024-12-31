<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'alamat'];

    public function sukuCadang()
    {
        return $this->hasMany(SukuCadang::class);
    }
}