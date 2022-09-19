@extends('layout.adminlayout')
@section('title', 'Dashboard')
@section('content')
    <div class="row mb-5">
        <div class="col">
            <div class="info d-flex">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h1 class="card-title">{{ $totalAgen }}</h1>
                        <p class="card-text">Jumlah User/Agen</p>
                    </div>
                </div>
                <div class="card ms-3" style="width: 18rem;">
                    <div class="card-body">
                        <h1 class="card-title">{{ $totalBaNotaKapal }}</h1>
                        <p class="card-text">Jumlah Berita Acara Nota Kapal</p>
                    </div>
                </div>
                <div class="card ms-3" style="width: 18rem;">
                    <div class="card-body">
                        <h1 class="card-title">{{ $totalBaNotaSampah }}</h1>
                        <p class="card-text">Jumlah Berita Acara Nota Sampah Kapal</p>
                    </div>
                </div>
                <div class="card ms-3" style="width: 18rem;">
                    <div class="card-body">
                        <h1 class="card-title">{{ $totalBaPPKB }}</h1>
                        <p class="card-text">Jumlah Berita Acara Penghapusan PPKB</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div id="chart" style="width: 100%; height: 500px;"></div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            let data = google.visualization.arrayToDataTable({{ Js::from($charts) }});

            let chart = new google.charts.Bar(document.getElementById('chart'));
            let options = {
                bars: 'vertical',
            };

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
@endpush
