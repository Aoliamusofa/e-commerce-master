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
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($data as $row)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $row->nama_katproduk }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $row->id_kat_produk }}">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalHapus{{ $row->id_kat_produk }}">
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
                    <form action="/addkategori" class="forms-sample" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-4 col-form-label">Nama kategori</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm"" name="nama_katproduk"
                                    id="exampleInputEmail2" placeholder="nama kategori produk">
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
    @foreach ($data as $val)
        <!-- Modal update -->
        <div class="modal fade" id="modalEdit{{ $val->id_kat_produk }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit {{ $title ?? '' }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/updtkategori" class="forms-sample" method="post">
                            @csrf
                            <div class="form-group row">
                                <input type="hidden" class="form-control" name="id_kat_produk"
                                    value="{{ $val->id_kat_produk }}" id="exampleInputEmail2"
                                    placeholder="nama kategori produk">
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-4 col-form-label">Nama kategori</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" name="nama_katproduk"
                                        value="{{ $val->nama_katproduk }}" id="exampleInputEmail2"
                                        placeholder="nama kategori produk">
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

        <!-- Modal delete -->
        <div class="modal fade" id="modalHapus{{ $val->id_kat_produk }}" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                        <a href="/deletekategori/{{ $val->id_kat_produk }}"
                            class="btn btn-sm btn-gradient-danger me-2">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
