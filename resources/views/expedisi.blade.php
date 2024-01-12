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
                            <th>Nama ekspedisi</th>
                            <th>Biaya ekspedisi</th>
                            <th>Jenis ekspedisi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($data as $row)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $row->nama_expedisi }}</td>
                                <td>{{ $row->biaya_expedisi }}</td>
                                <td>{{ $row->jenis_expedisi }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $row->id_expedisi }}">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalHapus{{ $row->id_expedisi }}">
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
                    <form action="/addekspedisi" class="forms-sample" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInput" class="col-sm-4 col-form-label">Nama ekspedisi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm"" name="nama_expedisi"
                                    id="exampleInput" placeholder="nama kategori produk">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInput" class="col-sm-4 col-form-label">Biaya ekspedisi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm"" name="biaya_expedisi"
                                    id="exampleInput" placeholder="nama kategori produk">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInput" class="col-sm-4 col-form-label">Jenis ekspedisi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm"" name="jenis_expedisi"
                                    id="exampleInput" placeholder="nama kategori produk">
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
        <div class="modal fade" id="modalEdit{{ $val->id_expedisi }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit {{ $title ?? '' }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/updateekspedisi" class="forms-sample" method="post">
                            @csrf
                            <div class="form-group row">
                                <input type="hidden" class="form-control" name="id_expedisi"
                                    value="{{ $val->id_expedisi }}" id="exampleInputEmail2"
                                    placeholder="nama kategori produk">
                            </div>
                            <div class="form-group row">
                                <label for="exampleInput" class="col-sm-4 col-form-label">Nama ekspedisi</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm"
                                        value="{{ $val->nama_expedisi }}" name="nama_expedisi" id="exampleInput"
                                        placeholder="biaya expedisi">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInput" class="col-sm-4 col-form-label">Biaya ekspedisi</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm"
                                        value="{{ $val->biaya_expedisi }}" name="biaya_expedisi" id="exampleInput"
                                        placeholder="biaya expedisi">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInput" class="col-sm-4 col-form-label">Jenis ekspedisi</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm"
                                        value="{{ $val->jenis_expedisi }}" name="jenis_expedisi" id="exampleInput"
                                        placeholder="jenis expedisi">
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
        <div class="modal fade" id="modalHapus{{ $val->id_expedisi }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <a href="/deleteekspedisi/{{ $val->id_expedisi }}"
                            class="btn btn-sm btn-gradient-danger me-2">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
