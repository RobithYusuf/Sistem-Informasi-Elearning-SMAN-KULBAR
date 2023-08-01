@extends ('layout.tampilanguru')

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <h1 class="text-center mb-1">SMA NEGERI 1 KULISUSU BARAT</h1>
                <div class="card-header">
                    <div class="card-tools" style="font-size: small;">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-secondary" role="alert">
                            {{ $message }}
                        </div>
                        @endif
                    </div>

                    <div class="card-tools" style="font-size: small;">
                        @if ($message = Session::get('update'))
                        <div class="alert alert-secondary" role="alert">
                            {{ $message }}
                        </div>
                        @endif
                    </div>

                    <div class="card-tools" style="font-size: small;">
                        @if ($message = Session::get('berhasil'))
                        <div class="alert alert-secondary" role="alert">
                            {{ $message }}
                        </div>
                        @endif
                    </div>

                    <div class="card-tools" style="font-size: small;">
                        @if ($message = Session::get('edit'))
                        <div class="alert alert-secondary" role="alert">
                            {{ $message }}
                        </div>
                        @endif
                    </div>

                    <div class="card-body p-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col" style="text-align: center;">Nama Kelas</th>
                                    <th scope="col" style="text-align: center;">Konten</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($data as $no => $value)
                                <tr>
                                    <th scope="row">{{ $no+1}}</th>
                                    <td style="text-align: center;"><strong>{{ $value->nama_kelas }}</strong></td>
                                    <td>
                                        <div style="text-align: center;">
                                            <a href="/materipelajaran/{{ $value->kode_kelas}}" class="btn btn-info btn-sm"><i class="fa fa-eye">Materi</i></a>
                                            <a href="/tugaspelajaran/{{ $value->kode_kelas}}" class="btn btn-success btn-sm"><i class="fa fa-eye">Tugas</i></a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- <div class="row">
        <div class="col"> -->
                <!-- Isi dengan konten di dalam row baru -->
                <!-- </div>
    </div> -->

            </div>


            @endsection