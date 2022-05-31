@extends('layouts.admin')
@section('title', 'Room')

@section('main-content')
    <!-- Page Heading -->

    <nav class="navbar navbar-light px-0 py-3">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Room') }}</h1>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{ route('room.create') }}" class="btn btn-dark border-0">New Room</a>
            </li>
        </ul>
    </nav>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
            <ul class="pl-4 my-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row mx-1 mb-5">
        <div class="col-lg-12 order-lg-1 bg-white rounded shadow">
            <div class="my-3 d-inline-block w-100">
                <h6 class="m-0 font-weight-bold text-danger">Rooms</h6>
            </div>
            <div class="row">
                @foreach ($data as $dt)
                    <div class="col-md-4 col-sm-12 mb-3">
                        <div class="card" style="width: 100%;">
                            <img src="{{ asset('storage/' . $dt->photo) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $dt->room_number }}</h5>
                                <p class="card-text">Type: {{ $dt->type }}</p>
                                <p class="card-text">Capacity: {{ $dt->capacity }}</p>
                                <p class="card-text">{{ substr($dt->facility, 0, 200) }}</p>
                                <p class="card-text"><small class="text-muted">Last Updated at
                                        {{ $dt->updated_at->format('d, M Y H:i') }}</small></p>

                                <div class="d-flex justify-content-end">
                                    <!-- <a href="{{ route('material', $dt->id) }}" class="btn btn-success mx-3">Material</a> -->
                                    <a href="{{ route('room.update', $dt->id) }}" class="btn btn-danger mx-3">Edit</a>
                                    <a href="{{ route('room.delete', $dt->id) }}" class="btn btn-danger mx-3"
                                        onclick='return confirm("Are you sure?")'>Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mx-auto" style="width: fit-content;">
                {{ $data->links() }}
            </div>
        </div>
    </div>

@endsection
