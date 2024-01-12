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
                        <th>Nama akun</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($data as $row)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->jk ?? 'null' }}</td>
                        <td>{{ $row->tlp ?? 'null' }}</td>
                        <td>{{ $row->alamat ?? 'null' }}</td>
                        <td>{{ $row->role }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $row->user_id }}">
                                Edit
                            </button>
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus{{ $row->user_id }}">
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
                <form action="/adduser" class="forms-sample" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-4 col-form-label">Nama lengkap</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm"" name=" nama" placeholder="nama lengkap">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm"" name=" email" placeholder="nama lengkap">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control form-control-sm"" name=" password" placeholder="masukkan password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleFormControlSelect3" class="col-sm-4 col-form-label">Role</label>
                        <div class="col-sm-8">
                            <select name="role" class="form-control form-control-sm" id="exampleFormControlSelect3">
                                <option selected>pilih role</option>
                                <option value="admin">Admin</option>
                                <option value="pelanggan">Pelanggan</option>
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
@foreach ($data as $val)
<!-- Modal update-->
<div class="modal fade" id="modalEdit{{ $val->user_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update {{ $title ?? '' }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/adduser" class="forms-sample" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-4 col-form-label">Nama lengkap</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm"" name=" nama" value="{{ $val->nama }}" placeholder="nama lengkap">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm"" name=" email" value="{{ $val->email }}" placeholder="nama lengkap">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-4 col-form-label">Telepon</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm"" name=" tlp" value="{{ $val->tlp }}" placeholder="nama lengkap">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-4 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm"" name=" alamat" value="{{ $val->alamat }}" placeholder="masukkan alamat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-4 col-form-label">Gender</label>
                        <div class="col-sm-8">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="jk" id="optionsRadios1" value="L">
                                Perempuan
                                <i class="input-helper"></i>
                            </label>
                            <label class="form-check-label ml-1">
                                <input type="radio" class="form-check-input" name="jk" id="optionsRadios1" value="P">
                                Laki-Laki
                                <i class="input-helper"></i>
                            </label>
                        </div>
                        {{-- <label for="exampleInputEmail2" class="col-sm-4 col-form-label">Gender</label>
                                <div class="col-sm-8">
                                    <input type="radio" class="form-control form-control-sm"" name="jk"
                                        placeholder="masukkan password">
                                </div> --}}
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

<!-- Modal delete -->
<div class="modal fade" id="modalHapus{{ $val->user_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a href="/deleteuser/{{ $val->user_id }}" class="btn btn-sm btn-gradient-danger me-2">Hapus</a>
            </div>
        </div>
    </div>
</div>
{{-- end-modal delete --}}
@endforeach
@endsection
<!-- <label class="form-check-label">
    <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value=""> Default
    <i class="input-helper"></i></label> -->