<?php

namespace App\Http\Controllers;

use App\Model\Rekening;
use Illuminate\Http\Request;

class PemindahanSaldoController extends Controller
{
  function create()
  {
    $rekening = Rekening::all();
    return view('pages.pemindahan-saldo.create');
  }
}
