<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\SumberPemasukan;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SumberPemasukanController extends Controller
{
  public function index()
  {
    $userLogin = Auth::user();
    $data = SumberPemasukan::with('pemasukan')->get();

    foreach ($data as $sumber_pemasukan) {
      $sumber_pemasukan->total_pemasukan = $sumber_pemasukan->pemasukan->sum('saldo');
    }

    $title = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($title, $text);
    // dd($userLogin);
    return view('pages.master.sumber-pemasukan.index', ['data' => $data]);
  }

  public function create()
  {
    return view('pages.master.sumber-pemasukan.create');
  }
  public function store(Request $request)
  {
    $data = $request->all();
    $sumber_pemasukan = SumberPemasukan::create($data);

    Alert::success('Success', 'Data berhasil ditambahkan');
    return redirect()->route('sumber-pemasukan.index');
  }

  public function show($id)
  {
    $data = SumberPemasukan::findOrFail($id);
    return response()->json(['message' => 'success', 'data' => $data]);
  }

  public function edit($id)
  {
    $data = SumberPemasukan::findOrFail($id);
    return view('pages.master.sumber-pemasukan.edit', ['data' => $data]);
  }

  public function update(Request $request, $id)
  {
    $data = $request->all();
    $sumber_pemasukan = SumberPemasukan::findOrFail($id);
    $sumber_pemasukan->update($data);
    Alert::success('Success', 'Data berhasil diupdate');
    return redirect()->route('sumber-pemasukan.index');
  }


  public function destroy($id)
  {
    $data = SumberPemasukan::findOrFail($id);
    if ($data->pemasukan()->count() > 0) {
      Alert::error('Error', 'Data tidak dapat dihapus karena memiliki relasi');
      return redirect()->route('rekening.index');
    }
    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('sumber-pemasukan.index');
  }

}