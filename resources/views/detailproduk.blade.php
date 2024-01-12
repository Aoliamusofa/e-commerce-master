@extends('layout.landingpage')
@section('content')
    @foreach ($databyid as $val)
        <div class="row">
            <div class="card w-50 mx-auto">
                <div class="row">
                    <h5 class="col-12 text-center text-primary mt-2">{{ $val->nama_produk }}</h5>
                    <div class="col-4">
                        <img src="{{ $val->foto_produk }}" alt="404" class="w-100">
                    </div>
                    <div class="col-8">
                        <div class="row">
                            <div class="col-4">
                                <p class="text-primary">Harga satuan</p>
                            </div>
                            <div class="col-8">
                                <p class="text-secondary">: Rp. {{ $val->harga_barang }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <p class="text-primary">Bahan</p>
                            </div>
                            <div class="col-8">
                                <p class="text-secondary">: {{ $val->bahan }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <p class="text-primary">Warna</p>
                            </div>
                            <div class="col-8">
                                <p class="text-secondary">: {{ $val->warna }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <p class="text-primary">Ukuran</p>
                            </div>
                            <div class="col-8">
                                <p class="text-secondary">: {{ $val->size }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <p class="text-primary">Jumlah stok</p>
                            </div>
                            <div class="col-8 ">
                                <p class="text-secondary">: {{ $val->stok_barang }}</p>
                            </div>
                        </div>
                    </div>
                    <p class="col-12" style="text-align: justify">{{ $val->deskripsi }}</p>
                    <a href="/" class="text-decoration-none btn btn-danger btn-sm col-2 mx-auto mb-4">Kembali</a>
                </div>
            </div>
        </div>
    @endforeach
@endsection
