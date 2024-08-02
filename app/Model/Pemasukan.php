<?php

namespace App\Model;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
  public function users()
  {
    return $this->belongsTo(User::class);
  }
  public static function getPemasukanHarianMingguIni($userId, $start_of_week, $end_of_week)
  {
    return self::select(DB::raw('DATE(tanggal) as date'), DB::raw('sum(saldo) as total'))
      ->where('user_id', $userId)
      ->whereBetween('tanggal', [$start_of_week, $end_of_week])
      ->groupBy(DB::raw('DATE(tanggal)'))
      ->get();
  }
}