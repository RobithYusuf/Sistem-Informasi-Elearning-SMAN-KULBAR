@extends('layout.tampilansiswa')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <!-- <h1 class="text-center mb-1">Tugas Pelajaran</h1> -->
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
                                <th scope="col">No</th>
                                <th scope="col">Nama Tugas</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col" style="text-align: center;">File</th>
                                <th scope="col" style="text-align: center;">Batas</th>
                                <th scope="col" style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($data as $no => $value)
                            <tr>
                                <th scope="row">{{ $no+1}}</th>
                                <td>{{$value->nama_tugas}}</td>
                                <td>{{$value->deskripsi}}</td>
                                <td style="text-align: center;">
                                    @if ($value->file)
                                    <a href="{{ asset('tugas/' . $value->file) }}" class="btn btn-info btn-sm">Unduh <i class="fas fa-download"></i></a>
                                    @else
                                    Tidak ada file
                                    @endif
                                </td>
                                <td style="text-align: center;">{{ \Carbon\Carbon::parse($value->deadline)->format('(H:i) d/m/Y') }}</td>
                                <td>
                                    <div style="text-align: center;">
                                        <!-- <a href="/editjawaban/{{ $value->kode_tugas}}" style="color: blue;"><i class="fas fa-edit"></i></a> -->
                                        <a href="/jawaban/{{ $value->kode_tugas}}" style="color: blue;"><i class="fas fa-upload"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>



        @endsection