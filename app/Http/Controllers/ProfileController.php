<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Galery\App\Models\Galery;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\Laravel\Facades\Image;

class ProfileController extends Controller
{
  protected $userLogin;

  public function __construct()
  {
    $this->middleware(function ($request, $next) {
      $this->userLogin = Auth::user();
      return $next($request);
    });
  }

  public function edit($id)
  {
    $data = User::findOrFail($id);
    // dd($data);
    return view('pages.profile.edit', ['userLogin' => $this->userLogin, 'data' => $data]);
  }

  public function foto(Request $request)
  {
    // dd($request);
    $userLogin = $this->userLogin;
    $foto_user = User::findOrFail($userLogin->id);

    if ($request->hasFile('avatar')) {
      $avatar = $request->file('avatar');
      $extension = $avatar->getClientOriginalExtension();
      $newFileName = 'avatar' . '_' . $userLogin->name . '-' . now()->timestamp . '.' . $extension;
      $avatar->move(public_path('/assets/img/user'), $newFileName);

      $foto_user->avatar = $newFileName;
      $foto_user->save();
    }

    Alert::success('Success', 'Gambar Berhasil Ditambahkan');
    return redirect()->route('dashboard', ['userLogin' => $userLogin]);
  }


  public function galery(Request $request)
  {

  }

}