<?php

namespace Modules\Hutang\App\Http\Controllers;

use App\Model\Rekening;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Modules\Hutang\App\Models\Hutang;
use RealRashid\SweetAlert\Facades\Alert;

class HutangController extends Controller
{
  protected $userLogin;

  public function __construct()
  {

    $this->middleware(function ($request, $next) {
      $this->userLogin = Auth::user();
      return $next($request);
    });
  }
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $userLogin = $this->userLogin;
    $data = Hutang::where('user_id', $userLogin->id)->with('rekening')->get();
    return view('hutang::index', ['data' => $data, 'userLogin' => $this->userLogin]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $userLogin = $this->userLogin;
    $rekening = Rekening::where('user_id', $userLogin->id)->get();
    return view('hutang::create', ['rekening' =>$rekening, 'userLogin' => $this->userLogin]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request) 
  {
    $data = $request->all();
    $userLogin = $this->userLogin;
    $data['user_id'] = $userLogin->id;
    if (isset($data['nominal'])) {
      $data['nominal'] = preg_replace('/[^0-9]/', '', $data['nominal']);
    }

    // Konversi format tanggal
    if (isset($data['tanggal'])) {
      $data['tanggal'] = Carbon::createFromFormat('m/d/Y', $data['tanggal'])->format('Y-m-d');
    }

       // Menyimpan gambar jika ada
    if ($request->hasFile('img_struk')) {
        $img_struk = $request->file('img_struk');
        $extension = $img_struk->getClientOriginalExtension();
        $newFileName = 'Struk_hutang_' . $userLogin->name . '-' . now()->timestamp . '.' . $extension;
        $img_struk->move(public_path('/assets/img/Struk'), $newFileName);
        $data['img_struk'] = $newFileName;
    }
    $rekening = Rekening::findOrFail($data['rekening_tujuan_id']);
    $rekening->saldo += $data['nominal'];
    $rekening->save();

    $hutang = Hutang::create($data);
    Alert::success('Success', 'Data berhasil ditambahkan');
    return redirect()->route('hutang.index');
  }

  /**
   * Show the specified resource.
   */
  public function show($id)
  {
    return view('hutang::show', ['userLogin' => $this->userLogin]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit($id)
  {
    $userLogin = $this->userLogin;
    $rekening = Rekening::where('user_id', $userLogin->id)->get();
    $data = Hutang::where('user_id', $userLogin->id)->where('id', $id)->first();
    // dd($data);
    return view('hutang::edit', ['data'=>$data,'rekening'=>$rekening, 'userLogin' => $this->userLogin]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, $id) 
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy($id)
  {
    //
  }
}