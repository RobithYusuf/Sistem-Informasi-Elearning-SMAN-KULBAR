@extends('layout.tampilansiswa')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
<div class="card">
<!-- <h1 class="text-center mb-1">Materi Pelajaran</h1> -->
<div class="card-header">
<div class="card-tools">
<ul class="pagination pagination-sm float-right">
<li class="page-item"><a class="page-link" href="/pelajaran">&laquo;</a></li>
<li class="page-item"><a class="page-link" href="/pelajaran">Back</a></li>
</ul>
</div>
</div>

<div class="card-body p-0">
<table class="table">
<thead>
    <tr>
        <th scope="col">NO</th>
        <th scope="col" style="text-align: center;">Judul Materi</th>
        <th scope="col" style="text-align: center;">Deskripsi</th>
        <th scope="col" style="text-align: center;">Tanggal</th>
        <th scope="col" style="text-align: center;">File</th>
    </tr>
    </thead>
    <tbody>

@foreach($data as $no => $value)
<tr>
<th scope="row">{{ $no+1}}</th>
    <td style="text-align: center;">{{ $value->judul_materi}}</td>
    <td style="text-align: center;">{{ $value->deskripsi}}</td>
    <td style="text-align: center;">{{ date('d/m/Y', strtotime($value->created_at)) }}</td>
    <td style="text-align: center;">
        @if ($value->file)
            <a href="{{ asset('materi/' . $value->file) }}" class="btn btn-info btn-sm">Unduh  <i class="fas fa-download"></i></a>
        @else
            Tidak ada file
        @endif
    </td>
</tr>
@endforeach

</tbody>
</table>
</div>
</div>

</div>



@endsection