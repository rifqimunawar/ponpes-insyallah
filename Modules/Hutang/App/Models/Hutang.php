<?php

namespace Modules\Hutang\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Hutang\Database\factories\HutangFactory;

class Hutang extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected static function newFactory(): HutangFactory
    {
        //return HutangFactory::new();
    }
}
