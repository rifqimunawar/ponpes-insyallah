<?php

namespace Modules\Hutang\App\Models;

use App\Model\Rekening;
use Illuminate\Database\Eloquent\Model;
use Modules\Hutang\Database\factories\HutangFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hutang extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function rekening()
    {
      return $this->belongsTo(Rekening::class, 'rekening_tujuan_id');
    }
}