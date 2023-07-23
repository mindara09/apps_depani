@extends('layout.layout-home')
@section('title', 'Review Customer')
@section('content')

<!-- BOOK -->
<section class="book" id="book" style="margin-top: 150px">
    <h1 class="heading">Review <span>Review Customer</span></h1>
    <form action="{{ route('submit_review')}}" method="POST">
        @if(session('success'))
            <div class="alert-success" role="alert">
                <strong>{{session('success') }}</strong>
            </div>
        @elseif(session('error'))
            <div class="alert-danger" role="alert">
                <strong>{{session('error') }}</strong>
            </div>
        @endif
        @csrf
        <p style="font-size: 15px;">Halo, . Tolong berikan pendapatmu yaa!</p>
        <input type="number" placeholder="Berapa Bintang" class="box" name="start" max="5">
        <textarea placeholder="Komentar" class="box" id="" cols="30" rows="10" name="comment"></textarea>
        <input type="submit" value="send message" class="btn">
    </form>
</section>

@endsection