<?php

namespace Modules\Galery\App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Modules\Galery\App\Models\Galery;
use RealRashid\SweetAlert\Facades\Alert;

class GaleryController extends Controller
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
    $data = Galery::latest()->get();

    // dd($data);
    return view('galery::index', ['data' => $data, 'userLogin' => $this->userLogin]);
  }


  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('galery::create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request) : RedirectResponse
  {
    $userLogin = $this->userLogin;

    // Buat instance baru dari model Galery
    $galery = new Galery();

    if ($request->hasFile('img')) {
      $img = $request->file('img');
      $extension = $img->getClientOriginalExtension();
      $newFileName = 'Galery' . '_' . $userLogin->name . '-' . now()->timestamp . '.' . $extension;
      $thumbFileName = 'Galery' . '_' . $userLogin->name . '-' . now()->timestamp . '-thumb.' . $extension;

      // Pindahkan file gambar asli ke direktori publik
      $img->move(public_path('/assets/img/gallery'), $newFileName);

      // Mendapatkan path file gambar
      $sourcePath = public_path('/assets/img/gallery/' . $newFileName);
      $destinationPath = public_path('/assets/img/gallery/' . $thumbFileName);

      $this->resizeImage($sourcePath, $destinationPath, 300, 188);

      $galery->img = $newFileName;
      $galery->img_thumbnail = $thumbFileName;
      $galery->user_id = $userLogin->id;
      $galery->save();
    }

    Alert::success('Success', 'Gambar Berhasil Ditambahkan');
    return redirect()->route('galery.index', ['userLogin' => $userLogin]);
  }

  /**
   * Show the specified resource.
   */
  public function show($id)
  {
    return view('galery::show');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit($id)
  {
    return view('galery::edit');
  }


  /**
   * Remove the specified resource from storage.
   */
  public function destroy($id)
  {
    //
  }


  private function resizeImage($sourcePath, $destinationPath, $newWidth, $newHeight)
  {
    // Mendapatkan informasi tentang gambar asli
    list($width, $height, $type) = getimagesize($sourcePath);

    // Hitung rasio gambar asli
    $aspectRatio = $width / $height;

    // Hitung dimensi baru yang sesuai dengan rasio aspek
    if ($newWidth / $newHeight > $aspectRatio) {
      $newWidth = $newHeight * $aspectRatio;
    } else {
      $newHeight = $newWidth / $aspectRatio;
    }

    // Membuat gambar baru dengan ukuran yang diinginkan
    $imageResized = imagecreatetruecolor($newWidth, $newHeight);

    // Membaca gambar berdasarkan jenisnya
    switch ($type) {
      case IMAGETYPE_JPEG:
        $imageSource = imagecreatefromjpeg($sourcePath);
        break;
      case IMAGETYPE_PNG:
        $imageSource = imagecreatefrompng($sourcePath);
        break;
      case IMAGETYPE_GIF:
        $imageSource = imagecreatefromgif($sourcePath);
        break;
      default:
        throw new \Exception('Unsupported image type.');
    }

    // Resize gambar
    imagecopyresampled($imageResized, $imageSource, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

    // Menyimpan gambar yang telah diresize ke file
    switch ($type) {
      case IMAGETYPE_JPEG:
        imagejpeg($imageResized, $destinationPath);
        break;
      case IMAGETYPE_PNG:
        imagepng($imageResized, $destinationPath);
        break;
      case IMAGETYPE_GIF:
        imagegif($imageResized, $destinationPath);
        break;
    }

    // Menghapus gambar dari memori
    imagedestroy($imageResized);
    imagedestroy($imageSource);
  }

}