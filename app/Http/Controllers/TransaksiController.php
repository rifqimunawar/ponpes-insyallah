<?php

namespace App\Http\Controllers;

use App\Model\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
  public function index()
  {
      $response = Transaksi::all();
      return response()->json(['data' => $response]);
  }

  public function store(Request $request)
  {
      $data = $request->all();
      $transaksi = Transaksi::create($data);
  
      return response()->json(['message' => 'success']);
  }

  public function show($id)
  {
      $data = Transaksi::findOrFail($id);
      return response()->json(['message' => 'success', 'data' => $data]);
  }

  public function edit($id)
  {
      $data = Transaksi::findOrFail($id);
      return response()->json(['message' => 'success', 'data' => $data]);
  }

  public function update(Request $request, $id)
  {
      $data = $request->all();
      $transaksi = Transaksi::findOrFail($id);
      $transaksi->update($data);

      return response()->json(['message' => 'success', 'data' => $transaksi]);
  }

  public function destroy($id)
  {
      $transaksi = Transaksi::findOrFail($id);
      $transaksi->delete();

      return response()->json(['message' => 'success']);
  }
}