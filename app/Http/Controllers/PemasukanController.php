<?php

namespace App\Http\Controllers;

use App\Model\Kegiatan;
use App\Model\Rekening;
use App\Model\Kebutuhan;
use App\Model\Pemasukan;
use Illuminate\Http\Request;
use App\Model\SumberPemasukan;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PemasukanController extends Controller
{
  protected $userLogin;

  public function __construct()
  {

    $this->middleware(function ($request, $next) {
      $this->userLogin = Auth::user();
      return $next($request);
    });
  }
  public function index()
  {
    $userLogin = $this->userLogin;
    $pemasukan = Pemasukan::where('user_id', $userLogin->id)->with('sumber_pemasukan', 'rekening')->get();
    $title = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($title, $text);
    return view('pages.pemasukan.index', ['data' => $pemasukan, 'userLogin' => $this->userLogin]);
  }

  public function create()
  {
    $userLogin = $this->userLogin;
    $rekening = Rekening::where('user_id', $userLogin->id)->get();
    $sumber = SumberPemasukan::where('user_id', $userLogin->id)->get();
    return view('pages.pemasukan.create', ['sumber' => $sumber, 'rekening' => $rekening, 'userLogin' => $this->userLogin]);
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

    $rekening = Rekening::findOrFail($data['rekening_id']);
    $rekening->saldo += $data['saldo'];
    $rekening->save();

    $pemasukan = Pemasukan::create($data);
    Alert::success('Success', 'Data berhasil ditambahkan');
    return redirect()->route('pemasukan.index');
  }


  public function show($id)
  {
    $data = Pemasukan::findOrFail($id);
    return response()->json(['message' => 'success', 'data' => $data]);
  }

  public function edit($id)
  {
    $userLogin = $this->userLogin;
    $rekening = Rekening::where('user_id', $userLogin->id)->get();
    $sumber = SumberPemasukan::where('user_id', $userLogin->id)->get();
    $data = Pemasukan::findOrFail($id);
    return view('pages.pemasukan.edit', ['data' => $data, 'rekening' => $rekening, 'sumber' => $sumber, 'userLogin' => $this->userLogin]);
  }

  public function update(Request $request, $id)
  {
    $data = $request->all();
    $userLogin = $this->userLogin;
    $data['user_id'] = $userLogin->id;
    $pemasukan = Pemasukan::findOrFail($id);

    if (isset($data['saldo'])) {
      $data['saldo'] = preg_replace('/[^0-9]/', '', $data['saldo']);
    }
    // Konversi format tanggal
    if (isset($data['tanggal'])) {
      $data['tanggal'] = Carbon::createFromFormat('m/d/Y', $data['tanggal'])->format('Y-m-d');
    }

    $rekening = Rekening::findOrFail($data['rekening_id']);
    $rekening->saldo += $data['saldo'];
    $rekening->save();
    Alert::success('Success', 'Data berhasil diubah');
    $pemasukan->update($data);

    return redirect()->route('pemasukan.index');
    // return response()->json(['message' => 'success', 'data' => $pemasukan]);
  }

  public function destroy($id)
  {
    $pemasukan = Pemasukan::findOrFail($id);
    $pemasukan->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('pemasukan.index');
  }

}