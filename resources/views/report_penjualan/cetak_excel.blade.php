<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Tanggal</th>
            <th>Agen</th>
        </tr>
    </thead>
    <tbody>
    @foreach($transaksi as $row)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $row->produk->nama_produk }}</td>
            <td>{{ $row->jumlah }}</td>
            <td>@rupiah($row->harga)</td>
            <td>{{ $row->transaksi->tgl_penjualan }}</td>
            <td>{{ $row->transaksi->agen->nama_toko }}</td>
        </tr>
    @endforeach
    </tbody>
</table>