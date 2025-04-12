<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter card-table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" width="1%">No</th>
                            <th class="text-center" width="8%">Kode Produk</th>
                            <th class="text-center" width="8%">Nama Produk</th>
                            <th class="text-center" width="10%">Harga Satuan</th>
                            <th class="text-center" width="5%">Total Item</th>
                            <th class="text-center" width="10%">Total Harga</th>
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
                                    <td class="text-center">{{ $s->nama_produk }}</td>
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
            </div>
        </div>
        @if ($detail->hasPages())
            <div class="d-flex justify-content-center">
                {{ $detail->links('vendor.pagination.bootstrap-5') }}
            </div>
        @endif
    </div>
</div>
