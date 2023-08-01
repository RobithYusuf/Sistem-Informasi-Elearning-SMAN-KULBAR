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
                                <th scope="col">No</th>
                                <th scope="col">Nama Tugas</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col" style="text-align: center;">Batas Waktu</th>
                                <th scope="col" style="text-align: center;">Waktu Upload</th>
                                <th scope="col" style="text-align: center;">File</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($data as $no => $value)
                            <tr>
                                <th scope="row">{{ $no+1}}</th>
                                <td>{{ $value->nama_tugas}}</td>
                                <td>{{ $value->nama_siswa}}</td>
                                <td style="text-align: center;">{{ date('H:i - (d/m/Y)', strtotime($value->deadline))}}</td>
                                <td style="text-align: center;">{{ date('H:i - (d/m/Y)', strtotime($value->created_at))}}</td>
                                <td style="text-align: center;">
                                    @if ($value->file)
                                    <a href="{{ asset('jawaban/' . $value->file) }}" class="btn btn-info btn-sm">Unduh <i class="fas fa-download"></i></a>
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