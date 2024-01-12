@extends('layout.template')
@section('content')
    <h4 class="text-center mt-2 text-primary">Produk T-Shirt</h4>
    <div class="row row-cols-1 row-cols-md-5 g-4 mt-2">
        @foreach ($data as $val)
            <div class="col">
                <div class="card h-100">
                    <a href="/detail/{{ $val->id_produk }}" class="text-decoration-none">
                        <img src="{{ $val->foto_produk }}" class="card-img-top py-2" alt="404">
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ $val->nama_produk }}</h5>
                            <p class="card-text text-primary">Rp. {{ $val->harga_barang }}</p>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
