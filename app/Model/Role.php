<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
  use HasFactory;
  protected $guarded = ([]);
  public function users()
  {
    return $this->hasMany(User::class);
  }
}
