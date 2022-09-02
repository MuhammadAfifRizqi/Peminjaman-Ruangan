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

    <form method="POST" action="{{ route('room.update.process', $data->id) }}" autocomplete="off"
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
                                        <label class="form-control-label" for="type">{{ __('Building') }}<span
                                                class="small text-danger">*</span></label>
                                        <select class="form-control" id="id_building" name="id_building">
                                            @foreach ($building as $bd)
                                                <option value="{{ $bd->id }}"
                                                    {{ $data->id_building === $bd->id ? 'selected' : '' }}>
                                                    {{ $bd->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class="form-control-label" for="room_number">{{ __('Room Number') }}<span
                                                    class="small text-danger">*</span></label>
                                            <input type="text" id="room_number" class="form-control" name="room_number"
                                                value="{{ $data->room_number }}" placeholder="Example : Room 123">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class="form-control-label" for="capacity">{{ __('Capacity') }}<span
                                                    class="small text-danger">*</span></label>
                                            <input type="number" id="capacity" class="form-control" name="capacity"
                                                value="{{ $data->capacity }}" placeholder="Example : 43">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="type">{{ __('Room Type') }}<span
                                                class="small text-danger">*</span></label>
                                        <select class="form-control" id="type" name="type">
                                            <option value="class" {{ $data->type === 'class' ? 'selected' : '' }}>Class
                                            </option>
                                            <option value="auditorium"
                                                {{ $data->type === 'auditorium' ? 'selected' : '' }}>Auditorium</option>
                                            <option value="laboratory"
                                                {{ $data->type === 'laboratory' ? 'selected' : '' }}>Laboratory</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="facility">{{ __('Room Facility') }}<span
                                                class="small text-danger">*</span></label>
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

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('Update Gallery') }}</h1>

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

        <div class="row">
            <div class="col-lg-12 order-lg-1">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="" for="exampleInputEmail1">Exits Image</label>
                                    <div class="table-responsive">
                                        <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Image</th>
                                                    <th>Caption</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 0;
                                                ?>
                                                @foreach ($data->medias as $media)
                                                    <tr>
                                                        <?php
                                                        $no += 1;
                                                        ?>
                                                        <td>{{ $no }}</td>
                                                        <td>
                                                            <div>
                                                                <img src="{{ asset('storage/' . $media->image) }}"
                                                                    alt="foto" class="img-fluid" width="80">
                                                            </div>
                                                        </td>
                                                        <td>{{ $media->caption }}</td>
                                                        <td>
                                                            <a href="{{ route('room.delete.galeri', $media->id) }}"
                                                                class="btn btn-sm btn-danger"
                                                                onclick="return confirm('hapus foto ini?')">Delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="form-group-row hdtuto control-group lst increment">
                                        <label class="" for="exampleInputEmail1">Upload Image</label>
                                        <div class="input-group">
                                            <input type="file" name="img" class="myfrm form-control"
                                                id="file" onchange="Filevalidation()">
                                        </div>
                                        <small>Size Max <b>2 MB</b>, Format Supported : PNG, JPG, JPEG</small>
                                        <div class="form-group-row mt-4">
                                            <label class="" for="exampleInputEmail1">Caption</label>
                                            <textarea name="caption" id="" cols="30" rows="10" class="form-control"></textarea>
                                            <small>Max : 255 Characters</small>
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
                                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
    @push('upper-script')
        <script>
            Filevalidation = () => {
                const fi = document.getElementById('file');
                // Check if any file is selected.
                if (fi.files.length > 0) {
                    for (const i = 0; i <= fi.files.length - 1; i++) {
                        const fsize = fi.files.item(i).size;
                        const file = Math.round((fsize / 1024));
                        // The size of the file.
                        if (file >= 2048) {
                            alert(
                                "File too Big, please select a file less than 2mb");
                        } else {
                            document.getElementById('size').innerHTML = '<b>' +
                                file + '</b> KB';
                        }
                    }
                }
            }
        </script>
    @endpush
@endsection
