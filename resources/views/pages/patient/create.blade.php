@extends('layouts.app')
@section('title', 'Antrian Baru')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Antrian Baru</h1>
      <div class="h5">No. Pasien {{str_pad($newPatientNo, 10, '0', STR_PAD_LEFT)}}</div>
      <div class="h5 text-info border rounded-lg px-3 py-1 shadow-sm">No. Antrian {{str_pad($queueNo, 10, '0', STR_PAD_LEFT)}}</div>
      {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <!-- Content Row -->

    <div class="row justify-content-center pb-5">
        <div class="col-lg-6">
            <form action="{{route('patient.store')}}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header h4 text-center">Form Registrasi</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row form-group">
                                    <label for="inputName" class="col-form-label col-lg-4">Nama</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control @error('name') border-danger @enderror" name="name" value="{{old('name')}}" id="inputName">
                                        <input type="hidden" name="queue_no" value="{{$queueNo}}">
                                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="inputPhone" class="col-form-label col-lg-4">No Hp</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control @error('phone') border-danger @enderror" name="phone" value="{{old('phone')}}" id="inputPhone">
                                        @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="inputIdentity" class="col-form-label col-lg-4">No. NIK/SIM/PASSPORT</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control @error('identity') border-danger @enderror" name="identity" value="{{old('identity')}}" id="inputIdentity">
                                        @error('identity') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="inputBirthPlace" class="col-form-label col-lg-4">Tempat Lahir</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control @error('birth_place') border-danger @enderror" name="birth_place" value="{{old('birth_place')}}" id="inputBirthPlace">
                                        @error('birth_place') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="inputBirthDate" class="col-form-label col-lg-4">Tanggal Lahir</label>
                                    <div class="col-lg-8">
                                        <input type="date" class="form-control @error('birth_date') border-danger @enderror" name="birth_date" value="{{old('birth_date')}}" id="inputBirthDate">
                                        @error('birth_date') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="inputGender" class="col-form-label col-lg-4">Jenis Kelamin</label>
                                    <div class="col-lg-8">
                                        <select name="gender" value="{{old('gender')}}" id="inputGender" class="form-control @error('gender') border-danger @enderror">
                                            <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                            <option value="pria">Pria</option>
                                            <option value="wanita">Wanita</option>
                                        </select>
                                        @error('gender') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="inputJob" class="col-form-label col-lg-4">Pekerjaan</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control @error('job') border-danger @enderror" name="job" value="{{old('job')}}" id="inputJob">
                                        @error('job') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="inputAddress" class="col-form-label col-lg-4">Alamat Lengkap (Sesuai KTP)</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control @error('address') border-danger @enderror" name="address" value="{{old('address')}}" id="inputAddress">
                                        @error('address') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>
    
                                <div class="row form-group">
                                    <label for="inputDoctor" class="col-form-label col-lg-4">Dokter</label>
                                    <div class="col-lg-8">
                                        <select name="doctor_id" value="{{old('doctor_id')}}" id="inputDoctor" class="form-control @error('doctor_id') border-danger @enderror">
                                            <option value="" disabled selected>Pilih Dokter</option>
                                            @foreach($doctors as $key => $doctor)
                                            <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('doctor_id') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            
            </form>
        </div>
    </div>

  </div>
  <!-- /.container-fluid -->
@endsection