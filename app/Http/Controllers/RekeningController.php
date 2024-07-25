<?php

namespace App\Http\Controllers;

use App\Model\Rekening;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RekeningController extends Controller
{
  public function index()
  {
    $data = Rekening::all();
    $title = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($title, $text);
    return view('pages.master.rekening.index', ['data' => $data]);
  }
  public function create()
  {
    return view('pages.master.rekening.create');
  }

  public function store(Request $request)
  {
    $data = $request->all();
    $rekening = Rekening::create($data);

    Alert::success('Success', 'Data berhasil ditambahkan');
    return redirect()->route('rekening.index');
  }

  public function edit($id)
  {
    $data = Rekening::findOrFail($id);
    return view('pages.master.rekening.edit', ['data' => $data]);
  }

  public function update(Request $request, $id)
  {
    $data = $request->all();
    $rekening = Rekening::findOrFail($id);
    $rekening->update($data);
    Alert::success('Success', 'Data berhasil diupdate');
    return redirect()->route('rekening.index');
  }

  public function destroy($id)
  {
    $rekening = Rekening::findOrFail($id);
    if ($rekening->pengeluarans()->count() > 0) {
      Alert::error('Error', 'Data tidak dapat dihapus karena memiliki relasi');
      return redirect()->route('rekening.index');
    }
    $rekening->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('rekening.index');
  }

}