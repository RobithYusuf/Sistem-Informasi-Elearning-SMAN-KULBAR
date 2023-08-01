@extends('layout.tampilan')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <h1 class="text-center mb-4" style="margin-bottom: 20px;">SMA NEGERI 1 KULISUSU BARAT</h1>
                <div class="card-header">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-sm-4 mb-2 mb-sm-2">
                            <form action="/riwayat" method="get" class="form-inline">
                                <table>
                                    <tr>
                                        <!-- Tanggal Mulai -->
                                        <div class="form-group mr-2">
                                            <td>
                                                <label class="justify-content-start" for="start_date"> Dari Tanggal</label>
                                            </td>
                                            <td>:</td>
                                            <td>
                                                <input type="date" id="start_date" name="start_date" class="form-control" value="{{ $start_date }}">
                                            </td>
                                        </div>
                                    </tr>
                                    <tr>
                                        <!-- Tanggal Selesai -->
                                        <div class="form-group mr-2">
                                            <td>
                                                <label class="justify-content-start" for="end_date">Sampai Tanggal</label>
                                            </td>
                                            <td>:</td>
                                            <td>
                                                <input type="date" id="end_date" name="end_date" class="form-control" value="{{ $end_date }}">
                                            </td>
                                        </div>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>

                        <div class="col-sm-4 mb-2 mb-sm-2">
                            <!-- Form for Filter -->
                            <form action="/riwayat" method="get" class="form-inline d-flex justify-content-end mb-3">
                                <div class="input-group input-group-sm">
                                    <select name="mapel" class="form-control" onchange="this.form.submit()">
                                        <option value="" {{ $filterOption === '' ? 'selected' : '' }}>Semua</option>
                                        <option value="Pendidikan Agama Islam" {{ $filterOption === 'Pendidikan Agama Islam' ? 'selected' : '' }}>Pendidikan Agama Islam</option>
                                        <option value="Kewarganegaraan" {{ $filterOption === 'Kewarganegaraan' ? 'selected' : '' }}>Kewarganegaraan</option>
                                        <option value="Bahasa Indonesia" {{ $filterOption === 'Bahasa Indonesia' ? 'selected' : '' }}>Bahasa Indonesia</option>
                                        <option value="Bahasa Inggris" {{ $filterOption === 'Bahasa Inggris' ? 'selected' : '' }}>Bahasa Inggris</option>
                                        <option value="Matematika" {{ $filterOption === 'Matematika' ? 'selected' : '' }}>Matematika</option>
                                        <option value="Fisika" {{ $filterOption === 'Fisika' ? 'selected' : '' }}>Fisika</option>
                                        <option value="Kimia" {{ $filterOption === 'Kimia' ? 'selected' : '' }}>Kimia</option>
                                        <option value="Biologi" {{ $filterOption === 'Biologi' ? 'selected' : '' }}>Biologi</option>
                                        <option value="Sejarah Indonesia" {{ $filterOption === 'Sejarah Indonesia' ? 'selected' : '' }}>Sejarah Indonesia</option>
                                        <option value="Penjaskes" {{ $filterOption === 'Penjaskes' ? 'selected' : '' }}>Penjaskes</option>
                                        <option value="Seni Budaya" {{ $filterOption === 'Seni Budaya' ? 'selected' : '' }}>Seni Budaya</option>
                                        <option value="Bimbingan Konseling" {{ $filterOption === 'Bimbingan Konseling' ? 'selected' : '' }}>Bimbingan Konseling</option>
                                        <option value="Geografi" {{ $filterOption === 'Geografi' ? 'selected' : '' }}>Geografi</option>
                                        <option value="Sosiologi" {{ $filterOption === 'Sosiologi' ? 'selected' : '' }}>Sosiologi</option>
                                        <option value="Sejarah" {{ $filterOption === 'Sejarah' ? 'selected' : '' }}>Sejarah</option>
                                        <!-- Tambahkan opsi filter lain sesuai kebutuhan -->
                                    </select>

                                    <button type="submit" class="btn btn-primary ml-2">Filter</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mapel</th>
                            <th>Nama Guru</th>
                            <th>Judul Materi</th>
                            <th>Kelas</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $no => $value)
                        <tr>
                            <td>{{ $no+1 }}</td>
                            <td>{{ $value->nama_mapel }}</td>
                            <td>{{ $value->nama_guru }}</td>
                            <td @if($value->judul_materi)
                                <i class="fas fa-check-circle text-success"></i> {{ $value->judul_materi }}
                                @else
                                <i class="fas fa-times-circle text-danger"></i></a> Belum Upload
                                @endif
                            </td>

                            <td>{{ $value->nama_kelas ?? '---------' }}</td>
                            <td>{{ date('d-m-y', strtotime($value->created_at)) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="col-md-7 text-md-right">
                    <form action="/cetak" method="get">
                        <button type="submit" class="btn btn-warning"><strong>Cetak Riwayat</strong></button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection