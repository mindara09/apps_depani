@extends('../layout/index')
@section('title', 'Daftar Review Customer')
@section('css')
<style>
    .comment-column {
        max-width: 150px; /* Sesuaikan lebar maksimum sesuai kebutuhan Anda */
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
    }
</style>

@endsection
@section('content')

<div class="container" style="margin-top: 150px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar Review Customer</h5>
                    @if(session('success'))
                        <div class="alert alert-success text-white">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="table-responsive mt-5">
                        <table class="table">
                            <tr>
                                <th>Pelanggan</th>
                                <th>Bintang</th>
                                <th>Komen Pelanggan</th>
                            </tr>
                            @forelse ($result as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @for ($i = 1; $i <= $item->start; $i++)
                                            <span class="text-warning">&#9733;</span> <!-- Simbol bintang -->
                                        @endfor
                                    </td>
                                    <td>
                                        @if (strlen($item->comment) > 100)
                                            {{ substr($item->comment, 0, 100) . '...' }} 
                                            <a href="" data-bs-toggle="modal" data-bs-target="#komentar-{{ $item->id }}">Lihat Komentar</a>
                                        @else
                                            {{ $item->comment }}
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <center>
                                            Komentar tidak ada
                                        </center>
                                    </td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                    <div class="float-end">
                        {!! $result->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@foreach ($result as $item)
<!-- Modal -->
<div class="modal fade" id="komentar-{{ $item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Komentar Customer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
            {{ $item->comment }}
          </p>
        </div>
      </div>
    </div>
  </div>
@endforeach
@endsection