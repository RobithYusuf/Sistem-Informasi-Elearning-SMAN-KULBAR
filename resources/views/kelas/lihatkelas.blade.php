@extends ('layout.tampilan')

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
<div class="card">
<h1 class="text-center mb-1">SMA NEGERI 1 KULISUSU BARAT</h1>
<div class="card-header">

<div class="card-tools">
<ul class="pagination pagination-sm float-right">
<li class="page-item"><a class="page-link" href="/kelas">&laquo;</a></li>
<li class="page-item"><a class="page-link" href="/kelas">Back</a></li>
</ul>
</div>
</div>


<div class="card-body p-0">
<table class="table">
<thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col" style="text-align: center;">NIS</th>
        <th scope="col" style="text-align: center;">Nama Siswa</th>
        <th scope="col" style="text-align: center;">Alamat</th>
        <th scope="col" style="text-align: center;">Kelas</th>
    </tr>
    </thead>
    <tbody>

@foreach($data as $no => $value)
<tr>
<th scope="row">{{ $no+1}}</th>
    <td style="text-align: center;">{{ $value->id_siswa}}</td>
    <td style="text-align: center;">{{ $value->nama_siswa}}</td>
    <td style="text-align: center;">{{ $value->alamat}}</td>
    <td style="text-align: center;">{{ $value->nama_kelas}}</td>
    <!-- <td>
        <div style="text-align: center;">
        <a href="/tampildatasiswa/{{ $value->id_siswa}}" style="color: blue;"><i class="fas fa-edit"></i></a>
        <a href="/deletedatasiswa/{{ $value->id_siswa}}" style="color: red;"><i class="fas fa-trash-alt"></i></a>
    </td> -->
</tr>
@endforeach

</tbody>
</table>
</div>
</div>

</div>

@endsection