<div class="container">
    <div class="row mt-4">
        <div class="col">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <th>No.</th>
                        <th>Tanggal Pesan</th>
                        <th>Nama Produk</th>
                        <th>Status</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                        <th>Hapus</th>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @forelse ($belanja as $pesanan)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$pesanan->created_at}}</td>
                            <td>
                                <img src="{{asset('storage/photos/'. $pesanan->gambar_produk)}}" alt="" srcset=""
                                    width="100" height="100">
                                <strong><span>{{$pesanan->nama_produk}}</span></strong>
                            </td>
                            <td>
                                @if ($pesanan->status == 0)
                                <strong>Pesanan belum ongkir</strong>
                                @endif
                            </td>
                            <td><strong>Rp. {{number_format($pesanan->harga_produk)}}</strong></td>
                            <td>
                                @if ($pesanan->status == 0)
                                <a href="{{url('tambahongkir/'.$pesanan->belanja_id)}}" class="btn btn-success">Tambah
                                    Ongkir</a>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-danger"
                                    wire:click="hapus_belanja({{$pesanan->belanja_id}})">Hapus
                                    Pesanan</button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td>DATA KOSONG</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>