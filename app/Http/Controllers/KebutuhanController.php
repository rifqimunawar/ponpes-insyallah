<?php

namespace App\Http\Controllers;

use App\Model\Kebutuhan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KebutuhanController extends Controller
{
  public function index()
  {
    $data = Kebutuhan::all();
    $title = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($title, $text);
    return view('pages.master.kebutuhan.index', ['data' => $data]);
  }

  public function create()
  {
    return view('pages.master.kebutuhan.create');
  }

  public function store(Request $request)
  {
    $data = $request->all();
    $newData = Kebutuhan::create($data);

    Alert::success('Success', 'Data berhasil ditambahkan');
    return redirect()->route('kebutuhan.index');
  }

  public function show($id)
  {
    $data = Kebutuhan::findOrFail($id);
    return response()->json(['message' => 'success', 'data' => $data]);
  }

  public function edit($id)
  {
    $data = Kebutuhan::findOrFail($id);
    return view('pages.master.kebutuhan.edit', ['data' => $data]);
  }

  public function update(Request $request, $id)
  {
    $data = $request->all();
    $updateData = Kebutuhan::findOrFail($id);
    $updateData->update($data);
    Alert::success('Success', 'Data berhasil diupdate');
    return redirect()->route('kebutuhan.index');
  }

  public function destroy($id)
  {
    $data = Kebutuhan::findOrFail($id);
    if ($data->pengeluarans()->count() > 0) {
      Alert::error('Error', 'Data tidak dapat dihapus karena memiliki relasi');
      return redirect()->route('kebutuhan.index');
    }
    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('kebutuhan.index');
  }
}