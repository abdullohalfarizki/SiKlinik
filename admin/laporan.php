<?php
include "proses/connect.php";

date_default_timezone_set("Asia/Jakarta");
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
<div class="col-lg-9 mt-3">
    <div class="me-lg-3">
        <div class="card mb-3">
            <div class="card-header bg-body">
                <div class="d-flex justify-content-end">
                    <a href="laporan" class="">Laporan | Data Laporan</a>
                </div>
            </div>
        </div>
        <div class="navbar-nav nav-pills mb-2  flex-column justify-content-end flex-grow-1">
            <div class=" card justify-content-center">
                <div class="card-header">
                    <b>Laporan</b>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="d-flex justify-content-between">
                            <a target="__blank" href="../cetak_Laporan.php" class="btn btn-tambah me-3"><i class="bi bi-printer"></i> Cetak</a>
                            <div class="d-flex justify-content-between">
                                <input type="search" name="cari" class="form-control me-2" aria-label="search" placeholder="Cari. . . .">
                                <button class="btn btn-success">Cari</button>
                            </div>
                        </div>
                    </div>

                    <?php
                    if (empty($result)) {
                        echo "<div class='text-center border mt-5'>Tidak ada Data Pembayaran!</div>";
                    } else {

                    ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-nowrap">
                                        <th scope="col">No.</th>
                                        <th scope="col">Tanggal Pembayaran</th>
                                        <th scope="col">Tanggal Periksa</th>
                                        <th scope="col">Nama Pasien</th>
                                        <th scope="col">Nama Dokter</th>
                                        <th scope="col">Keluhan</th>
                                        <th scope="col">Diagnosa</th>
                                        <th scope="col">Obat</th>
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
                                                <td><?= $row['nama_obat']; ?></td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>