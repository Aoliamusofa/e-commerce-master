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
                        <th>Metode pembayaran</th>
                        <th>Nomor Rekening</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($data as $row)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $row->metode_pembayaran }}</td>
                        <td>{{ $row->nomor_rekening ?? "Null" }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $row->id_pembayaran }}">
                                Edit
                            </button>
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus{{ $row->id_pembayaran }}">
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
                <h5 class="modal-title" id="exampleModalLabel">Add {{ $title ?? '' }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/addpayment" class="forms-sample" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-4 col-form-label">Metode pembayaran</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" name=" metode_pembayaran" id="exampleInputEmail2" placeholder="nama metode pembayran">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-4 col-form-label">Nomor rekening</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" name="nomor_rekening" id="exampleInputEmail2" placeholder="nomor rekening">
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
{{-- end-modal pembayaran --}}

@foreach ($data as $val)
<!-- Modal update-->
<div class="modal fade" id="modalEdit{{ $val->id_pembayaran }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update {{ $title ?? '' }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/updatepayment" class="forms-sample" method="post">
                    @csrf
                    <div class="form-group row">
                        <input type="hidden" name="id_pembayaran" value="{{ $val->id_pembayaran }}" class="form-control form-control-sm">
                        <label for="exampleInputEmail2" class="col-sm-4 col-form-label">Metode pembayaran</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm"" name=" metode_pembayaran" value="{{ $val->metode_pembayaran }}" id="exampleInputEmail2" placeholder="nama metode pembayran">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-4 col-form-label">Nomor rekening</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" name="nomor_rekening" value="{{$val->nomor_rekening}}" id="exampleInputEmail2" placeholder="nomor rekening">
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
{{-- end-modal update --}}

<!-- Modal delete -->
<div class="modal fade" id="modalHapus{{ $val->id_pembayaran }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a href="/deletepayment/{{ $val->id_pembayaran }}" class="btn btn-sm btn-gradient-danger me-2">Hapus</a>
            </div>
        </div>
    </div>
</div>
{{-- end-modal delete --}}
@endforeach
@endsection