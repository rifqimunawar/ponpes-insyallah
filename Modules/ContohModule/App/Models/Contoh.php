<?php

namespace Modules\ContohModule\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\ContohModule\Database\factories\ContohFactory;

class Contoh extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected static function newFactory(): ContohFactory
    {
        //return ContohFactory::new();
    }
}
