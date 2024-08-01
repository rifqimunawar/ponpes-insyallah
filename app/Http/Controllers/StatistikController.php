<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Model\Rekening;
use App\Model\Pemasukan;
use App\Model\Transaksi;
use App\Model\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StatistikController extends Controller
{
  function formatToK($number)
  {
    // Menghilangkan 3 angka terakhir dan menambahkan 'k'
    if ($number >= 1000) {
      $formatted = number_format($number / 1000, 0) . 'k';
    } else {
      // Untuk angka di bawah 1000, formatnya tetap sebagai angka biasa
      $formatted = $number;
    }
    return $formatted;
  }

  public function dashboard()
  {
    $sisa_saldo = Rekening::sum('saldo');
    $jumlah_hari_dalam_bulan = date('t');
    $hari_ini = date('j');
    $jumlah_hari_tersisa = $jumlah_hari_dalam_bulan - $hari_ini + 1;
    $target_pengeluaran_harian = $sisa_saldo / $jumlah_hari_tersisa;

    $userLogin = Auth::user();

    // Menghitung total pengeluaran bulan ini
    $total_pengeluaran_bulan_ini = Pengeluaran::whereMonth('tanggal', date('m'))
      ->whereYear('tanggal', date('Y'))
      ->sum('saldo');

    // Menghitung total pengeluaran minggu ini
    $start_of_week = Carbon::now()->startOfWeek()->format('Y-m-d');
    $end_of_week = Carbon::now()->endOfWeek()->format('Y-m-d');
    $total_pengeluaran_minggu_ini = Pengeluaran::whereBetween('tanggal', [$start_of_week, $end_of_week])
      ->sum('saldo');

    // Menghitung total pengeluaran tahun ini
    $total_pengeluaran_tahun_ini = Pengeluaran::whereYear('tanggal', date('Y'))
      ->sum('saldo');

    // Menghitung total pemasukan bulan ini
    $total_pemasukan_bulan_ini = Pemasukan::whereMonth('tanggal', date('m'))
      ->whereYear('tanggal', date('Y'))
      ->sum('saldo');

    // Menghitung total pemasukan minggu ini
    $total_pemasukan_minggu_ini = Pemasukan::whereBetween('tanggal', [$start_of_week, $end_of_week])
      ->sum('saldo');

    // Menghitung total pemasukan tahun ini
    $total_pemasukan_tahun_ini = Pemasukan::whereYear('tanggal', date('Y'))
      ->sum('saldo');

    // Menghitung pengeluaran hari ini
    $pengeluaran_hari_ini = Pengeluaran::whereDate('tanggal', Carbon::now()->format('Y-m-d'))
      ->sum('saldo');

    $pengeluaran_harian_minggu_ini = Pengeluaran::getPengeluaranHarianMingguIni($start_of_week, $end_of_week);
    $pemasukan_harian_minggu_ini = Pemasukan::getPemasukanHarianMingguIni($start_of_week, $end_of_week);

    $total_pengeluaran_seminggu = $pengeluaran_harian_minggu_ini->sum('saldo');
    $total_pemasukan_seminggu = $pemasukan_harian_minggu_ini->sum('saldo');


    // dd($pengeluaran_harian_minggu_ini);
    return view('pages.dashboard', [
      'userLogin' => $userLogin,
      'sisa_saldo' => $sisa_saldo,
      'pengeluaran_hari_ini' => $pengeluaran_hari_ini,
      'pengeluaran_harian_minggu_ini' => $pengeluaran_harian_minggu_ini,
      'target_pengeluaran_harian' => $target_pengeluaran_harian,
      'total_pengeluaran_bulan_ini' => $total_pengeluaran_bulan_ini,
      'total_pengeluaran_minggu_ini' => $total_pengeluaran_minggu_ini,
      'total_pengeluaran_tahun_ini' => $total_pengeluaran_tahun_ini,
      'total_pengeluaran_seminggu' => $total_pengeluaran_seminggu,

      'total_pemasukan_seminggu' => $total_pemasukan_seminggu,
      'total_pemasukan_bulan_ini' => $total_pemasukan_bulan_ini,
      'total_pemasukan_minggu_ini' => $total_pemasukan_minggu_ini,
      'total_pemasukan_tahun_ini' => $total_pemasukan_tahun_ini,
      'pemasukan_harian_minggu_ini' => $pemasukan_harian_minggu_ini,
    ]);
  }


}