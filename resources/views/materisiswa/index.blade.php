@extends ('layout.tampilansiswa')

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
<div class="card">
<h1 class="text-center mb-1">SMA NEGERI 1 KULISUSU BARAT</h1>
<div class="card-header">
<!-- <div class="card-tools">
    navbarkanan
</div> -->
</div>

<div class="card-body p-0">
<table class="table">
<thead>
    <tr>
        <th scope="col">No</th>
        <!-- <th scope="col" style="text-align: center;">Kode Mata Pelajaran</th> -->
        <th scope="col">Nama Mata Pelajaran</th>
        <th scope="col">Nama Pengajar</th>
        <th scope="col">Aksi</th>
    </tr>
    </thead>
    <tbody>
        
    @foreach($data as $no => $value)
    <tr>
    <th scope="row">{{ $no+1}}</th>
        <!-- <td>{{ $value->kode_mapel}}</td> -->
        <td>{{ $value->nama_mapel}}</td>
        <td>{{ $value->nama_guru}}</td>
        <td>
            <div>
            <a href="/materi/{{ $value->kode_mapel}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i>Materi</a>
            <a href="/tugas/{{ $value->kode_mapel}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i>Tugas</i></a>
        </td>
    </tr>
    @endforeach

</tbody>
</table>
</div>
</div>

</div>

@endsection


