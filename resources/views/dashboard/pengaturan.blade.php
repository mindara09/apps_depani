@extends('../layout/index')
@section('title', 'Daftar Reservasi')
@section('content')

<div class="container" style="margin-top: 150px">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pengaturan Caffe</h5>
                    @if(session('success'))
                        <div class="alert alert-success text-white">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('update_settings')}}" method="POST">
                        @csrf
                        <div class="row mt-4">
                            <div class="col-md-4">
                                Link Maps
                            </div>
                            <div class="col-md-8">
                                <div class="input-group input-group-dynamic">
                                    <label class="form-label"></label>
                                    <input type="text" class="form-control" id="link_maps" name="link_maps" value={{ $settings->link_maps ? $settings->link_maps : null}}>
                                </div>
                            </div>
                            <div class="col-md-4">
                                No. Telp
                            </div>
                            <div class="col-md-8">
                                <div class="input-group input-group-dynamic">
                                    <label class="form-label"></label>
                                    <input type="text" class="form-control" id="no_telp" name="no_telp" value={{ $settings->no_telp}}>
                                </div>
                            </div>
                            <div class="col-md-4">
                                Link Instagram
                            </div>
                            <div class="col-md-8">
                                <div class="input-group input-group-dynamic">
                                    <label class="form-label"></label>
                                    <input type="text" class="form-control" id="link_instagram" name="link_instagram" value={{ $settings->link_instagram}}>
                                </div>
                            </div>
                        </div>
                        <div class="float-end mt-3">
                            <button class="btn btn-success btn-sm">Simpan Pengaturan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Profil Akun
                    </h5>
                    @if(session('success_update_password'))
                        <div class="alert alert-success text-white">
                            {{ session('success_update_password') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger text-white">
                            {{ session('danger') }}
                        </div>
                    @endif
                    <form action="{{ route('update_password')}}" method="POST" class="mt-4">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                Role User
                            </div>
                            <div class="col-md-8">
                                <div class="input-group input-group-dynamic">
                                    <label class="form-label"></label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $users->role_user }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                Name
                            </div>
                            <div class="col-md-8">
                                <div class="input-group input-group-dynamic">
                                    <label class="form-label"></label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $users->name_user }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                Email
                            </div>
                            <div class="col-md-8">
                                <div class="input-group input-group-dynamic">
                                    <label class="form-label"></label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{ $users->email }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                Password
                            </div>
                            <div class="col-md-8">
                                <div class="input-group input-group-dynamic">
                                    <label class="form-label"></label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </div>
                            <div class="col-md-4">
                                Konfirmasi Password
                            </div>
                            <div class="col-md-8">
                                <div class="input-group input-group-dynamic">
                                    <label class="form-label"></label>
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                                </div>
                            </div>
                        </div>
                        <div class="float-end">
                            <button class="btn btn-success btn-sm mt-3">Simpan Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection