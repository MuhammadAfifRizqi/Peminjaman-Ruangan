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
@extends('layouts.admin')

@section('title', 'Home')

@section('main-content')
@if (\Session::has('error'))
<div class="alert alert-danger">
    <ul>
        <li>{!! \Session::get('error') !!}</li>
    </ul>
</div>
@endif
<div class="row bg-white p-3">
    <!-- <div class="row"> -->
    
</div>

<script src="{{ $chartArea->cdn() }}"></script>
{{ $chartArea->script() }}
<script src="{{ $chartDonut->cdn() }}"></script>
{{ $chartDonut->script() }}
<script src="{{ $chartBar->cdn() }}"></script>
{{ $chartBar->script() }}
<script src="{{ $chartExpense->cdn() }}"></script>
{{ $chartExpense->script() }}
<script src="{{ $chartTransaction->cdn() }}"></script>
{{ $chartTransaction->script() }}
@endsection