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

@section('title', 'Admin Home')

@section('main-content')
@if (\Session::has('error'))
<div class="alert alert-danger">
    <ul>
        <li>{!! \Session::get('error') !!}</li>
    </ul>
</div>
@endif
<div class="row bg-white p-3">
    <div class="row">
    <div class="col-md-8 mb-4">
        <div class="card">
            {!! $chartArea->container() !!}
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card px-3" style="height: 100%;">
            <h4 class="font-weight-bold mb-5 mt-3">Ruangan Paling Banyak <br /> Dikunjungi</h4>
            <div class="mb-5 d-flex">
                <img src="{{asset('img/Gedung TULT.jpg')}}" style="object-fit: cover; border-radius: 10px;" width="140px" height="150px" class="mr-3" alt="">
                <div class="flex-fill justify-content-center flex-column d-flex">
                    <div>
                        <label> Progress Bar </label>
                        <br />
                        <div class="progress">
                            <div class="progress-bar <strong>progress-bar-striped</strong> bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80%</div>
                        </div>
                    </div>
                    <br />
                    <div>
                        <label> Progress Bar </label>
                        <br />
                        <div class="progress">
                            <div class="progress-bar <strong>progress-bar-striped</strong> bg-primary" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-5 d-flex">
                <img src="{{asset('img/dummy.jpg')}}" style="object-fit: cover; border-radius: 10px;" width="140px" height="150px" class="mr-3" alt="">
                <div class="flex-fill justify-content-center flex-column d-flex">
                    <div>
                        <label> Progress Bar </label>
                        <br />
                        <div class="progress">
                            <div class="progress-bar <strong>progress-bar-striped</strong> bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80%</div>
                        </div>
                    </div>
                    <br />
                    <div>
                        <label> Progress Bar </label>
                        <br />
                        <div class="progress">
                            <div class="progress-bar <strong>progress-bar-striped</strong> bg-primary" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- #### -->
    <!-- ##Gedung TULT## -->
    <div class="card mr-5" style="width: 18rem;">
        <img class="card-img-top" src="{{asset('img/Gedung-tult.jpg')}}" alt=>
     <div class="card-body">
     <h5 class="card-title">Gedung TULT</h5>
     <p class="card-text">Gedung TULT adalah gedung baru di Telkom University</p>
     <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Detail Gedung
</button>


<!-- Modal 1 -->
<!-- ##Detail Gedung POP UP dan Informasi## -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="Detail" id="exampleModalLabel">Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        TULT adalah Telkom University Landmark Tower yang terdiri dari 19 lantai.
        Terdapat ruangan yaitu kelas untuk perkuliahan, Laboratorium, dan Ruangan Dosen
        Fasilitas yang dimiliki dari beberapa ruangan terdapat meja, kursi, Ac, Proyektor
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
          </div>
             </div>
                </div>
          </div>
    </div>

<!-- #### -->
<!-- ##Gedung B## -->
    <div class="card mr-5" style="width: 18rem;">
        <img class="card-img-top" src="{{asset('img/Gedung-B.jpg')}}" alt=>
     <div class="card-body">
     <h5 class="card-title">Gedung B</h5>
     <p class="card-text">Gedung B adalah gedung yang dulunya adalah gedung FRI</p>
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
     Detail Gedung
    </button>

    <!-- Modal 2 -->
    <!-- ##Detail Gedung POP UP dan Penjelasan## -->
 <div class="modal fade" id="exampleModal" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="Detail" id="exampleModalLabel">Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Fakultas Rekayasa Industri (FRI) terdiri dari 2 (dua) gedung dengan masing-masing 3
      lantai yaitu Gedung Grha Wiyata Cacuk Sudarijanto-B dengan total luas 5,676.48 m2 dan Gedung Karang dengan total luas 4,848.72 m2.
      Kedua gedung ini berfungsi sebagai gedung kuliah dan administrasi Fakultas Rekayasa Industri.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
          </div>
    </div>

    <!-- #### -->
    <!-- ##Gedung Auditorium## -->
    <div class="card mr-5" style="width: 18rem;">
        <img class="card-img-top" src="{{asset('img/Gedung-audit.jpg')}}" alt=>
     <div class="card-body">
     <h5 class="card-title">Gedung Auditorium</h5>
     <p class="card-text">Gedung yang dipakai untuk acara besar dan pertemuan seluruh dosen</p>
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
     Detail Gedung
    </button>

    <!-- Modal 3 -->
    <!-- ##Detail Gedung dan POP UP dan Penjelasan## -->
     <div class="modal fade" id="exampleModal" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="Detail" id="exampleModalLabel">Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Fakultas Rekayasa Industri (FRI) terdiri dari 2 (dua) gedung dengan masing-masing 3
      lantai yaitu Gedung Grha Wiyata Cacuk Sudarijanto-B dengan total luas 5,676.48 m2 dan Gedung Karang dengan total luas 4,848.72 m2.
      Kedua gedung ini berfungsi sebagai gedung kuliah dan administrasi Fakultas Rekayasa Industri.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
          </div>
    </div>

    <!-- #### -->
    <!-- ##Gedung GKU## -->
    <div class="card mr-5" style="width: 18rem;">
        <img class="card-img-top" src="{{asset('img/Gedung-rektorat.jpeg')}}" alt=>
     <div class="card-body">
     <h5 class="card-title">Gedung GKU</h5>
     <p class="card-text">Gedung GKU adalah gedung yang di gunakan untuk kuliah umum</p>
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
     Detail Gedung
    </button>

    <!-- Modal 4 -->
    <!-- ##Detail Gedung dan POP UP dan Penjelasan## -->

    <div class="modal fade" id="exampleModal" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="Detail" id="exampleModalLabel">Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Fakultas Rekayasa Industri (FRI) terdiri dari 2 (dua) gedung dengan masing-masing 3
      lantai yaitu Gedung Grha Wiyata Cacuk Sudarijanto-B dengan total luas 5,676.48 m2 dan Gedung Karang dengan total luas 4,848.72 m2.
      Kedua gedung ini berfungsi sebagai gedung kuliah dan administrasi Fakultas Rekayasa Industri.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
          </div>
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
