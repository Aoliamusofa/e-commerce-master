@extends('layout.landingpage')
@section('content')
    <h4 class="text-center mt-2 text-primary">Event T-Shirt</h4>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel mt-2">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('event') }}/benner.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('event') }}/benner.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <h4 class="text-center mt-2 text-primary">Produk T-Shirt</h4>
    <div class="row row-cols-1 row-cols-md-5 g-4 mt-2">
        @foreach ($data as $val)
            <div class="col">
                <div class="card h-100">
                    <a href="/detailproduk/{{ $val->id_produk }}" class="text-decoration-none">
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
