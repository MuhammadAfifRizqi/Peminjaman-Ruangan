@push('script')
    <!-- splide -->
    <script src="{{ asset('vendor/splide-3.2.1/dist/js/splide.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.21/dist/js/splide.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Splide('.splide').mount();
        });
    </script>
@endpush
@push('css')
    <!-- splide css -->
    <link rel="stylesheet" href="vendor/splide-3.2.1/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.21/dist/css/splide.min.css" />
@endpush
@extends('layouts.student')

@section('title', 'Home')

@section('main-content')
    @if (\Session::has('error'))
        <div class="alert alert-danger">
            <ul>
                <li>{!! \Session::get('error') !!}</li>
            </ul>
        </div>
    @endif
    <nav class="navbar navbar-light px-0 py-3">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Buildings') }}</h1>
    </nav>
    <div class="row bg-white p-3">
        <div class="row">
            <!-- #### -->
            @foreach ($buildings as $bd)
                <div class="card mr-5" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('storage/' . $bd->image) }}" alt=>
                    <div class="card-body">
                        <h5 class="card-title">{{ $bd->name }}</h5>
                        <p class="card-text">{{ $bd->facility }}</p>
                        <div class="text-center">
                            <a type="button" class="btn btn-primary" href="{{ route('bookingStudent.create', $bd->id) }}">
                                Book
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
