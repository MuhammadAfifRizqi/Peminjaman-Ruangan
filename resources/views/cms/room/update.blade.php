@extends('layouts.admin')
@section('title', 'Update Room')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Update Room') }}</h1>

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

<form method="POST" action="{{ route('room.update.process', $data->id) }}" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-12 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-body">

                    <div class="pl-lg-4">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="form-control-label" for="room_number">{{ __('Room Number') }}<span class="small text-danger">*</span></label>
                                        <input type="text" id="room_number" class="form-control" name="room_number" value="{{ $data->room_number }}" placeholder="Example : Room 123">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="form-control-label" for="capacity">{{ __('Capacity') }}<span class="small text-danger">*</span></label>
                                        <input type="number" id="capacity" class="form-control" name="capacity" value="{{ $data->capacity }}" placeholder="Example : 43">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="type">{{ __('Room Type') }}<span class="small text-danger">*</span></label>
                                    <select class="form-control" id="type" name="type">
                                        <option value="class" {{$data->type === "class" ? 'selected' : ''}}>Class</option>
                                        <option value="auditorium" {{$data->type === "auditorium" ? 'selected' : ''}}>Auditorium</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="facility">{{ __('Room Facility') }}<span class="small text-danger">*</span></label>
                                    <textarea class="form-control" id="facility" name="facility" rows="5">{{ $data->facility }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col text-center">
                                <a href="{{ url()->previous() }}" class="btn btn-dark">Back</a>
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>

@endsection