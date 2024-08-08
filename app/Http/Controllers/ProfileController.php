<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    // dd($this->userLogin);
    return view('pages.profile.edit', ['userLogin' => $this->userLogin]);
  }
}
