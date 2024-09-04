<?php

namespace App\Model;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengeluaran extends Model
{
  use HasFactory;
  protected $guarded = ([]);
  public function kegiatan()
  {
    return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
  }
  public function rekening()
  {
    return $this->belongsTo(Rekening::class, 'rekening_id');
  }
  public function transaksi()
  {
    return $this->belongsTo(Transaksi::class, 'transaksi_id');
  }
  public function kebutuhan()
  {
    return $this->belongsTo(Kebutuhan::class, 'kebutuhan_id');
  }

  public function users()
  {
    return $this->belongsTo(User::class);
  }

  public static function getPengeluaranHarianMingguIni($userId, $start_of_week, $end_of_week)
  {
    return self::select(DB::raw('DATE(tanggal) as date'), DB::raw('SUM(saldo) as total'))
      ->where('user_id', $userId)
      ->whereBetween('tanggal', [$start_of_week, $end_of_week])
      ->groupBy(DB::raw('DATE(tanggal)'))
      ->get();
  }

  public static function getPengeluaranHarian($userId)
  {
    return self::select(DB::raw('DATE(tanggal) as date'), DB::raw('SUM(saldo) as total'))
      ->where('user_id', $userId)
      ->groupBy(DB::raw('DATE(tanggal)'))
      ->get();
  }
}