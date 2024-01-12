@extends('layout.template')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $title ?? '' }}</h4>
                <button type="button" class="btn btn-sm btn-success mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    Tambah data
                </button>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama kategori</th>
                            <th>Nama produk</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($data as $row)
                            <tr>
                                <td>{{ $i++ }}</td>
                                @foreach ($row->JoinToKategoriProduk as $byId)
                                    <td>{{ $byId->nama_katproduk }}</td>
                                @endforeach
                                <td>{{ $row->nama_produk }}</td>
                                <td>Rp. {{ $row->harga_barang }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalDetail{{ $row->id_produk }}">
                                        Detail
                                    </button>
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $row->id_produk }}">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalHapus{{ $row->id_produk }}">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal add-->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah {{ $title ?? '' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/addproduk" class="forms-sample" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleFormControlSelect3" class="col-sm-4 col-form-label">Nama kategori</label>
                            <div class="col-sm-8">
                                <select name="id_kat_produk" class="form-control form-control-sm"
                                    id="exampleFormControlSelect3">
                                    <option selected>pilih kategori produk</option>
                                    @foreach ($kategori as $val)
                                        <option value="{{ $val->id_kat_produk }}">
                                            {{ $val->nama_katproduk }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="#" class="col-sm-4 col-form-label">Nama produk</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm"" name="nama_produk"
                                    id="exampleInputEmail2" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="#" class="col-sm-4 col-form-label">Harga barang</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control form-control-sm"" name="harga_barang"
                                    id="exampleInputEmail2" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="#" class="col-sm-4 col-form-label">Stok barang</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm"" name="stok_barang"
                                    id="exampleInputEmail2" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="#" class="col-sm-4 col-form-label">Bahan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm"" name="bahan"
                                    id="exampleInputEmail2" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleTextarea1" class="col-sm-4 col-form-label">Deskripsi</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="deskripsi" id="exampleTextarea1" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="#" class="col-sm-4 col-form-label">Warna</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm"" name="warna"
                                    id="exampleInputEmail2" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="#" class="col-sm-4 col-form-label">Size</label>
                            <div class="col-sm-8">
                                @foreach ($sizing as $size)
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <input type="checkbox" class="form-check-input" name="size[]"
                                            value="{{ $size }}">
                                        {{ $size }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="#" class="col-sm-4 col-form-label">Foto produk</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control form-control-sm"" name="foto_produk">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-gradient-warning me-2"
                                data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-sm btn-gradient-success me-2"
                                data-bs-dismiss="modal">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end-modal add --}}
    @foreach ($data as $val)
        <!-- Modal detail-->
        <div class="modal fade" id="modalDetail{{ $val->id_produk }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail
                            {{ $title ?? '' }}{{ ' ' }}{{ $row->nama_produk }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mt-3">
                            <div class="col-10 pe-1 mx-auto">
                                <img src="{{ $val->foto_produk }}" class="mb-2 mw-100 w-100 rounded" alt="image">
                            </div>
                        </div>
                        @foreach ($val->JoinToKategoriProduk as $byId)
                            <p>Nama kategori : {{ $byId->nama_katproduk }}</p>
                        @endforeach
                        <p>Nama produk : {{ $val->nama_produk }}</p>
                        <p>Harga barang Rp. :{{ $val->harga_barang }}</p>
                        <p>Stok barang : {{ $val->stok_barang }}</p>
                        <p>Bahan : {{ $val->bahan }}</p>
                        <p>Deskripsi : {{ $val->deskripsi }}</p>
                        <p>Warna : {{ $val->warna }}</p>
                        <p>Size : {{ $val->size }}</p>
                    </div>
                </div>
            </div>
        </div>
        {{-- end-modal detail --}}

        {{-- modal edit data --}}
        <div class="modal fade" id="modalEdit{{ $val->id_produk }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit {{ $title ?? '' }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/updateproduk" class="forms-sample" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <input type="hidden" value="{{ $val->id_produk }}" name="id_produk"
                                    class="form-control">
                                <label for="exampleFormControlSelect3" class="col-sm-4 col-form-label">Nama
                                    kategori</label>
                                <div class="col-sm-8">
                                    <select name="id_kat_produk" class="form-control form-control-sm"
                                        id="exampleFormControlSelect3">
                                        <option selected value="{{ $val->id_kat_produk }}">
                                            @foreach ($val->JoinToKategoriProduk as $byId)
                                                {{ $byId->nama_katproduk }}
                                            @endforeach
                                        </option>
                                        @foreach ($kategori as $row)
                                            <option value="{{ $row->id_kat_produk }}">
                                                {{ $row->nama_katproduk }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="#" class="col-sm-4 col-form-label">Nama produk</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm"" name="nama_produk"
                                        id="exampleInputEmail2" value="{{ $val->nama_produk }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="#" class="col-sm-4 col-form-label">Harga barang</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control form-control-sm"" name="harga_barang"
                                        id="exampleInputEmail2" value="{{ $val->harga_barang }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="#" class="col-sm-4 col-form-label">Stok barang</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm"" name="stok_barang"
                                        id="exampleInputEmail2" value="{{ $val->stok_barang }}">
                                </div>
                            </div>
                            <div class="form-group
                                        row">
                                <label for="#" class="col-sm-4 col-form-label">Bahan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm"" name="bahan"
                                        id="exampleInputEmail2" value="{{ $val->bahan }}">
                                </div>
                            </div>
                            <div class="form-group
                                        row">
                                <label for="exampleTextarea1" class="col-sm-4 col-form-label">Deskripsi</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="deskripsi" id="exampleTextarea1" rows="4"> {{ $val->deskripsi }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="#" class="col-sm-4 col-form-label">Warna</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm"" name="warna"
                                        id="exampleInputEmail2" value="{{ $val->warna }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="#" class="col-sm-4 col-form-label">Size</label>
                                <div class="col-sm-8">
                                    @foreach ($sizing as $size)
                                        <label class="form-check-label" for="flexCheckDefault">
                                            <input type="checkbox" class="form-check-input" name="size[]"
                                                value="{{ $size }}">
                                            {{ $size }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="#" class="col-sm-4 col-form-label">Foto produk</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control form-control-sm" name="foto_produk">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-gradient-warning me-2"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-sm btn-gradient-success me-2"
                                    data-bs-dismiss="modal">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- end-modal edit data --}}


        <!-- Modal delete -->
        <div class="modal fade" id="modalHapus{{ $val->id_produk }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus {{ $title ?? '' }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">Yakin ingin menghapus data ini ..?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-gradient-warning me-2"
                            data-bs-dismiss="modal">Cancel</button>
                        <a href="/deleteproduk/{{ $val->id_produk }}"
                            class="btn btn-sm btn-gradient-danger me-2">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- end modal delete --}}
    @endforeach
@endsection
