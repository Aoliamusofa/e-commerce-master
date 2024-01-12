@extends('layout.template')
@section('content')
@foreach ($data as $val)
<form get-link-form="{{ route('addpesanan') }}" id="BeliProduk">
    <div class="col-8 grid-margin stretch-card mx-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">{{ $val->nama_produk }}</h4>
                <div class="row mt-3">
                    <div class="col-6 pe-1">
                        <img src="{{ $val->foto_produk }}" class="mw-100 w-100 rounded" alt="image">
                    </div>
                    <div class="col-6 ps-1">
                        <div class="d-flex py-3">
                            <div class="col-4 d-flex align-items-center me-4 text-muted font-weight-light">
                                <input type="hidden" name="id_produk" id="id_produk" value="{{$val->id_produk}}">
                                <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->user_id}}">
                                <span>Nama produk</span>
                            </div>
                            <div class="col-8 d-flex align-items-center text-muted font-weight-light">
                                <span>: {{ $val->nama_produk }}</span>
                            </div>
                        </div>
                        <div class=" d-flex py-3">
                            <div class="col-4 d-flex align-items-center me-4 text-muted font-weight-light">
                                <span>Harga satuan</span>
                            </div>
                            <div class="col-8 d-flex align-items-center text-muted font-weight-light">
                                <span>: Rp. {{ $val->harga_barang }}</span>
                                <input type="hidden" id="harga_barang" value="{{ $val->harga_barang }}">
                            </div>
                        </div>
                        <div class="d-flex py-3">
                            <div class="col-4 d-flex align-items-center me-4 text-muted font-weight-light">
                                <span>Bahan</span>
                            </div>
                            <div class="col-8 d-flex align-items-center text-muted font-weight-light">
                                <span>: {{ $val->bahan }}</span>
                            </div>
                        </div>
                        <div class="d-flex py-3">
                            <div class="col-4 d-flex align-items-center me-4 text-muted font-weight-light">
                                <span>Warna</span>
                            </div>
                            <div class="col-8 d-flex align-items-center text-muted font-weight-light">
                                <span>: {{ $val->warna }}</span>
                            </div>
                        </div>
                        <div class="d-flex py-3">
                            <div class="col-4 d-flex align-items-center me-4 text-muted font-weight-light">
                                <span>Ukuran</span>
                            </div>
                            <div class="col-8 d-flex align-items-center text-muted font-weight-light">:
                                <?php $pecahString = explode(',', $val->size); ?>
                                @foreach ($pecahString as $substr)
                                <input class="form-check-input px-1" type="radio" name="size_order" value="{{ $substr }}" id="size_order">
                                <label class="form-check-label px-2">{{ $substr }}</label>
                                @endforeach
                            </div>
                        </div>
                        <div class="d-flex py-3">
                            <div class="col-4 d-flex align-items-center me-4 text-muted font-weight-light">
                                <span>Jumlah order</span>
                            </div>
                            <div class="col-8 d-flex align-items-center text-muted font-weight-light">
                                <input type="number" class="form-control form-control-sm" name="jumlah_pesanan" id="jumlah_pesanan" placeholder="masukkan jumlah pesanan">
                            </div>
                        </div>
                        <div class="d-flex py-3">
                            <div class="col-4 d-flex align-items-center me-4 text-muted font-weight-light">
                                <span>Total produk</span>
                            </div>
                            <div class="col-8 d-flex align-items-center text-muted font-weight-light">
                                <input type="number" class="form-control form-control-sm" name="total_produk" id="total_produk" readonly>
                            </div>
                        </div>
                    </div>
                    <p class="col-12 mb-1 mt-1" style="text-align: justify">{{ $val->deskripsi }}</p>
                    <button type="button" class="btn btn-success btn-sm me-2 col-2" id="PesanLangsung">
                        Beli produk
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal pesan-->
    <div class="modal fade" id="modalPesan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Checkout {{ $title ?? '' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group row">
                        <label for="exampleFormControlSelect3" class="col-sm-4 col-form-label">Jasa kirim</label>
                        <div class="col-sm-8">
                            <select id="id_expedisi" name="id_expedisi" class="form-control form-control-sm">
                                <option selected>pilih expedisi</option>
                                @foreach ($expedisi as $exp)
                                <option value="{{ $exp->id_expedisi }}">
                                    {{ $exp->nama_expedisi }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleFormControlSelect3" class="col-sm-4 col-form-label">Metode pembayaran</label>
                        <div class="col-sm-8">
                            <select id="id_pembayaran" name="id_pembayaran" class="form-control form-control-sm">
                                <option selected disabled>pilih metode pembayaran</option>
                                @foreach ($payment as $pay)
                                <option value="{{ $pay->id_pembayaran }}">
                                    {{ $pay->metode_pembayaran }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInput" class="col-sm-4 col-form-label">Pesan pembeli</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" name="tinggalkan_pesan" id="tinggalkan_pesan" id="exampleInput" placeholder="tinggalkan pesan">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-gradient-warning me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" id="submit-data-pesanan" class="btn btn-sm btn-gradient-success me-2" data-bs-dismiss="modal">Checkout</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal pesan-->
<!-- <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script> -->
<script type="text/javascript">
    // fungsi untuk menghitung total
    $(document).ready(function() {
        $("#jumlah_pesanan,#harga_barang").keyup(function() {
            var gethargaproduk = $('#harga_barang').val();
            var getjumlahorder = $('#jumlah_pesanan').val();
            console.log(gethargaproduk * getjumlahorder);
            var hitungtotal = gethargaproduk * getjumlahorder;
            $("#total_produk").val(hitungtotal);
        });
    });

    // ajax beli produk
    $('#BeliProduk').on('click', '#PesanLangsung', function() {
        // ambil data yang ada pada detail
        let data_detail = {
            'id_produk': $('#id_produk').val(),
            'user_id': $('#user_id').val(),
            'size_order': $("input[type='radio'][name='size_order']:checked").val(),
            'jumlah_pesanan': $('#jumlah_pesanan').val(),
            'total_produk': $('#total_produk').val(),
        }
        $('#modalPesan').modal('show');
        $('#modalPesan').on('click', '#submit-data-pesanan', function() {
            checkout(data_detail)
        })
    });

    function checkout(data_detail) {
        let data_modal = {
            'id_expedisi': $('#id_expedisi').val(),
            'id_pembayaran': $('#id_pembayaran').val(),
            'tinggalkan_pesan': $('#tinggalkan_pesan').val(),
        };

        $.ajax({
            url: $('#BeliProduk').attr('get-link-form'),
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                data_detail,
                data_modal
            },
            success: function(response) {
                console.log(response);
            }
        })
    }
</script>
@endforeach
@endsection