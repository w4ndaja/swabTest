@extends('layouts.app')
@section('title', 'Edit Dokter')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Edit Dokter</h1>
      {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <!-- Content Row -->

    <div class="row justify-content-center pb-5">
        <div class="col-lg-6">
            <form action="{{route('doctor.update', $doctor->id)}}" method="post">
                @method('put')
                @csrf
                <div class="card">
                    <div class="card-header h4 text-center">Form Dokter</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row form-group">
                                    <label for="inputName" class="col-form-label col-lg-4">Nama</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control @error('name') border-danger @enderror" name="name" value="{{old('name') ?? $doctor->name}}" id="inputName">
                                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
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