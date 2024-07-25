<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumberPemasukan extends Model
{
    use HasFactory;
    protected $guarded=([]);
    public function pemasukan()
    {
        return $this->hasMany(Pemasukan::class);
    }
}