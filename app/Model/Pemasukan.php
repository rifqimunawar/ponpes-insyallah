<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
  use HasFactory;
  protected $guarded = ([]);
  public function sumber_pemasukan()
  {
    return $this->belongsTo(SumberPemasukan::class, 'sumber_pemasukan_id');
  }
  public function rekening()
  {
    return $this->belongsTo(Rekening::class, 'rekening_id');
  }
}