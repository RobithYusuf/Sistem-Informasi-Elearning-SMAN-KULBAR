@extends('layout.tampilanguru')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
<div class="card">
<h1 class="text-center mb-1">Tugas Pelajaran</h1>
<div class="card-header">
<div class="card-tools">
<ul class="pagination pagination-sm float-right">
<li class="page-item"><a class="page-link" href="/berandaguru">&laquo;</a></li>
<li class="page-item"><a class="page-link" href="/berandaguru">Back</a></li>
</ul>
</div>
</div>

<div class="card-body p-0">
<table class="table">
<thead>
    <tr>
        <th scope="col">NO</th>
        <th scope="col">Nama Tugas</th>
        <th scope="col">Deskripsi</th>
        <th scope="col" style="text-align: center;">Tanggal</th>
        <th scope="col" style="text-align: center;">Deadline</th>
        <th scope="col" style="text-align: center;">File</th>
        <th scope="col" style="text-align: center;">Aksi</th>
        <th scope="col" style="text-align: center;">Jawaban</th>
    </tr>
    </thead>
    <tbody>

@foreach($data as $no => $value)
<tr>
<th scope="row">{{ $no+1}}</th>
    <td>{{ $value->nama_tugas}}</td>
    <td>{{ $value->deskripsi}}</td>
    <td>{{ date('d/m/Y', strtotime($value->created_at))}}</td>
    <td>{{ \Carbon\Carbon::parse($value->deadline)->format('(H:i) d/m/Y') }}</td>
    <td style="text-align: center;">
        @if ($value->file)
            <a href="{{ asset('tugas/' . $value->file) }}" class="btn btn-info btn-sm">Unduh  <i class="fas fa-download"></i></a>
        @else
            Tidak ada file
        @endif
    </td>
    <td>
            <div style="text-align: center;">
            <a href="/tampildatatugas/{{ $value->kode_tugas}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
            <a href="/deletedatatugas/{{ $value->kode_tugas}}" style="color: red; font-size: big;"><i class="fas fa-trash-alt"></i></a>
        </td>
        <td>
            <div style="text-align: center;">
            <a href="/jawabansiswa/{{ $value->kode_tugas}}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
        </td>
</tr>
@endforeach

</tbody>
</table>
</div>
</div>

</div>



@endsection