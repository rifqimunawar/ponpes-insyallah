<?php

namespace App\Http\Controllers;

use App\Model\Rekening;
use App\Model\Transaksi;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
  public function dashboard() {
    // Ambil semua saldo dari tabel rekening
    $total_saldo = Rekening::sum('saldo');

    // Kirimkan total saldo ke tampilan
    return view('pages.dashboard', ['total_saldo' => $total_saldo]);
}

    public function index(){

    $data = Transaksi::all();
      return view('pages.transaksi_index', compact('data'));
    }
}