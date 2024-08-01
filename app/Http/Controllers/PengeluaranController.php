<?php

namespace App\Http\Controllers;

use App\Model\Kegiatan;
use App\Model\Rekening;
use App\Model\Kebutuhan;
use App\Model\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PengeluaranController extends Controller
{
  public function index()
  {
    $pengeluarans = Pengeluaran::with('kegiatan')->get();
    $title = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($title, $text);
    return view('pages.pengeluaran.index', ['data' => $pengeluarans]);
  }

  public function create()
  {
    $rekening = Rekening::all();
    $kegiatan = Kegiatan::all();
    $kebutuhan = Kebutuhan::all();
    return view('pages.pengeluaran.create', ['rekening' => $rekening, 'kegiatan' => $kegiatan, 'kebutuhan' => $kebutuhan]);
  }
  public function store(Request $request)
  {
    $data = $request->all();
    $userLogin = Auth::user();
    $data['user_id'] = $userLogin->id;

    if (isset($data['saldo'])) {
      $data['saldo'] = preg_replace('/[^0-9]/', '', $data['saldo']);
    }

    // Konversi format tanggal
    if (isset($data['tanggal'])) {
      $data['tanggal'] = Carbon::createFromFormat('m/d/Y', $data['tanggal'])->format('Y-m-d');
    }


    $rekening = Rekening::findOrFail($data['rekening_id']);

    if ($rekening->saldo < $data['saldo']) {
      Alert::error('Oops...', 'Saldo di rekening ' . $rekening->name . ' tidak cukup');
      return redirect()->route('pengeluaran.create');
    }

    $rekening->saldo -= $data['saldo'];
    $rekening->save();

    $pengeluaran = Pengeluaran::create($data);

    Alert::success('Success', 'Data berhasil ditambahkan');
    return redirect()->route('pengeluaran.index');
  }



  public function show($id)
  {
    $data = Pengeluaran::findOrFail($id);
    return response()->json(['message' => 'success', 'data' => $data]);
  }

  public function edit($id)
  {
    $rekening = Rekening::all();
    $kegiatan = Kegiatan::all();
    $kebutuhan = Kebutuhan::all();
    $data = Pengeluaran::findOrFail($id);
    return view('pages.pengeluaran.edit', ['data' => $data, 'rekening' => $rekening, 'kegiatan' => $kegiatan, 'kebutuhan' => $kebutuhan]);
    // return response()->json(['message' => 'success', 'data' => $data]);
  }

  public function update(Request $request, $id)
  {
    $data = $request->all();
    $userLogin = Auth::user();
    $data['user_id'] = $userLogin->id;
    $pengeluaran = Pengeluaran::findOrFail($id);

    if (isset($data['saldo'])) {
      $data['saldo'] = preg_replace('/[^0-9]/', '', $data['saldo']);
    }

    // Konversi format tanggal
    if (isset($data['tanggal'])) {
      $data['tanggal'] = Carbon::createFromFormat('m/d/Y', $data['tanggal'])->format('Y-m-d');
    }

    $rekening = Rekening::findOrFail($data['rekening_id']);
    $rekening->saldo -= $data['saldo'];
    $rekening->save();

    $pengeluaran->update($data);
    Alert::success('Success', 'Data berhasil diubah');
    return redirect()->route('pengeluaran.index');
    // return response()->json(['message' => 'success', 'data' => $pengeluaran]);
  }

  public function destroy($id)
  {
    $pengeluaran = Pengeluaran::findOrFail($id);
    $pengeluaran->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    // return response()->json(['message' => 'success']);
    return redirect()->route('pengeluaran.index');
  }

}