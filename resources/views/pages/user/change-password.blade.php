@extends('layouts.app')
@section('title', 'Ganti Password')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Ganti password</h1>
      {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <!-- Content Row -->

    <div class="row justify-content-center pb-5">
        <div class="col-lg-6">
            <form action="{{route('user.change-password')}}" method="post">
                @csrf
                @method('patch')
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row form-group">
                                    <label for="inputOldPassword" class="col-form-label col-lg-4">Password Lama</label>
                                    <div class="col-lg-8">
                                        <input type="password" class="form-control @error('old_password') border-danger @enderror" name="old_password" id="inputOldPassword">
                                        @error('old_password') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="inputPassword" class="col-form-label col-lg-4">Password</label>
                                    <div class="col-lg-8">
                                        <input type="password" class="form-control @error('password') border-danger @enderror" name="password" id="inputPassword">
                                        @error('password') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="inputPasswordConfirmation" class="col-form-label col-lg-4">Konfirmasi Password</label>
                                    <div class="col-lg-8">
                                        <input type="password" class="form-control @error('password_confirmation') border-danger @enderror" name="password_confirmation" id="inputPasswordConfirmation">
                                        @error('password_confirmation') <span class="text-danger">{{$message}}</span> @enderror
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