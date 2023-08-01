@extends('layout.tampilanguru')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <h1 class="text-center mb-1">Materi Pelajaran</h1>
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
                                <th scope="col" style="text-align: center;">Pertemuan</th>
                                <th scope="col">Judul Materi</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col" style="text-align: center;">File</th>
                                <th scope="col" style="text-align: center;">Tanggal</th>
                                <th scope="col" style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($data as $no => $value)
                            <tr>
                                <th style="text-align: center;" scope="row">{{ $no+1}}</th>
                                <td>{{ $value->judul_materi}}</td>
                                <td>{{ $value->deskripsi}}</td>
                                <td style="text-align: center;">
                                    @if ($value->file)
                                        <a href="{{ asset('materi/' . $value->file) }}" class="btn btn-info btn-sm"> <i class="fas fa-download"></i></a>
                                    @else
                                        Tidak ada file
                                    @endif
                                </td>
                                <td style="text-align: center;" >{{ date('d/m/Y', strtotime($value->created_at))}}</td>
                                <td>
                                    <div style="text-align: center;">
                                        <a href="/tampildatamateri/{{ $value->kode_materi}}" style="color: blue; font-size: small;"><i class="fas fa-edit"></i></a>
                                        <a href="/deletedatamateri/{{ $value->kode_materi}}" style="color: red; font-size: small;"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
