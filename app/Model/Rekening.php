<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    use HasFactory;
    protected $guarded=([]);
    public function pengeluarans()
    {
        return $this->hasMany(Pengeluaran::class);
    }
}