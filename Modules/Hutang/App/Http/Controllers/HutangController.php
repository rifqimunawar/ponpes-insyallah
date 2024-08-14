<?php

namespace Modules\Hutang\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

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
    return view('hutang::index', ['userLogin' => $this->userLogin]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('hutang::create', ['userLogin' => $this->userLogin]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request) : RedirectResponse
  {
    //
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
    return view('hutang::edit', ['userLogin' => $this->userLogin]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, $id) : RedirectResponse
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
