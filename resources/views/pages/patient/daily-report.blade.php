<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title')</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">
    <h1 class="text-center">Laporan Harian Tanggal {{now()->format('d F Y')}}</h1>
    <table class="table table-bordered table-sm mt-5">
        <thead>
            <tr>
                <th>No Antrean</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Hasil</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patients as $patient)
            <tr>
                <td>{{str_pad($patient->queue_no, 5, '0', STR_PAD_LEFT)}}</td>
                <td>{{$patient->name}}</td>
                <td>{{$patient->address}}</td>
                <td>{{$patient->result}}</td>
            </tr>
            @endforeach
            <tr>
                <th colspan="3">Total</th>
                <th>{{$patients->count()}}</th>
            </tr>
        </tbody>
    </table>
    <script>
        window.print()
        setTimeout(() => {
            window.history.back();
        }, 2000);
    </script>
</body>

</html>
