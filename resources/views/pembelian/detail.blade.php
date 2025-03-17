<div class="row justify-content-center">
    <div class="col-md-10">
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th class="text-center" width="3%">No</th>
                    <th class="text-center" width="5%">Kode Produk</th>
                    <th width="25%">Nama Produk</th>
                    <th class="text-center" width="8%">Harga Satuan</th>
                    <th class="text-center" width="3%">Total Item</th>
                    <th class="text-center" width="8%">Total Harga</th>
                </tr>
            </thead>
            <tbody id="hasil-pencarian">
                @if ($detail->isNotEmpty())
                    @foreach ($detail as $index => $s)
                        <tr>
                            <td class="text-center">{{ $detail->firstItem() + $index }}</td>
                            <td class="text-center">
                                <span class="badge bg-success">{{ $s->kode_produk }}</span>
                            </td>
                            <td>{{ $s->nama_produk }}</td>
                            <td class="text-center">{{ number_format($s->harga_beli, 0, ',', '.') }}</td>
                            <td class="text-center">{{ $s->jumlah }}</td>
                            <td class="text-center">{{ number_format($s->subtotal, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center">Data tidak ditemukan.</td>
                    </tr>
                @endif
            </tbody>
        </table>
        @if ($detail->hasPages())
            <div class="d-flex justify-content-center">
                {{ $detail->links('vendor.pagination.bootstrap-5') }}
            </div>
        @endif
    </div>
</div>
