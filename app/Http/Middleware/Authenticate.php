<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  protected function redirectTo(Request $request) : ?string
  {
    Alert::error('Gagal....', 'Anda Harus Login');
    return
      $request->expectsJson() ? null : route('login');
  }
}
