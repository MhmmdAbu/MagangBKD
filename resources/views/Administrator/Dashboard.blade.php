@extends('Layout.Administrator')

@section('title','Dashboard')

@section('content')
<div class="summary">
    <div class="summary-item">
        <div class="summary-icon folder">📁</div>
        <div class="summary-text">Semua Berkas</div>
        <div class="summary-count">30</div>
    </div>
    <div class="summary-item">
        <div class="summary-icon hourglass">⏳</div>
        <div class="summary-text">Berkas Menunggu</div>
        <div class="summary-count">21</div>
    </div>
    <div class="summary-item">
        <div class="summary-icon checkbox">☑️</div>
        <div class="summary-text">Berkas Selesai</div>
        <div class="summary-count">9</div>
    </div>
</div>

<div class="permohonan-section">
    <div class="permohonan-title">Permohonan Pertahun</div>
    <table>
        <thead>
            <tr>
                <th>Tahun</th>
                <th>Jumlah Permohonan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2020</td>
                <td>5</td>
            </tr>
            <tr>
                <td>2021</td>
                <td>7</td>
            </tr>
            <tr>
                <td>2022</td>
                <td>8</td>
            </tr>
            <tr>
                <td>2023</td>
                <td>10</td>
            </tr>
            <tr>
                <td>2023</td>
                <td>10</td>
            </tr>
        </tbody>
    </table>

</div>
@endsection