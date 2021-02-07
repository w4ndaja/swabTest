@extends('layouts.app')
@section('title', 'Print Barcode')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 d-print-none">
      <h1 class="h3 mb-0 text-danger">Print Barcode Antrian</h1>
      <div>
        <a href="{{route('patient.index')}}" class="btn btn-sm btn-info shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
        <button class="btn btn-sm btn-primary shadow-sm" onclick="window.print()"><i class="fas fa-print fa-sm text-white-50"></i> Print</button>
      </div>
    </div>

    <!-- Content Row -->

    <div class="row justify-content-center pb-5">
        <div class="border bg-white p-3" style="width : 58mm">
            <h5 class="text-center">Swab Antigen Test</h5>
            <div class="text-center">{!! \QR::size(120)->generate(url('patient/'.$patient->id)); !!}</div>
            <div class="h5 text-center pt-3">Antrean No. {{str_pad($patient->queue_no, 5, '0', STR_PAD_LEFT)}}</div>
            <div class="h6 text-center pt-3">{{now()->format('d F Y h:i')}}</div>
        </div>
    </div>

  </div>
  <!-- /.container-fluid -->
@endsection