@extends('layout.landingpage')
@section('content')
    <div class="card mx-auto mt-5" style="width: 28rem;">
        <div class="card-body">
            <h5 class="card-title text-center">Login</h5>
            <form action="/auth" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control form-control-sm" name="email" id="exampleInputEmail1"
                        aria-describedby="emailHelp" autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control form-control-sm" name="password" id="exampleInputPassword1"
                        autocomplete="off">
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-sm btn-primary col-12">Login</button>
                    <p class="text-center mt-3">Belum memiliki akun ?, Silahkan
                        <a href="/register">Register</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection
