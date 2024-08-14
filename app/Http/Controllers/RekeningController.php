<?php

namespace App\Http\Controllers;

use App\Model\Rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class RekeningController extends Controller
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
    $data = Rekening::where('user_id', $userLogin->id)->get();
    $title = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($title, $text);
    return view('pages.master.rekening.index', ['data' => $data, 'userLogin' => $this->userLogin]);
  }

  public function create()
  {
    return view('pages.master.rekening.create', ['userLogin' => $this->userLogin]);
  }

  public function store(Request $request)
  {
    $data = $request->all();
    $userLogin = $this->userLogin;
    $data['user_id'] = $userLogin->id;
    $rekening = Rekening::create($data);

    Alert::success('Success', 'Data berhasil ditambahkan');
    return redirect()->route('rekening.index');
  }

  public function edit($id)
  {
    $data = Rekening::findOrFail($id);
    return view('pages.master.rekening.edit', ['data' => $data, 'userLogin' => $this->userLogin]);
  }

  public function update(Request $request, $id)
  {
    $data = $request->all();
    $userLogin = $this->userLogin;
    $data['user_id'] = $userLogin->id;
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