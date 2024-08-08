<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SumberPemasukan extends Model
{
  use HasFactory;
  protected $guarded = ([]);
  public function pemasukan()
  {
    return $this->hasMany(Pemasukan::class);
  }
  public function users()
  {
    return $this->belongsTo(User::class);
  }
}