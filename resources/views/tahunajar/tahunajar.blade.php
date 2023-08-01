@extends('layout.tampilan')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <h1 class="text-center mb-1">SMA NEGERI 1 KULISUSU BARAT</h1>
                <div class="card-header">
                    <a href="/tahunajaran" class="btn btn-info" style="margin-bottom: 10px;">
                        <i></i> Tambah Data
                    </a>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center;">No</th>
                                <th scope="col" style="text-align: center;">Tahun Ajaran</th>
                                <th scope="col" style="text-align: center;">Semester</th>
                                <th scope="col" style="text-align: center;">Status</th>
                                <th scope="col" style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $no => $value)
                            <tr>
                                <th scope="row" style="text-align: center;">{{ $no+1}}</th>
                                <td style="text-align: center;">{{ $value->tahun_ajaran}}</td>
                                <td style="text-align: center;">{{ $value->semester}}</td>
                                <td style="text-align: center;">
                                    @if ($value->status == 'Berakhir')
                                    <i class="fas fa-times-circle text-danger"></i> <!-- Tanda silang -->
                                    Telah Berakhir
                                    @elseif ($value->status == 'Berlangsung')
                                    <i class="fas fa-check-circle text-success"></i> <!-- Tanda ceklis -->
                                    Sedang Berlangsung
                                    @elseif ($value->status == 'Belum Terlaksana')
                                    <i class="fas fa-minus-circle text-warning"></i> <!-- Tanda kurang -->
                                    Belum Terlaksana
                                    @endif
                                </td>

                                <td style="text-align: center;">
                                    <div>
                                        <a href="/tampildataajar/{{ $value->id_ajar}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                        <a href="/deletedataajar/{{ $value->id_ajar}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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