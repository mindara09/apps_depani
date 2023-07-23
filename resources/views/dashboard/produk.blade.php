@extends('../layout/index')
@section('title', 'Daftar Produk')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection
@section('content')

<div class="container" style="margin-top: 150px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="float-left">
                                <h5 class="card-title">Daftar Produk</h5>
                            </div>
                        </div>
                        <div class="col">
                            <div class="float-end">
                                <a class="btn btn-dark btn-sm" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Tambah Produk</a>
                            </div>
                        </div>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success text-white">
                            {{ session('success') }}
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-danger text-white">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <form action="{{ route('process_product') }}" method="POST">
                                @csrf
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th>Harga</th>
                                            <th>Deskripsi</th>
                                            <th>Opsi</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label"></label>
                                                    <input type="text" class="form-control" id="name_product" name="name_product" placeholder="Nama Produk">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label"></label>
                                                    <input type="number" class="form-control" id="price" name="price" placeholder="Harga Produk">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label"></label>
                                                    <textarea name="desc" class="form-control" id="" cols="20" rows="7" placeholder="Deskripsi Produk"></textarea>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table">
                            <tr>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Status Stok</th>
                                <th>Opsi</th>
                            </tr>
                            @forelse ($result as $item)
                                <tr>
                                    <td>{{ $item->name_product }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>
                                        @if ($item->status_stock == 1)
                                            <a href="" class="btn btn-outline-success btn-sm">Ada</a>
                                        @else
                                        <a href="" class="btn btn-outline-danger btn-sm">Habis</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#edit-{{ $item->id }}">Edit</a>
                                        &nbsp;
                                        <a href="{{ route('delete_product', $item->id) }}" class="btn btn-sm btn-danger">Hapus</a>
                                        @if ($item->status_stock == 0)
                                        <a href="{{ route('status_stock', ['id' => $item->id, 'status_stok' => 1]) }}" class="btn btn-sm btn-warning">Stok Ada</a>
                                        @else
                                        <a href="{{ route('status_stock', ['id' => $item->id, 'status_stok' => 0]) }}" class="btn btn-sm btn-warning">Stok Kosong</a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <br>
                                        <center>
                                            Data produk tidak ada
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

@foreach($result as $item)
<!-- Modal -->
<div class="modal fade" id="edit-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('update_product', $item->id) }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="input-group input-group-dynamic">
                            <label class="form-label"></label>
                            <input type="text" class="form-control" id="name_product" name="name_product" placeholder="Nama Produk" value="{{ $item->name_product }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-dynamic">
                            <label class="form-label"></label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="Harga Produk" value="{{ $item->price }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group input-group-dynamic">
                            <label class="form-label"></label>
                            <textarea name="desc" class="form-control" id="" cols="20" rows="7" placeholder="Deskripsi Produk">{{ $item->desc }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn bg-gradient-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
</div>
@endforeach
@endsection