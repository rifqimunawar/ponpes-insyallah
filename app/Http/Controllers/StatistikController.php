<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Model\Rekening;
use App\Model\Pemasukan;
use App\Model\Transaksi;
use App\Model\Pengeluaran;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
  public function dashboard()
  {
    $total_saldo = Rekening::sum('saldo');

    $tanggal_awal = '07/01/2024';
    $tanggal_akhir = '07/30/2024';
    $total_pengeluaran = Pengeluaran::whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir])->sum('saldo');
    $total_pemasukan = Pemasukan::sum('saldo');
    $target_pengeluaran_harian = $total_saldo / 30;
    $pengeluaran_hari_ini = Pengeluaran::where('tanggal', Carbon::now()->format('m/d/Y'))->sum('saldo');



    // dd($pengeluaran_hari_ini);
    return view('pages.dashboard', [
      'total_saldo' => $total_saldo,
      'total_pengeluaran' => $total_pengeluaran,
      'total_pemasukan' => $total_pemasukan,
      'target_pengeluaran_harian' => $target_pengeluaran_harian,
      'pengeluaran_hari_ini' => $pengeluaran_hari_ini,
    ]);
  }
}