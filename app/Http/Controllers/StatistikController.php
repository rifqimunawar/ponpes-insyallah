<?php

namespace App\Http\Controllers;

use App\Model\Pemasukan;
use App\Model\Pengeluaran;
use App\Model\Rekening;
use App\Model\Transaksi;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
  public function dashboard()
  {
    // Ambil semua saldo dari tabel rekening
    $total_saldo = Rekening::sum('saldo');

    $total_pengeluaran = Pengeluaran::sum('saldo');
    $total_pemasukan = Pemasukan::sum('saldo');
    // Kirimkan total saldo ke tampilan
    // dd($total_pengeluaran);
    return view('pages.dashboard', ['total_saldo' => $total_saldo, 'total_pengeluaran' => $total_pengeluaran, 'total_pemasukan' => $total_pemasukan]);
  }
}