<?php

return [

  /*
  |--------------------------------------------------------------------------
  | View Storage Paths
  |--------------------------------------------------------------------------
  |
  | Most templating systems load templates from disk. Here you may specify
  | an array of paths that should be checked for your views. Of course
  | the usual Laravel view path has already been registered for you.
  |
  */
  'menu' =>

    [
      [
        'icon' => 'fa fa-sitemap',
        'title' => 'Dashboard',
        'url' => '/dashboard',
        'route-name' => 'dashboard'
      ],
      [
        'icon' => 'icon-wallet',
        'title' => 'Transaksi',
        'url' => 'javascript:;',
        'caret' => true,
        'sub_menu' => [
          [
            'url' => '/pemindahan-saldo/create',
            'title' => 'Pemindahan Saldo',
            'route-name' => 'pemindahan-saldo.create'
          ],
          [
            'url' => '/pengeluaran',
            'title' => 'Pengeluaran',
            'route-name' => 'pengeluaran.index'
          ],
          [
            'url' => '/pemasukan',
            'title' => 'Pemasukan',
            'route-name' => 'pemasukan.index'
          ]


        ]
      ],
      [
        'icon' => 'icon-equalizer',
        'title' => 'Master',
        'url' => 'javascript:;',
        'sub_menu' => [
          [
            'url' => '/master/rekening',
            'title' => 'Rekening',
            'route-name' => 'rekening.index'
          ],
          [
            'url' => '/master/kegiatan',
            'title' => 'Kegiatan',
            'route-name' => 'kegiatan.index'
          ],
          [
            'url' => '/master/pemasukan',
            'title' => 'Sumber Pemasukan',
            'route-name' => 'sumber-pemasukan.index'
          ],
          [
            'url' => '/master/kebutuhan',
            'title' => 'Kebutuhan',
            'route-name' => 'kebutuhan.index'
          ]
        ]
      ],

    ]
];