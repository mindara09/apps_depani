@extends('../layout/index')
@section('title', 'Daftar Reservasi')
@section('content')

<div class="container" style="margin-top: 150px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="float-left">
                                <h5 class="card-title mb-5">Daftar Reservasi</h5>
                            </div>
                        </div>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success text-white">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="table-responsive mt-1">
                        <table class="table">
                            <tr>
                                <th>No.</th>
                                <th>Nama Customer</th>
                                <th>No. Telp</th>
                                <th>Jam Kehadiran</th>
                                <th>Deskripsi</th>
                                <th>Dibuat Tanggal</th>
                                <th>Status</th>
                            </tr>
                            @php
                              $no = 1;  
                            @endphp
                            @forelse ($result as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->name_user }}</td>
                                    <td>{{ $item->no_telp }}</td>
                                    <td>{{ $item->time_attendance }}</td>
                                    <td>{{ $item->desc }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        @if ($item->status == 0)
                                        <a href="{{ route('status_reservation', ['id' => $item->id, 'status_id' => 1])}}" class="btn btn-sm btn-success">Disetujui</a>
                                        <a href="{{ route('status_reservation', ['id' => $item->id, 'status_id' => 2])}}" class="btn btn-sm btn-danger">Ditolak</a>
                                        @elseif ($item->status == 1)
                                        <span class="btn btn-outline-success btn-sm">Disetujui</span>
                                        <a href="https://api.whatsapp.com/send?phone={{ $item->no_telp }}&text=Halo, *{{ $item->name_user }}*%0A *No. Telp :* {{ $item->no_telp}} %0A *Jam Kehadiran :* {{ $item->time_attendance }} %0A *Deskripsi :* {{ $item->desc}} %0A *Status :* Disetujui %0A%0A Mohon untuk hadir 15 menit di caffe ya, terima kasih" target="_blank" class="btn btn-outline-success btn-sm">Infokan WhatsApp</a>
                                        @elseif ($item->status == 2)
                                        <span class="btn btn-outline-danger btn-sm">Ditolak</span>
                                        <a href="https://api.whatsapp.com/send?phone={{ $item->no_telp }}&text=Halo, *{{ $item->name_user }}*%0A *No. Telp :* {{ $item->no_telp}} %0A *Jam Kehadiran :* {{ $item->time_attendance }} %0A *Deskripsi :* {{ $item->desc}} %0A *Status :* Ditolak %0A%0A Mohon maaf atas ketidaknyamanannya, terima kasih" class="btn btn-outline-danger btn-sm">Infokan WhatsApp</a>
                                        @endif
                                    </td>
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