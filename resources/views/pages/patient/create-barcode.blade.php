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
        <div class="border bg-white p-3" style="width : 100%;">
            <h1 class="text-center" style="font-size:84px">Swab Antigen Test</h1>
            <div class="text-center">{!! \QR::size(520)->generate(url('dashboard/patient/'.$patient->id.'/edit')); !!}</div>
            <div class="h1 text-center pt-3"  style="font-size:132px">Antrean No. {{str_pad($patient->queue_no, 5, '0', STR_PAD_LEFT)}}</div>
            <div class="h1 text-center pt-3"  style="font-size:84px">{{now()->format('d F Y H:i')}}</div>
        </div>
    </div>

  </div>
  <!-- /.container-fluid -->
@endsection
