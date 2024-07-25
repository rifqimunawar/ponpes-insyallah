<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded=([]);
    public function pengeluarans()
    {
        return $this->hasMany(Pengeluaran::class);
    }
}