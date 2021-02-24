@extends('layouts.app')
@section('title', 'Daftar Antrian')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Antrian</h1>
        <span>Total <span class="text-info ml-2">{{$patients->total()}}</span></span>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex flex-wrap" style="gap:10px">
                    <form action="{{route('patient.search')}}" class="px-2 py-2">
                        <div class="d-flex" style="gap:10px">
                            <span class="text-info my-auto text-nowrap">Cari NIK</span>
                            <input type="text" class="form-control" name="identity">
                            <button type="submit" class="btn btn-info"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                    <div class="card px-2 py-2">
                        <form action="{{route('today-report')}}" method="get">
                            <div class="d-flex flex-wrap flex-lg-nowrap" style="gap:10px">
                                <div class="span text-info my-auto text-nowrap">Tgl, dari :</div>
                                <input type="date" class="form-control" name="from" value={{request('from') ?? now()->format('Y-m-d')}}>
                                <div class="span text-info my-auto text-nowrap">sampai : </div>
                                <input type="date" class="form-control" name="until" value={{request('until') ?? now()->format('Y-m-d')}}>
                                <button type="submit" class="form-control btn btn-info btn-icon"><i class="fa fa-print"></i> Print</button>
                                <button type="button" role="button" onclick="showFiltered(this)" class="form-control btn btn-success btn-icon"><i class="fa fa-eye"></i> Lihat</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm table-hover table-striped">
                            <thead>
                                <tr>
                                    <th rowspan="2">No Antrian</th>
                                    <th rowspan="2">Nama</th>
                                    <th rowspan="2">HP</th>
                                    <th rowspan="2">ID</th>
                                    <th colspan="2">Kelahiran</th>
                                    <th rowspan="2">JK</th>
                                    <th rowspan="2">Pekerjaan</th>
                                    <th rowspan="2">Alamat</th>
                                    <th rowspan="2">Hasil</th>
                                    <th rowspan="2">Dokter</th>
                                    <th rowspan="2">Aksi</th>
                                </tr>
                                <tr>
                                    <th>Tempat</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($patients as $patient)
                                <tr>
                                    <td class="text-nowrap">{{str_pad($patient->queue_no, 5, '0', STR_PAD_LEFT)}}</td>
                                    <td class="text-nowrap">{{$patient->name}}</td>
                                    <td class="text-nowrap">{{$patient->phone}}</td>
                                    <td class="text-nowrap">{{$patient->identity}}</td>
                                    <td class="text-nowrap">{{$patient->birth_place}}</td>
                                    <td class="text-nowrap">{{$patient->birth_date->format('d F Y')}}</td>
                                    <td class="text-nowrap">{{$patient->gender}}</td>
                                    <td class="text-nowrap">{{$patient->job}}</td>
                                    <td class="text-nowrap">{{$patient->address}}</td>
                                    <td class="text-nowrap">{{$patient->result}}</td>
                                    <td class="text-nowrap">{{$patient->doctor->name}}</td>
                                    <td class="text-nowrap">
                                        <a href="{{route('patient.edit', $patient->id)}}" class="btn btn-info">Update</a>
                                        @if(request()->user()->role == 'SA')
                                        <button data-toggle="modal" data-target="#delete-patient-modal-{{$patient->id}}" class="btn btn-danger">Hapus</button>
                                        <div class="modal" tabindex="-1" role="dialog" id="delete-patient-modal-{{$patient->id}}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Peringatan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{route('patient.destroy', $patient->id)}}" method="post">
                                                        @csrf
                                                        @method("delete")
                                                        <div class="modal-body">
                                                            <p>Apakah anda yakin ingin menghapus antrian ini? </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                                            <button type="button" role="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$patients->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<script>
    function showFiltered(btn){
        var form = $(btn).parents('form').first();
        form.attr('action', '{{route('patient.index')}}')
        form.trigger('submit')
    }
</script>
@endsection