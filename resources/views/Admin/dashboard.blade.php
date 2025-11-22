@extends('layout.layoutAdmin')

@section('title', 'Dashboard')

@section('content')
<div class="container">

    <div class="d-flex gap-3">
        <!-- Jumlah Pengguna -->
        <div class="card summary-card flex-fill">
            <div class="icon text-primary">
                <img src="{{ asset('images/pengguna-icon.png') }}" alt="Pengguna" style="width:54px; height:54px;" />
            </div>
            <div class="text-group">
                Jumlah Pengguna
                <div class="number">30</div>
            </div>
        </div>

        <!-- Jumlah Permohonan -->
        <div class="card summary-card flex-fill">
            <div class="icon text-warning">
                <img src="{{ asset('images/folder-icon.png') }}" alt="Permohonan" style="width:54px; height:54px;" />
            </div>
            <div class="text-group">
                Jumlah Permohonan
                <div class="number">30</div>
            </div>
        </div>
    </div>

    <div class="grid-container">
        <!-- Permohonan Pertahun -->
        <div class="card permohonan-pertahun">
            <h5>Permohonan Pertahun</h5>
            <table>
                <thead>
                    <tr><th>Tahun</th><th>Jumlah</th></tr>
                </thead>
                <tbody>
                    <tr><td>2019</td><td>45</td></tr>
                    <tr><td>2020</td><td>50</td></tr>
                    <tr><td>2021</td><td>60</td></tr>
                    <tr><td>2022</td><td>70</td></tr>
                    <tr><td>2023</td><td>80</td></tr>
                </tbody>
            </table>
        </div>

        <!-- Chart-wrapper kanan bawah -->
        <div class="right-charts">
            <div class="chart-wrapper">
                <h5>Semua Pengguna</h5>
                <canvas id="doughnutChart" class="chart-canvas"></canvas>
            </div>

            <div class="chart-wrapper">
                <h5>Jumlah Permohonan</h5>
                <canvas id="pieChart" class="chart-canvas"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('js/dashboardAdmin.js') }}"></script>
@endsection