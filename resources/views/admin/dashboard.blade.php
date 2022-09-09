@extends('layout.adminlayout')
@section('title', 'Dashboard')
@section('header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page" style="color: white">Dashboard</li>
    </ol>
@endsection
@section('content')
    <div class="info d-flex">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h1 class="card-title">{{ $totalAgen }}</h1>
                <p class="card-text">Jumlah User/Agen</p>
            </div>
        </div>
        <div class="card ms-3" style="width: 18rem;">
            <div class="card-body">
                <h1 class="card-title">{{ $totalBaNoKa }}</h1>
                <p class="card-text">Jumlah Berita Acara Nota Kapal</p>
            </div>
        </div>
        <div class="card ms-3" style="width: 18rem;">
            <div class="card-body">
                <h1 class="card-title">{{ $totalBaNoSa }}</h1>
                <p class="card-text">Jumlah Berita Acara Nota Sampah Kapal</p>
            </div>
        </div>
        <div class="card ms-3" style="width: 18rem;">
            <div class="card-body">
                <h1 class="card-title">{{ $totalBanoPPKB }}</h1>
                <p class="card-text">Jumlah Berita Acara Penghapusan PPKB</p>
            </div>
        </div>
    </div>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
@endsection
{{-- <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['bar']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable({{ Js::from($result) }});

        var options = {
            chart: {
                title: 'Website Performance',
                subtitle: 'Click and Views',
            },
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script> --}}