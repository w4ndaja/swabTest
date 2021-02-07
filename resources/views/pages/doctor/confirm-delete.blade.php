@extends('layouts.app')
@section('title', 'Hapus Dokter')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-danger">Peringatan</h1>
      {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <!-- Content Row -->

    <div class="row justify-content-center pb-5">
        <div class="col-6">
            <div class="card">
                <form action="{{route('doctor.destroy', $doctor->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <div class="card-body text-danger">Hapus dokter {{$doctor->name}} ? </div>
                    <div class="card-footer d-flex justify-content-end" style="gap:10px">
                        <button class="btn btn-info">Cancel</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

  </div>
  <!-- /.container-fluid -->
@endsection