@extends('layout.template')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $title ?? '' }}</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pembeli</th>
                        <th>Nama produk</th>
                        <th>Warna</th>
                        <th>Expedisi</th>
                        <th>Payment</th>
                        <th>Jumlah order</th>
                        <th>Tanggal order</th>
                        <th>Bukti pembayaran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($data as $val)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $val->nama }}</td>
                        <td>{{ $val->nama_produk }}</td>
                        <td>{{ $val->warna }}</td>
                        <td>{{ $val->nama_expedisi }}</td>
                        <td>{{ $val->metode_pembayaran }}</td>
                        <td>{{ $val->jumlah_pesanan }} -pcs</td>
                        <td>{{ $val->tanggal_pesanan }}</td>
                        <td><img src="{{ $val->bukti_pembayaran}}" width="100" alt="404"></td>
                        <td>
                            <p class="text-danger">Pembayaran : {{ $val->status_pembayaran }}</p>
                            <p class="text-primary">Pesanan : {{ $val->status_pesanan }}</p>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalVerify{{ $val->id_pesanan }}">
                                Verify
                            </button>
                            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $val->id_pesanan }}">
                                Detail
                            </button>
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus{{ $val->id_pesanan }}">
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

@foreach($data as $row)
{{-- modal detail pesanan --}}
<div class="modal fade" id="modalDetail{{ $row->id_pesanan }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail pesanan {{ $title ?? '' }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mx-auto">
                        <div class=" d-flex py-3">
                            @if($row->bukti_pembayaran=="NULL")
                            <div class="col-12 d-flex align-items-center me-4 text-muted font-weight-light border border-primary">
                                <img src="{{$row->foto_produk}}" class="card-img-top" alt="">
                            </div>
                            @elseif($row->bukti_pembayaran!="NULL")
                            <div class="col-4 d-flex align-items-center me-4 text-muted font-weight-light">
                                <img src="{{$row->foto_produk}}" width="150" alt="">
                            </div>
                            <div class="col-8 d-flex align-items-center me-4 text-muted font-weight-light">
                                <img src="{{$row->bukti_pembayaran}}" width="150" alt="">
                            </div>
                            @endif
                        </div>
                        <div class=" d-flex py-3">
                            <div class="col-6 d-flex align-items-center me-4 text-muted font-weight-light">
                                <span class="text-primary">{{$row->nama_produk}},{{$row->size_order}}</span>
                            </div>
                            <div class="col-6 d-flex align-items-center me-4 text-muted font-weight-light">
                                <span class="text-primary">Rp. {{$row->total_produk + $row->biaya_expedisi}}</span>
                            </div>
                        </div>
                        <div class=" d-flex py-3">
                            <div class="col-6 d-flex align-items-center me-4 text-muted font-weight-light">
                                <span class="text-primary">{{$row->jumlah_pesanan}}.pcs</span>
                            </div>
                            <div class="col-6 d-flex align-items-center me-4 text-muted font-weight-light">
                                <span class="text-primary text-center">pembayaran {{$row->status_pembayaran}}</span>
                            </div>
                        </div>
                        <div class=" d-flex py-3">
                            <div class="col-6 d-flex align-items-center me-4 text-muted font-weight-light">
                                <span class="text-primary text-center">pesanan {{$row->status_pesanan}}</span>
                            </div>
                            <div class="col-6 d-flex align-items-center text-muted font-weight-light">
                                <span class="text-primary">{{$row->nama_expedisi}}(Rp.{{$row->biaya_expedisi}})</span>
                            </div>
                        </div>
                        <div class=" d-flex py-3">
                            <div class="col-6 d-flex align-items-center text-muted font-weight-light">
                                <span class="text-primary">Rp. {{ $row->harga_barang }} / pcs</span>
                            </div>
                            <div class="col-6 d-flex align-items-center text-muted font-weight-light">
                                <span class="text-primary">{{ $row->tanggal_pesanan }}</span>
                            </div>
                        </div>
                        <div class=" d-flex py-3">
                            <div class="col-12 d-flex align-items-center text-muted font-weight-light">
                                @if($row->status_pembayaran != "lunas")
                                <span class="text-primary text-danger">silahkan lakukan pembayaran terlebih dahulu</span>
                                @elseif($row->status_pembayaran == "lunas")
                                <span class="text-primary text-success">status pembayaran anda {{ $row->status_pembayaran }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-gradient-warning me-2" data-bs-dismiss="modal">Exit</button>
            </div>
        </div>
    </div>
</div>
{{-- end-modal detail pesanan --}}

{{-- modal verifikasi --}}
<div class="modal fade" id="modalVerify{{ $row->id_pesanan }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Verifikasi {{ $title ?? '' }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/updatepesanan" class="forms-sample" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <input type="hidden" value="{{ $row->id_pesanan }}" name="id_pesanan" class="form-control">
                        <label for="exampleFormControlSelect3" class="col-sm-4 col-form-label">
                            Status pembayaran
                        </label>
                        <div class="col-sm-8">
                            <select name="status_pembayaran" class="form-control form-control-sm" id="exampleFormControlSelect3">
                                <option selected value="{{ $row->status_pembayaran }}">
                                    {{ $row->status_pembayaran }}
                                </option>
                                <option value="pending">Pending</option>
                                <option value="verifikasi">Verifikasi</option>
                                <option value="lunas">Lunas</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleFormControlSelect3" class="col-sm-4 col-form-label">
                            Status pesanan
                        </label>
                        <div class="col-sm-8">
                            <select name="status_pesanan" class="form-control form-control-sm" id="exampleFormControlSelect3">
                                <option selected value="{{ $row->status_pesanan }}">
                                    {{ $row->status_pesanan }}
                                </option>
                                <option value="pending">Pending</option>
                                <option value="diterima">Diterima</option>
                                <option value="kirim">Kirim</option>
                                <option value="selesai">Selesai</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-gradient-warning me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-gradient-success me-2" data-bs-dismiss="modal">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- end-modal verifikasi --}}

<!-- Modal delete -->
<div class="modal fade" id="modalHapus{{ $row->id_pesanan }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <button type="button" class="btn btn-sm btn-gradient-warning me-2" data-bs-dismiss="modal">Cancel</button>
                <a href="/deletepesanan/{{ $row->id_pesanan }}" class="btn btn-sm btn-gradient-danger me-2">Hapus</a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection