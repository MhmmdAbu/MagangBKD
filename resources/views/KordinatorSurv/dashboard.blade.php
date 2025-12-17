@extends('Layout.LayoutKorSur')

@section('title','Dashboard')

@section('content')
<div class="summary">
    <div class="summary-item">
        <div class="summary-icon folder">📁</div>
        <div class="summary-text">Semua Berkas</div>
        <div class="summary-count">{{ $totalSemua }}</div>
    </div>

    <div class="summary-item">
        <div class="summary-icon hourglass">⏳</div>
        <div class="summary-text">Berkas Menunggu</div>
        <div class="summary-count">{{ $totalMenunggu }}</div>
    </div>

    <div class="summary-item">
        <div class="summary-icon checkbox">☑️</div>
        <div class="summary-text">Berkas Selesai</div>
        <div class="summary-count">{{ $totalSelesai }}</div>
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
            @foreach ($permohonanPerTahun as $row)
                <tr>
                    <td>{{ $row->tahun }}</td>
                    <td>{{ $row->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection