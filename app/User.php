<?php

namespace App;

use App\Model\Rekening;
use App\Model\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Galery\App\Models\Galery;

class User extends Authenticatable
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'email',
    'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];
  public function role()
  {
    return $this->belongsTo(Role::class);
  }
  public function rekenings()
  {
    return $this->hasMany(Rekening::class);
  }
  public function galeries()
  {
    return $this->hasMany(Galery::class);
  }
}
