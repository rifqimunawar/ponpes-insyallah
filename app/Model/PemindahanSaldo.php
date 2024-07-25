<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemindahanSaldo extends Model
{
  use HasFactory;
  protected $guarded = ([]);
  public function rekening_awal()
  {
    return $this->belongsTo(Rekening::class, 'rekening_awal_id');
  }
  public function rekening_tujuan()
  {
    return $this->belongsTo(Rekening::class, 'rekening_tujuan_id');
  }
}

