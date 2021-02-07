@extends('layouts.app')
@section('title', 'Hasil Pencarian')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Hasil Pencarian</h1>
      {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex" style="gap:10px">
                    <form action="{{route('patient.search')}}">
                        <div class="form-group d-flex" style="gap:10px">
                            <span class="text-info my-auto text-nowrap">Cari NIK</span>
                            <input type="text" class="form-control" name="identity">
                            <button type="submit" class="btn btn-info"><i class="fa fa-search"></i></button>
                            <a href="{{route('patient.index')}}" class="btn btn-success"><i class="fa fa-undo"></i></a>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                               <tr>
                                <th>Nomor Antrian</th>
                                <th>Nama</th>
                                <th>ID</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>JK</th>
                                <th>Pekerjaan</th>
                                <th>Alamat</th>
                                <th>Hasil</th>
                                <th>Dokter</th>
                                <th>Aksi</th>
                               </tr>
                            </thead>
                            <tbody>
                                @foreach($patients as $patient)
                                    <tr>
                                        <td class="text-nowrap">{{str_pad($patient->queue_no, 5, '0', STR_PAD_LEFT)}}</td>
                                        <td class="text-nowrap">{{$patient->name}}</td>
                                        <td class="text-nowrap">{{$patient->identity}}</td>
                                        <td class="text-nowrap">{{$patient->birth_place}}</td>
                                        <td class="text-nowrap">{{$patient->birth_date}}</td>
                                        <td class="text-nowrap">{{$patient->gender}}</td>
                                        <td class="text-nowrap">{{$patient->job}}</td>
                                        <td class="text-nowrap">{{$patient->address}}</td>
                                        <td class="text-nowrap">{{$patient->result}}</td>
                                        <td class="text-nowrap">{{$patient->doctor_id}}</td>
                                        <td>
                                            <a href="{{route('patient.edit', $patient->id)}}" class="btn btn-info">Update</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$patients->links()}}
                </div>
            </div>
        </div>
    </div>

  </div>
  <!-- /.container-fluid -->
@endsection