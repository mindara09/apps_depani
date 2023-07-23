@extends('../layout/index')
@section('title', 'Login')
@section('content')

<div class="container" style="margin-top: 150px">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-2">Login</h3></div>
                @if(session('error'))
                    <div class="alert alert-danger text-white">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('proses_login') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com">
                            <label for="inputEmail">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Password">
                            <label for="inputPassword">Password</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                            <a class="small" href="#">Forgot Password?</a>
                            <button class="btn btn-primary" type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
</div>

@endsection