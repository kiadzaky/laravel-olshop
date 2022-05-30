<div class="container">
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form wire:submit.prevent="store">
                <label for="nama_produk" class="form-label">Nama Produk</label>

                <input type="text" id="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror"
                    wire:model="nama_produk" value="{{old('nama_produk')}}" required autocomplete="nama_produk"
                    autofocus>
                @error('nama_produk')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror

                <label for="harga_produk" class="form-label">Harga Produk</label>

                <input type="number" id="harga_produk" class="form-control @error('harga_produk') is-invalid @enderror"
                    wire:model="harga_produk" value="{{old('harga_produk')}}" required autocomplete="harga_produk"
                    autofocus>
                @error('harga_produk')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror

                <label for="berat_produk" class="form-label">Berat Produk</label>

                <input type="number" id="berat_produk" class="form-control @error('berat_produk') is-invalid @enderror"
                    wire:model="berat_produk" value="{{old('berat_produk')}}" required autocomplete="berat_produk"
                    autofocus>
                @error('harga_produk')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror

                <label for="gambar_produk" class="form-label">Gambar Produk</label>

                <input type="file" id="gambar_produk" class="form-control @error('gambar_produk') is-invalid @enderror"
                    wire:model="gambar_produk" value="{{old('gambar_produk')}}" required>
                @error('harga_produk')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
                <br>
                <button type="submit" class="btn btn-success">Tambah Produk</button>
            </form>
        </div>
    </div>
</div>