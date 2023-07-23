@extends('../layout/index')
@section('title', 'Transaksi')
@section('content')

<div class="container" style="margin-top: 150px">
   <div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Daftar Transaksi</h5>
                @if(session('success'))
                    <div class="alert alert-success text-white">
                        {{ session('success') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger text-white">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('transaction')}}" method="GET">
                    <div class="row mt-5">
                        <div class="col-4">
                            <div class="input-group input-group-dynamic">
                                <label class="form-label"></label>
                                <input type="text" class="form-control" placeholder="Cari Nama Customer" id="cari" name="cari">
                            </div>
                        </div>
                        <div class="col">
                            <button class="btn btn-sm btn-outline-info" type="submit">Cari</button>
                            <a href="{{ route('transaction')}}" class="btn btn-sm btn-warning">Refresh</a>
                        </div>
                    </div>
                </form>
                <div class="table-responsive mt-2">
                    <table class="table">
                        <tr>
                            <th>No.</th>
                            <th>Customer</th>
                            <th>Items</th>
                            <th>Total Price</th>
                            <th>Bayar</th>
                            <th>Kembalian</th>
                            <th>Status Payment</th>
                            <th>Opsi</th>
                        </tr>
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($result as $item)
                            <tr>
                                <td>{{  $no++ }}</td>
                                <td>{{ $item->name_user }}</td>
                                <td>
                                    <a href="" class="btn-primary btn btn-sm" data-bs-toggle="modal" data-bs-target="#detail-{{ $item->id }}">Lihat Item</a>
                                </td>
                                <td>
                                    Rp.{{ $item->total_price }}
                                </td>
                                <td>
                                    @if ($item->pay)
                                        Rp. {{ $item->pay}}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if ($item->change)
                                        Rp. {{ $item->change}}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if ($item->payment == 1)
                                        Cash
                                    @elseif($item->payment == 2)
                                        Transfer
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if ($item->status_payment == 0)
                                        <a href="{{ route('transaction', ['type' => 'pembayaran', 'id' => $item->id])}}" class="btn btn-sm btn-info">Belum Bayar</a>
                                    @else
                                        <a href="#" class="btn btn-outline-success btn-sm">Sudah Pembayaran</a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">
                                    <center>
                                        <span class="mt-2">Data Transaksi Kosong!</span>
                                    </center>
                                </td>
                            </tr>
                        @endforelse
                    </table>
                    <div class="float-end">
                        {!! $result->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Pembayaran</h5>
                <div class="table-responsive mt-3">
                    <form action="{{ route('submit_transaction', ['type' => request('type'), 'id' => request('id')])}}" method="POST">
                    @csrf
                        <table class="table">
                            <tr>
                                <th>Total</th>
                                <td>
                                    <div class="input-group input-group-dynamic">
                                        <label class="form-label"></label>
                                        <input type="text" class="form-control" placeholder="Total Pembayaran" id="total" name="total" value="{{ (request('type') === 'pembayaran') ? $transaction->total_price : '' }}">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Bayar</th>
                                <td>
                                    <div class="input-group input-group-dynamic">
                                        <label class="form-label"></label>
                                        <input type="text" class="form-control" id="pay" placeholder="Bayar" name="pay">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Kembalian</th>
                                <td>
                                    <div class="input-group input-group-dynamic">
                                        <label class="form-label"></label>
                                        <input type="text" class="form-control" id="change" placeholder="Kembalian" name="change" readonly>
                                    </div>
                                </td>
                            </tr>
                            <!--
                            <tr>
                                <th>Diskon</th>
                                <td>
                                    <div class="input-group input-group-dynamic">
                                        <label class="form-label">Diskon</label>
                                        <input type="text" class="form-control" id="discount" name="discount">
                                    </div>
                                </td>
                            </tr>
                            -->
                            <tr>
                                <th>Pembayaran</th>
                                <td>
                                    <div class="input-group input-group-static mb-4">
                                        <select class="form-control" id="exampleFormControlSelect1" name="payment">
                                            <option value="1">Cash</option>
                                            <option value="2">Transfer</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <div class="float-end">
                                        <a href="{{ route('transaction')}}" class="btn btn-sm btn-warning">Refresh</a>
                                        <button class="btn-dark text-white btn btn-sm" type="submit">Submit</button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
   </div>
</div>

@foreach ($result as $item)
<!-- Modal -->
<div class="modal fade" id="detail-{{ $item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <table class="table">
                <tr>
                    <th>No.</th>
                    <th>Nama Produk</th>
                    <th>Quantity</th>
                    <th>Sub-Total</th>
                </tr>
                @php
                    $no = 1;
                @endphp
                @forelse (json_decode($item->product) as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->name_product }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>Rp. {{ $item->quantity * $item->price }} </td>
                    </tr>
                @empty
                    
                @endforelse
            </table>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>
@endforeach
@endsection
@section('js')
<!-- Letakkan script JavaScript ini di bagian bawah template Anda -->
<script>
    // Fungsi untuk mengonversi angka menjadi format rupiah
    function formatRupiah(angka) {
        let numberString = angka.toString();
        let splitNumber = numberString.split('.');
        let sisa = splitNumber[0].length % 3;
        let rupiah = splitNumber[0].substr(0, sisa);
        let ribuan = splitNumber[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            let separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        if (splitNumber[1] !== undefined) {
            rupiah += ',' + splitNumber[1];
        }

        return 'Rp ' + rupiah;
    }

    // Fungsi untuk menghapus karakter non-angka dari string dan mengubahnya menjadi angka float
    function parseToFloat(angka) {
        return parseFloat(angka.replace(/[^\d,-]/g, '').replace(',', '.'));
    }

    // Ambil elemen input pembayaran dan kembalian
    const inputBayar = document.getElementById('pay');
    const inputKembalian = document.getElementById('change');
    const inputTotal = document.getElementById('total');

    // Fungsi untuk menghitung kembalian dan mengubah format menjadi rupiah
    function hitungKembalian() {
        const total = parseFloat(inputTotal.value); // Ambil nilai total dari input form
        const bayar = parseToFloat(inputBayar.value);

        // Cek apakah nilai bayar valid (bukan NaN atau kosong)
        if (!isNaN(bayar) && bayar >= 0) {
            const kembalian = bayar - total;

            // Set nilai kembalian ke input kembalian dalam format rupiah
            inputKembalian.value = formatRupiah(kembalian);
        } else {
            // Jika nilai bayar tidak valid, kosongkan input kembalian
            inputKembalian.value = '';
        }

        // Ubah nilai pada input "Bayar" menjadi format rupiah
        inputBayar.value = formatRupiah(bayar);
    }

    // Tambahkan event listener untuk memanggil fungsi hitungKembalian saat nilai pembayaran berubah
    inputBayar.addEventListener('input', hitungKembalian);
</script>


@endsection