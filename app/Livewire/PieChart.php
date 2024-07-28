<?php

namespace App\Livewire;

use App\Model\Kegiatan;
use Livewire\Component;
use App\Model\Kebutuhan;
use App\Model\Pengeluaran;

class PieChart extends Component
{
  public $kegiatans;
  public $kebutuhans;
  public $tanggal_awal;
  public $tanggal_akhir;
  public $total_pengeluaran;

  public function mount()
  {
    $this->tanggal_awal = '07/01/2024';
    $this->tanggal_akhir = '07/30/2024';
    // $this->tanggal_awal = '2024-07-01';
    // $this->tanggal_akhir = '2024-07-31';

    $this->kegiatans = Kegiatan::whereHas('pengeluarans', function ($query) {
      $query->whereBetween('tanggal', [$this->tanggal_awal, $this->tanggal_akhir]);
    })->with('pengeluarans')->get();
    foreach ($this->kegiatans as $kegiatan) {
      $kegiatan->total_pengeluaran = $kegiatan->pengeluarans->sum('saldo');
    }

    $this->kebutuhans = Kebutuhan::whereHas('pengeluarans', function ($query) {
      $query->whereBetween('tanggal', [$this->tanggal_awal, $this->tanggal_akhir]);
    })->with('pengeluarans')->get();
    foreach ($this->kebutuhans as $kebutuhan) {
      $kebutuhan->total_pengeluaran = $kebutuhan->pengeluarans->sum('saldo');
    }

    $this->total_pengeluaran = Pengeluaran::whereBetween('tanggal', [$this->tanggal_awal, $this->tanggal_akhir])
      ->sum('saldo');
  }

  public function render()
  {
    return view('livewire.pie-chart');
  }
}


