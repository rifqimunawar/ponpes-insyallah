<?php

namespace App\Http\Controllers;

use App\Model\Rekening;
use Illuminate\Http\Request;
use App\Model\PemindahanSaldo;
use RealRashid\SweetAlert\Facades\Alert;

class PemindahanSaldoController extends Controller
{
  public function create()
  {
    $title = "Pemindahan Saldo";
    $rekening = Rekening::all();
    return view('pages.pemindahan-saldo.create', ['rekening' => $rekening, 'title' => $title]);
  }

  public function store(Request $request)
  {
    $data = $request->all();

    if (isset($data['saldo'])) {
      $data['saldo'] = preg_replace('/[^0-9]/', '', $data['saldo']);
    }

    $rekening_awal = Rekening::findOrFail($data['rekening_awal_id']);
    $rekening_tujuan = Rekening::findOrFail($data['rekening_tujuan_id']);

    if ($rekening_awal->saldo < $data['saldo']) {
      Alert::error('Oops..', 'Saldo ' . $rekening_awal->name . '  tidak mencukupi !!!');
      return redirect()->route('pemindahan-saldo.create');
    }

    $rekening_awal->saldo -= $data['saldo'];
    $rekening_tujuan->saldo += $data['saldo'];

    $rekening_awal->save();
    $rekening_tujuan->save();

    $data = PemindahanSaldo::create($data);
    Alert::success('Success', 'Pemindahan Saldo Berhasil');
    return redirect()->route('pemindahan-saldo.create');
  }

}
