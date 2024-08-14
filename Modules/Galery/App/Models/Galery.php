<?php

namespace Modules\Galery\App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Galery\Database\factories\GaleryFactory;

class Galery extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   */
  protected $guarded = ([]);

  protected static function newFactory() : GaleryFactory
  {
    //return GaleryFactory::new();
  }

  public function users()
  {
    return $this->belongsTo(User::class);
  }
}
