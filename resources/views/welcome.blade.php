@extends('layouts.app')

@section('content')

<!-- Favicon -->
<link href="{{ asset('img/logo.png') }}" rel="icon" type="image/png">

<!-- Masthead-->
<header class="masthead">
    <div class="container">
        <h1>Peminjaman Ruangan</h1>
        <a class="btn btn-danger btn-xl text-uppercase rounded" href="{{route('katalog')}}">Booking</a>
    </div>
</header>
@endsection
