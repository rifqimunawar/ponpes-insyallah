<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rekening extends Model
{
  use HasFactory;
  protected $guarded = ([]);
  public function pengeluarans()
  {
    return $this->hasMany(Pengeluaran::class);
  }
  public function users()
  {
    return $this->belongsTo(User::class);
  }
}