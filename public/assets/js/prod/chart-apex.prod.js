/*
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 5
Version: 5.3.3
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin/
*/

document.addEventListener('DOMContentLoaded', function () {
  // Tangkap elemen dengan id 'kegiatan-list'
  var kegiatanListElement = document.getElementById('kegiatan-list');
  // Ambil data JSON dari atribut data-kegiatans
  var kegiatanData = JSON.parse(kegiatanListElement.getAttribute('data-kegiatans'));

  // Pisahkan nama kegiatan dan total pengeluaran
  var labels = kegiatanData.map(function(kegiatan) {
      return kegiatan.name;
  });

  var series = kegiatanData.map(function(kegiatan) {
      return kegiatan.total_pengeluaran;
  });

  var options = {
      chart: {
          height: 365,
          type: 'pie',
      },
      stroke: {
          show: true,
          colors: [app.color.componentBg],
          width: 2,
          dashArray: 0
      },
      dataLabels: {
          dropShadow: {
              enabled: false,
              top: 1,
              left: 1,
              blur: 1,
              opacity: 0.45
          }
      },
      colors: [app.color.pink, app.color.orange, app.color.blue, app.color.success, app.color.indigo],
      labels: labels,
      series: series,
      title: {
          text: 'Pengeluaran Berdasarkan Kegiatan'
      }
  };

  var chart = new ApexCharts(
      document.querySelector('#apex-pie-chart'),
      options
  );

  chart.render();
});


document.addEventListener('DOMContentLoaded', function () {
  // Tangkap elemen dengan id 'kebutuhan-list'
  var kebutuhanListElement = document.getElementById('kebutuhan-list');
  // Ambil data JSON dari atribut data-kebutuhans
  var kebutuhanData = JSON.parse(kebutuhanListElement.getAttribute('data-kebutuhans'));

  // Pisahkan nama kebutuhan dan total pengeluaran
  var labels = kebutuhanData.map(function(kebutuhan) {
      return kebutuhan.name;
  });

  var series = kebutuhanData.map(function(kebutuhan) {
      return kebutuhan.total_pengeluaran;
  });

  var options = {
      chart: {
          height: 365,
          type: 'pie',
      },
      stroke: {
          show: true,
          colors: [app.color.componentBg],
          width: 2,
          dashArray: 0
      },
      dataLabels: {
          dropShadow: {
              enabled: false,
              top: 1,
              left: 1,
              blur: 1,
              opacity: 0.45
          }
      },
      colors: [app.color.pink, app.color.orange, app.color.blue, app.color.success, app.color.indigo],
      labels: labels,
      series: series,
      title: {
          text: 'Pengeluaran Berdasarkan Kebutuhan'
      }
  };

  var chart = new ApexCharts(
      document.querySelector('#apex-pie-chart2'),
      options
  );

  chart.render();
});