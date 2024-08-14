<?php

namespace App\Http\Controllers;

use App\Model\Rekening;
use Illuminate\Http\Request;
use App\Model\PemindahanSaldo;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PemindahanSaldoController extends Controller
{
  protected $userLogin;

  public function __construct()
  {

    $this->middleware(function ($request, $next) {
      $this->userLogin = Auth::user();
      return $next($request);
    });
  }
  public function create()
  {
    $title = "Pemindahan Saldo";
    $userLogin = $this->userLogin;
    $rekening = Rekening::where('user_id', $userLogin->id)->get();
    return view('pages.pemindahan-saldo.create', ['rekening' => $rekening, 'title' => $title, 'userLogin' => $this->userLogin]);
  }

  public function store(Request $request)
  {
    $data = $request->all();
    $userLogin = $this->userLogin;
    $data['user_id'] = $userLogin->id;

    if (isset($data['saldo'])) {
      $data['saldo'] = preg_replace('/[^0-9]/', '', $data['saldo']);
    }
    // Konversi format tanggal
    if (isset($data['tanggal'])) {
      $data['tanggal'] = Carbon::createFromFormat('m/d/Y', $data['tanggal'])->format('Y-m-d');
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
