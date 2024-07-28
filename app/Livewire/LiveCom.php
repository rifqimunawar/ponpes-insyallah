<?php

namespace App\Livewire;

use Livewire\Component;

class LiveCom extends Component
{
  public $nama = "hello";

  public function render()
  {
    return view('livewire.live-com');
  }
}
