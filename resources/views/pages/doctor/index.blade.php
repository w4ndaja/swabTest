@extends('layouts.app')
@section('title', 'Daftar Dokter')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dokter</h1>
      {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <!-- Content Row -->

    <div class="row justify-content-center pb-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-stripped table-hover">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($doctors as $doctor)
                                <tr>
                                    <td>{{$doctor->name}}</td>
                                    <td width="10px">
                                        <div class="d-flex w-100" style="gap : 10px">
                                            <a href="{{route('doctor.edit', $doctor->id)}}" class="btn btn-icon btn-info"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-icon btn-danger" href="{{route('doctor.confirm-delete', $doctor->id)}}"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

  </div>
  <!-- /.container-fluid -->
@endsection