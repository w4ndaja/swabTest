@extends('layouts.app')
@section('title', 'Antrian Baru')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Antrian Baru</h1>
      <div class="h5">No. Pasien {{str_pad($patient->id, 10, '0', STR_PAD_LEFT)}}</div>
      <div class="h5 text-info border rounded-lg px-3 py-1 shadow-sm">No. Antrian {{str_pad($patient->queue_no, 10, '0', STR_PAD_LEFT)}}</div>
      {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <!-- Content Row -->

    <div class="row justify-content-center pb-5">
        <div class="col-lg-6">
            <form action="{{route('patient.update', $patient->id)}}" method="post">
                @method('patch')
                @csrf
                <div class="card">
                    <div class="card-header h4 text-center">Form Hasil</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row form-group">
                                    <label for="inputName" class="col-form-label col-lg-4">Nama</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control @error('name') border-danger @enderror" name="name" value="{{$patient->name}}" id="inputName" readonly>
                                        <input type="hidden" name="queue_no" value="{{$patient->queue_no}}">
                                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="inputIdentity" class="col-form-label col-lg-4">No. NIK/SIM/PASSPORT</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control @error('identity') border-danger @enderror" name="identity" value="{{$patient->identity}}" id="inputIdentity" readonly>
                                        @error('identity') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="inputCreatedAt" class="col-form-label col-lg-4">Tanggal Test</label>
                                    <div class="col-lg-8">
                                        <span class="label">{{$patient->created_at->format('d M Y')}}</span>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="inputResult" class="col-form-label col-lg-4">Hasil</label>
                                    <div class="col-lg-8">
                                        <select name="result" id="inputResult" class="form-control">
                                            <option value="" selected disabled>Pilih Hasil</option>
                                            <option value="positif" {{$patient->result === 'positif' ? 'selected' : ''}}>Positif</option>
                                            <option value="negatif"  {{$patient->result === 'negatif' ? 'selected' : ''}}>Negatif</option>
                                        </select>
                                        @error('result') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="inputResult" class="col-form-label col-lg-4">Interpretasi dan saran</label>
                                    <div class="col-lg-8">
                                        <textarea name="interpretation" id="inputInterpretation" cols="30" rows="10" class="form-control">{{$patient->interpretation}}</textarea>
                                        @error('result') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="inputReceived" class="col-form-label col-lg-4">Telah diterima</label>
                                    <div class="col-lg-8">
                                        <select name="received" id="inputReceived" class="form-control">
                                            <option value=1>Sudah</option>
                                            <option value=0 {{!$patient->received ? 'selected' : ''}}>Belum</option>
                                        </select>
                                        @error('received') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{route('print-result', $patient->id)}}" class="btn btn-success"><i class="fa fa-print"></i> Print</a>
                    </div>
                </div>
            
            </form>
        </div>
    </div>

  </div>
  <!-- /.container-fluid -->
@endsection