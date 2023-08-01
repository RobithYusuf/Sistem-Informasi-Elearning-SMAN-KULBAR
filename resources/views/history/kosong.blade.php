<!DOCTYPE html>
<html>

<head>
    <title>Cetak Riwayat</title>
    <style>
        /* CSS untuk gaya cetak, Anda bisa menyesuaikan sesuai kebutuhan */
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: cornflowerblue; /* Mengubah latar belakang menjadi biru */
            color: white; /* Mengubah warna teks menjadi putih agar lebih terlihat */
        }

        /* CSS untuk mengatur posisi tengah tulisan h1 */
        .center {
            text-align: center;
        }

        /* CSS untuk teks judul */
        .title {
            font-size: 17px;
            /* Menghapus teks "bold" */
            font-weight: bold;
            margin-bottom: 5px;
        }

        .jalan {
            font-size: 14px;
            /* Menghapus teks "bold" */
            /* font-weight: bold; */
            margin-bottom: 5px;
        }

        /* CSS untuk garis panjang */
        .line {
            border: none;
            border-top: 2px solid black;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <!-- Tambahkan jeda di atas judul -->
    <br><br>

    <div class="center title">PEMERINTAH PROVINSI SULAWESI TENGGARA</div>
    <div class="center title">DINAS PENDIDIKAN DAN KEBUDAYAAN</div>
    <div class="center title">CABANG KABUPATEN BUTON UTARA</div>
    <div class="center title">SMA NEGERI 1 KULISUSU BARAT</div>
    <!-- Menghapus teks "bold" pada teks berikut -->
    <div class="center jalan">Jalan Poros Ronta – Ereke Desa Lambale Kec. Kulisusu Barat, Kode Pos 93672</div>
    <!-- Tambahkan garis panjang -->
    <div class="center line"></div>
    <br>

    <div class="center title">LAPORAN RIWAYAT E-LEARNING GURU</div>
    <!-- Tambahkan jeda setelah garis panjang
    <br><br> -->

    <table>
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
            
            <tr>
                <td>1</td>
                <td>Data Kasong</td>
                <td>Data Kasong</td>
                <td>Data Kasong</td>
                <td>Data Kasong</td>
                <td>Data Kasong</td>
            </tr>
            
        </tbody>
    </table>

</body>
</html>
