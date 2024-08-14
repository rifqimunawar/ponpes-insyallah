<?php

namespace App\Http\Controllers;

use App\Model\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class KegiatanController extends Controller
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
    $data = Kegiatan::where('user_id', $userLogin->id)->with('pengeluarans')->get();
    // Tambahkan total pengeluaran ke setiap kegiatan
    foreach ($data as $kegiatan) {
      $kegiatan->total_pengeluaran = $kegiatan->pengeluarans->sum('saldo');
    }

    $title = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($title, $text);
    return view('pages.master.kegiatan.index', ['data' => $data, 'userLogin' => $this->userLogin]);
  }


  public function create()
  {
    return view('pages.master.kegiatan.create', ['userLogin' => $this->userLogin]);
  }

  public function store(Request $request)
  {
    $data = $request->all();
    $userLogin = $this->userLogin;
    $data['user_id'] = $userLogin->id;
    $newData = Kegiatan::create($data);

    Alert::success('Success', 'Data berhasil ditambahkan');
    return redirect()->route('kegiatan.index');
  }

  public function show($id)
  {
    $data = Kegiatan::findOrFail($id);
    return response()->json(['message' => 'success', 'data' => $data]);
  }

  public function edit($id)
  {
    $data = Kegiatan::findOrFail($id);
    return view('pages.master.kegiatan.edit', ['data' => $data, 'userLogin' => $this->userLogin]);
  }

  public function update(Request $request, $id)
  {
    $data = $request->all();
    $userLogin = $this->userLogin;
    $data['user_id'] = $userLogin->id;
    $kegiatan = Kegiatan::findOrFail($id);
    $kegiatan->update($data);
    Alert::success('Success', 'Data berhasil diupdate');
    return redirect()->route('kegiatan.index');
  }

  public function destroy($id)
  {
    $data = Kegiatan::findOrFail($id);
    if ($data->pengeluarans()->count() > 0) {
      Alert::error('Error', 'Data tidak dapat dihapus karena memiliki relasi');
      return redirect()->route('kegiatan.index');
    }
    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('kegiatan.index');
  }

}