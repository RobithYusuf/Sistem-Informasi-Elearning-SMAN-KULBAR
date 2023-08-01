@extends('layout.tampilan')

@section('content')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <h1 class="text-center mb-1">SMA NEGERI 1 KULISUSU BARAT</h1>
                <div class="card-header"></div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-centered">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align: center;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $no => $value)
                                <tr>
                                <td style="text-align: center;"><strong>{{ $value->nama_kelas }}</strong></td>

                                </tr>
                                <tr>
                                    <td colspan="1">
                                        <div class="text-center">
                                            <a href="/tambahdatamateri/{{ $value->kode_kelas }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-upload"></i> Materi
                                            </a>
                                            <a href="/materipelajaran/{{ $value->kode_kelas }}" class="btn btn-info btn-sm">
                                                <i class="fa fa-eye"></i> Materi
                                            </a>
                                            <a href="/tambahdatatugas/{{ $value->kode_kelas }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-upload"></i> Tugas
                                            </a>
                                            <a href="/tugaspelajaran/{{ $value->kode_kelas }}" class="btn btn-info btn-sm">
                                                <i class="fa fa-eye"></i> Tugas
                                            </a>
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
</div>
@endsection
