@extends('layouts.admin')
@section('title', 'Update Building')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Update Building') }}</h1>

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

    <form method="POST" action="{{ route('building.update.process', $data->id) }}" autocomplete="off"
        enctype="multipart/form-data">
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
                                            <label class="form-control-label" for="name">{{ __('Building Name') }}<span
                                                    class="small text-danger">*</span></label>
                                            <input type="text" id="name" class="form-control" name="name"
                                                value="{{ $data->name }}" placeholder="Example : TULT">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class="form-control-label"
                                                for="name">{{ __('Current Building Image') }}<span
                                                    class="small text-danger">*</span></label>
                                            <img src="{{ asset('storage/' . $data->image) }}" class="w-100">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-6">
                                        <label class="form-control-label" for="exampleInputEmail1">New Building Image</label>
                                        <input type="file" name="image"
                                            class="form-control-file @error('image') is-invalid @enderror"
                                            id="btn-img-upload" onchange="loadFile(event)">
                                        @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group d-none" id="container-img-banner">
                                            <img src="" class="w-100" id="img-banner">
                                            <a class="btn btn-secondary mt-3" onclick="reset(event)"
                                                id="btn-reset">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="facility">{{ __('Building Facility') }}<span
                                                class="small text-danger">*</span></label>
                                        <textarea class="form-control" id="facility" name="facility" rows="5">{{ old('facility') }}{{ $data->facility }}</textarea>
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

<script>
    let urlPath;
    let loadFile = function(event) {
        let output = document.getElementById('img-banner');
        let container = document.getElementById('container-img-banner');
        urlPath = URL.createObjectURL(event.target.files[0]);
        output.src = urlPath;
        output.onload = function() {
            URL.revokeObjectURL(output.src)
        }
        container.classList.remove('d-none');
        container.classList.add('d-block');
    };

    let reset = function(event) {
        const output = document.getElementById('img-banner');
        const container = document.getElementById('container-img-banner');
        output.src = '';
        container.classList.remove('d-block');
        container.classList.add('d-none');
        document.getElementById('btn-img-upload').value = "";
    }
</script>
