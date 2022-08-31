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
                url: "{{ route('room') }}",
            },
            columns: [{
                    data: 'building',
                    name: 'building'
                },
                {
                    data: 'room_number',
                    name: 'room_number'
                },
                {
                    data: 'type',
                    name: 'type'
                },
                {
                    data: 'capacity',
                    name: 'capacity'
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
        <div class="card-body">

            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>Building</th>
                        <th>Room Number</th>
                        <th>Type</th>
                        <th>Capacity</th>
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
