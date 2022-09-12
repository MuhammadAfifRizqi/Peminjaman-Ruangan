@extends('layouts.student')
@section('title', 'Create Booking')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Create Booking') }}</h1>

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

    <form method="POST" action="{{ route('bookingStudent.create.process') }}" autocomplete="off"
        enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12 order-lg-1">

                <div class="card shadow mb-4">

                    <div class="card-body">

                        <div class="pl-lg-4">
                            {{-- <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="type">{{ __('Room Type') }}<span
                                                class="small text-danger">*</span></label>
                                        <select class="form-control" id="type" name="type">
                                            <option value="class">Class</option>
                                            <option value="auditorium">Auditorium</option>
                                            <option value="laboratory">Laboratory</option>
                                        </select>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="id_room">{{ __('Room') }}<span
                                                class="small text-danger">*</span></label>
                                        <select class="form-control selectpicker" id="id_room" name="id_room" data-live-search="true">
                                            @foreach ($rooms as $rm)
                                                <option value="{{ $rm->id }}">
                                                    {{ $rm->room_number.' | Capacity: '.$rm->capacity }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row"> 
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class="form-control-label" for="date">{{ __('Date') }}<span
                                                    class="small text-danger">*</span></label>
                                            <input type="datetime-local" id="date" class="form-control" name="date"
                                                value="{{ old('date') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class="form-control-label" for="time">{{ __('Hours') }}<span
                                                    class="small text-danger">*</span></label>
                                            <input type="number" id="time" class="form-control" name="time"
                                                value="{{ old('time') }}" placeholder="Example : 2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class="form-control-label"
                                                for="lecturer_code">{{ __('Lecturer Code') }}<span
                                                    class="small text-danger">*</span></label>
                                            <input type="text" id="lecturer_code" class="form-control"
                                                name="lecturer_code" value="{{ old('lecturer_code') }}"
                                                placeholder="Example : RAS">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class="form-control-label" for="used">{{ __('Used') }}<span
                                                    class="small text-danger">*</span></label>
                                            <textarea class="form-control" id="used" name="used" rows="3" placeholder="Example : Kelas">{{ old('used') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Button -->
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col text-center">
                                    <a href="{{ url()->previous() }}" class="btn btn-dark">Back</a>
                                    <button type="submit" class="btn btn-primary">{{ __('Book') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- <script>
        $(function() {
            $('.selectpicker').selectpicker();
        });
    </script> --}}

@endsection
