@extends('layouts.app')

@section('content')
    <!-- Favicon -->
    <link href="{{ asset('img/logo.png') }}" rel="icon" type="image/png">

    <!-- Masthead-->
    <header class="masthead">
    </header>
    <div class="container">
        <div class="align-items-center text-center p-4">
            <div class="row">
                <h1>Peminjaman Ruangan</h1>
            </div>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <a class="btn btn-danger btn-xl text-uppercase rounded" href={{ route('login') }}>Login</a>
                </div>
                <div class="col-4"></div>
            </div>
        </div>
    </div>
@endsection
