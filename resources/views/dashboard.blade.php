@extends('layout.template')
@section('content')
{{-- header content --}}
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-view-dashboard"></i>
        </span> Dashboard
    </h3>
</div>
{{-- end-header content --}}

{{-- card dashboard --}}
<div class="row">
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('assets') }}/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Jumlah produk <i class="mdi mdi-tshirt-v mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5">{{ $data }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('assets') }}/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Jumlah terjual <i class="mdi mdi-shopping mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5">{{$terjual}}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('assets') }}/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Jumlah pesanan <i class="mdi mdi-cart mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5">{{$masuk}}</h2>
            </div>
        </div>
    </div>
</div>
{{-- end-card dashboard --}}
@endsection