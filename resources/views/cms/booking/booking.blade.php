@push('css')
<link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush
@push('script')
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('booking') }}",
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'position',
                    name: 'position'
                },
                {
                    data: 'user_name',
                    name: 'user_name'
                },
                {
                    data: 'room_name',
                    name: 'room_name'
                },
                {
                    data: 'building',
                    name: 'building'
                },
                {
                    data: 'start_date',
                    name: 'start_date'
                },
                {
                    data: 'time',
                    name: 'time'
                },
                {
                    data: 'lecturer_code',
                    name: 'lecturer_code'
                },
                {
                    data: 'used',
                    name: 'used'
                },
                {
                    data: 'phone_number',
                    name: 'phone_number'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                },
            ]
        });
    });
</script>
@endpush

@extends('layouts.admin')
@section('title', 'Booking')

@section('main-content')
<!-- Page Heading -->

<nav class="navbar navbar-light px-0 py-3">
    <h1 class="h3 mb-4 text-gray-800">{{ __('Booking') }}</h1>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="{{ route('booking.create') }}" class="btn btn-dark border-0">New Booking</a>
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
            <h6 class="m-0 font-weight-bold text-danger">Bookings</h6>
        </div>
        <div class="card-body">

            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Position</th>
                        <th>User</th>
                        <th>Room</th>
                        <th>Building</th>
                        <th>Start Date</th>
                        <th>Time</th>
                        <th>Lecture Code</th>
                        <th>Used for</th>
                        <th>Phone Number</th>
                        <th>Status</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

        </div>

    </div>

</div>



@endsection
