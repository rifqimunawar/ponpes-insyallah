<?php

namespace App\Http\Controllers;

use App\Model\Kebutuhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class KebutuhanController extends Controller
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
    $data = Kebutuhan::where('user_id', $userLogin->id)->with('pengeluarans')->get();

    foreach ($data as $kebutuhan) {
      $kebutuhan->total_pengeluaran = $kebutuhan->pengeluarans->sum('saldo');
    }

    // dd($userLogin);
    $title = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($title, $text);
    return view('pages.master.kebutuhan.index', ['data' => $data, 'userLogin' => $this->userLogin]);
  }

  public function create()
  {
    return view('pages.master.kebutuhan.create', ['userLogin' => $this->userLogin]);
  }

  public function store(Request $request)
  {
    $data = $request->all();
    $userLogin = $this->userLogin;
    $data['user_id'] = $userLogin->id;
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
    return view('pages.master.kebutuhan.edit', ['data' => $data, 'userLogin' => $this->userLogin]);
  }

  public function update(Request $request, $id)
  {
    $data = $request->all();
    $userLogin = $this->userLogin;
    $data['user_id'] = $userLogin->id;
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