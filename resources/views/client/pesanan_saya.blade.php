@extends('layout.template')
@section('content')
<h4 class="text-center mb-2 text-primary">Pesannan saya</h4>
@foreach($data as $val)
@if($val->user_id == Auth::user()->user_id)
<div class="row mt-3">
    <div class="col-11 mx-auto card">
        <div class=" d-flex py-3">
            <div class="col-1 d-flex align-items-center me-4 text-muted font-weight-light">
                <img src="{{$val->foto_produk}}" width="100" alt="">
            </div>
            <div class="col-1 d-flex align-items-center me-4 text-muted font-weight-light">
                <span class="text-primary">{{$val->nama_produk}},{{$val->size_order}}</span>
            </div>
            <div class="col-2 d-flex align-items-center text-muted font-weight-light">
                <span class="text-primary">Rp.{{ $val->harga_barang }}/pcs</span>
            </div>
            <div class="col-1 d-flex align-items-center me-4 text-muted font-weight-light">
                <span class="text-primary">{{$val->jumlah_pesanan}}.pcs</span>
            </div>
            <div class="col-1 d-flex align-items-center text-muted font-weight-light">
                <span class="text-primary">{{$val->nama_expedisi}}(Rp.{{$val->biaya_expedisi}})</span>
            </div>
            <div class="col-1 d-flex align-items-center me-4 text-muted font-weight-light">
                <span class="text-primary">Total Tagihann Rp. {{$val->total_produk + $val->biaya_expedisi}}</span>
            </div>
            <div class="col-1 d-flex align-items-center me-4 text-muted font-weight-light">
                <span class="text-danger text-center">pesanan {{$val->status_pesanan}}</span>
            </div>
            <div class="col-1 d-flex align-items-center text-muted font-weight-light">
                <span class="text-primary">{{ $val->tanggal_pesanan }}</span>
            </div>
            <div class="col-1 d-flex align-items-center text-muted font-weight-light">
                <button type="button" class="btn btn-sm btn-info mb-2" data-bs-toggle="modal" data-bs-target="#modalDetail{{$val->id_pesanan}}">
                    Detail
                </button>
            </div>
            <div class="col-1 d-flex align-items-center text-muted font-weight-light">
                @if($val->status_pembayaran != "lunas")
                <button type="button" class="btn btn-sm btn-success mb-2" data-bs-toggle="modal" data-bs-target="#modalBuktiBayar{{$val->id_pesanan}}">
                    Bayar
                </button>
                @elseif($val->status_pembayaran == "lunas")
                <span class="text-success">status pembayaran anda {{ $val->status_pembayaran }}</span>
                @endif
            </div>
        </div>
    </div>
</div>
{{-- modal upload bukti pembayaran --}}
<div class="modal fade" id="modalBuktiBayar{{ $val->id_pesanan }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload bukti pembayaran {{ $title ?? '' }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/uploadbukti" class="forms-sample" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $val->id_pesanan }}" name="id_pesanan" class="form-control">
                    <input type="hidden" value="verifikasi" name="status_pembayaran" class="form-control">
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-4 col-form-label">Bukti pembayaran</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control form-control-sm" name="bukti_pembayaran" id="exampleInputEmail2" placeholder="file bukti pembayaran">
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
{{-- end-modal  upload bukti pembayaran --}}

{{-- modal detail pesanan --}}
<div class="modal fade" id="modalDetail{{ $val->id_pesanan }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            @if($val->bukti_pembayaran=="NULL")
                            <div class="col-12 d-flex align-items-center me-4 text-muted font-weight-light">
                                <img src="{{$val->foto_produk}}" width="100" alt="">
                            </div>
                            @elseif($val->bukti_pembayaran!="NULL")
                            <div class="col-6 d-flex align-items-center me-4 text-muted font-weight-light">
                                <img src="{{$val->foto_produk}}" width="100" alt="">
                            </div>
                            <div class="col-6 d-flex align-items-center me-4 text-muted font-weight-light">
                                <img src="{{$val->bukti_pembayaran}}" width="100" alt="">
                            </div>
                            @endif
                        </div>
                        <div class=" d-flex py-3">
                            <div class="col-6 d-flex align-items-center me-4 text-muted font-weight-light">
                                <span class="text-primary">{{$val->nama_produk}},{{$val->size_order}}</span>
                            </div>
                            <div class="col-6 d-flex align-items-center me-4 text-muted font-weight-light">
                                <span class="text-primary">Rp. {{$val->total_produk + $val->biaya_expedisi}}</span>
                            </div>
                        </div>
                        <div class=" d-flex py-3">
                            <div class="col-6 d-flex align-items-center me-4 text-muted font-weight-light">
                                <span class="text-primary">{{$val->jumlah_pesanan}}.pcs</span>
                            </div>
                            <div class="col-6 d-flex align-items-center me-4 text-muted font-weight-light">
                                <span class="text-primary text-center">pembayaran {{$val->status_pembayaran}}</span>
                            </div>
                        </div>
                        <div class=" d-flex py-3">
                            <div class="col-6 d-flex align-items-center me-4 text-muted font-weight-light">
                                <span class="text-primary text-center">pesanan {{$val->status_pesanan}}</span>
                            </div>
                            <div class="col-6 d-flex align-items-center text-muted font-weight-light">
                                <span class="text-primary">{{$val->nama_expedisi}}(Rp.{{$val->biaya_expedisi}})</span>
                            </div>
                        </div>
                        <div class=" d-flex py-3">
                            <div class="col-6 d-flex align-items-center text-muted font-weight-light">
                                <span class="text-primary">Rp. {{ $val->harga_barang }} / pcs</span>
                            </div>
                            <div class="col-6 d-flex align-items-center text-muted font-weight-light">
                                <span class="text-primary">{{ $val->tanggal_pesanan }}</span>
                            </div>
                        </div>
                        <div class=" d-flex py-3">
                            <div class="col-12 d-flex align-items-center text-muted font-weight-light">
                                @if($val->status_pembayaran != "lunas")
                                <span class="text-primary text-danger">silahkan lakukan pembayaran terlebih dahulu</span>
                                @elseif($val->status_pembayaran == "lunas")
                                <span class="text-primary text-success">status pembayaran anda {{ $val->status_pembayaran }}</span>
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
@endif
@endforeach
@endsection