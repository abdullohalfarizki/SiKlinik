<?php

include "admin/proses/connect.php";

$query = mysqli_query($conn, "SELECT * FROM pembayaran
        LEFT JOIN rekam_medik ON rekam_medik.id_rekam = pembayaran.rekam_medik
        LEFT JOIN pasien ON pasien.id_pasien = rekam_medik.pasien
        LEFT JOIN dokter ON dokter.id_dokter = rekam_medik.dokter
        LEFT JOIN obat ON obat.id_obat = rekam_medik.obat
        GROUP BY rekam_medik ORDER BY tgl_pembayaran DESC 
        ");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
$select_rekamMedik = mysqli_query($conn, "SELECT * FROM rekam_medik");
$select_pasien = mysqli_query($conn, "SELECT * FROM pasien");
$select_dokter = mysqli_query($conn, "SELECT * FROM dokter");
$select_obat = mysqli_query($conn, "SELECT * FROM obat");
?>
<!DOCTYPE html>
<html>

<head>
    <title>SiKlinik</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <table style="width: 100%;">
        <tr>
            <td align="center">
                <b>Aplikasi Kesehatan Masyarakat</b>
                <h1>SIKLINIK</h1>
                Jl. Raya Karawang-Cikampek No. 33 Purwasari Kabupaten Karawang
                <hr class="pt-0">
            </td>
        </tr>
    </table>

    <p align="center">
        <b>LAPORAN DATA SIKLINIK</b><br>
    </p>
    <p class="tahun" align="center">
        TAHUN <?php date_default_timezone_set("Asia/Jakarta");
                echo date("Y/2024") ?>
    </p>

    <div class="table">
        <table class="table">
            <thead>
                <tr class="text-nowrap">
                    <th scope="col"><b>No.</th>
                    <th scope="col">Tanggal Pembayaran</th>
                    <th scope="col">Tanggal Periksa</th>
                    <th scope="col">Nama Pasien</th>
                    <th scope="col">Nama Dokter</th>
                    <th scope="col">Keluhan</th>
                    <th scope="col">Diagnosa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($result as $row) {
                    if (!empty($row['status_pembayaran'])) {
                ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $row['tgl_pembayaran']; ?></td>
                            <td><?= $row['tgl_periksa']; ?></td>
                            <td><?= ucwords($row['nama_pasien']); ?></td>
                            <td><?= $row['nama_dokter']; ?></td>
                            <td><?= $row['keluhan']; ?></td>
                            <td><?= $row['diagnosa']; ?></td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>
</body>
<script type="text/javascript">
    window.print();
</script>
<table class="ttd" style="width: 100%;">
    <thead>
        <tr align="center">
            <td style="width: 60%;">

            </td>
            <td>
                Karawang, <?php date_default_timezone_set("Asia/Jakarta");
                            echo date("d, M Y") ?><br>
                <p>Pimpinan SiKlinik,</p><br><br>
                <b>Abduloh Alfarizki
                    </br>

            </td>
        </tr>
</table>

</html>