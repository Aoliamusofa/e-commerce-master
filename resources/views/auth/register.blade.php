@extends('layout.landingpage')
@section('content')
    <div class="card mx-auto mt-5" style="width: 28rem;">
        <div class="card-body">
            <h5 class="card-title text-center mb-3 mt-3">Register</h5>
            <form action="/registerpost" method="post">
                @csrf
                <div class="row">
                    <div class="col-6 mb-3">
                        <label class="form-label">Nama lengkap</label>
                        <input type="text" name="nama" class="form-control form-control-sm" placeholder="nama lengkap"
                            autocomplete="off">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control form-control-sm" placeholder="alamat email"
                            autocomplete="off">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control form-control-sm" placeholder="password"
                            autocomplete="off">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label">Jenis kelamin</label>
                        <input type="text" name="jk" class="form-control form-control-sm"
                            placeholder="jenis kelamin" autocomplete="off">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label class="form-label">Telepon</label>
                        <input type="text" name="tlp" class="form-control form-control-sm" placeholder="telepon"
                            autocomplete="off">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label">Alamat lengkap</label>
                        <input type="text" name="alamat" class="form-control form-control-sm"
                            placeholder="alamat lengkap" autocomplete="off">
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-sm btn-primary col-12">Register</button>
                    <p class="text-center mt-3">Sudah memiliki akun ?, Silahkan
                        <a href="/login">Login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection
