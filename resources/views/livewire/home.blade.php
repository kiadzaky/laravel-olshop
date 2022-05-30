<div class="container">
    @if(Auth::user())
    @if(Auth::user()->level == 1)
    <div class="col-md-3">
        <a href="{{url('tambahproduk')}}" class="btn btn-success btn-block" target="_blank"
            rel="noopener noreferrer">TAMBAH PRODUK</a>
    </div>
    @endif
    @endif
    <br>
    <div class="row">
        <div class="col-md-4">
            <input type="text" wire:model="cari" class="form-control" placeholder="Cari....">
        </div>
    </div>
    <section class="products mb-4">
        <div class="row mt-4">
            @foreach($products as $product)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-body text-center">
                        <img class="img-fluid" src="{{asset('storage/photos/'. $product->gambar_produk)}}"
                            alt="{{$product->nama_produk}}" width="270px" height="270px">
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <h5><strong>{{$product->nama_produk}} ({{$product->berat_produk}} KG)</strong></h5>
                                <span>Rp. {{number_format($product->harga_produk)}},-</span>
                                <br>
                                <button wire:click="beli({{$product->produk_id}})"
                                    class="btn btn-block btn-success">BELI
                                    SEKARANG</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>