@extends('../layout/index')
@section('title', 'Transaksi')
@section('content')

<div class="container" style="margin-top: 150px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="float-left">
                                <h5 class="card-title mb-5">Daftar Pengguna</h5>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table">
                            <tr>
                                <th>No.</th>
                                <th>Role User</th>
                                <th>Email</th>
                                <th>Nama</th>
                                <th>No. Telp</th>
                                <th>Dibuat Tanggal</th>
                            </tr>
                            @php
                              $no = 1;  
                            @endphp
                            @forelse ($result as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->name_role }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->no_telp }}</td>
                                    <td>{{ $item->created_at }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <br>
                                        <center>
                                            Data tidak ada
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
    </div>
</div>
@endsection