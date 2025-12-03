<table class="table table-hover table-riwayat">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th style="width: 30%;">Nomor Surat</th>
            <th style="width: 20%;">Tanggal Dikirim</th>
            <th style="width: 20%;">Status Surat</th>
            <th style="width: 15%;">Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($riwayat as $index => $item)
            <tr>
                <td>{{ ($riwayat->currentPage()-1) * $riwayat->perPage() + ($index+1) }}</td>
                <td>{{ $item->nomor_surat_masuk }}</td>
                <td>{{ $item->created_at->format('d F Y') }}</td>
                <td>{{ $item->status }}</td>
                <td>
                    <a href="{{ route('pdf.preview', ['namaPDF'=>$item->file_blanko]) }}" target="_blank">
                        Lihat Surat
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada data</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-3">
    {{ $riwayat->appends(request()->query())->links() }}
</div>
