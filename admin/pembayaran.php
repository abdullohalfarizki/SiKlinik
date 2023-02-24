<!-- Data Pasien Yang Belum Bayar -->
<?php
include "proses/connect.php";

date_default_timezone_set("Asia/Jakarta");
$query = mysqli_query($conn, "SELECT * FROM rekam_medik
        LEFT JOIN pasien ON pasien.id_pasien = rekam_medik.pasien
        LEFT JOIN dokter ON dokter.id_dokter = rekam_medik.dokter
        LEFT JOIN obat ON obat.id_obat = rekam_medik.obat
        GROUP BY id_rekam ORDER BY tgl_periksa DESC ");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

$select_pasien = mysqli_query($conn, "SELECT * FROM pasien");
$select_dokter = mysqli_query($conn, "SELECT * FROM dokter");
$select_obat = mysqli_query($conn, "SELECT * FROM obat");
?>

<div class="col-lg-9 mt-3">
    <div class="me-lg-3">
        <div class="card mb-3">
            <div class="card-header bg-body">
                <div class="d-flex justify-content-end">
                    <a href="pembayaran" class="">Pembayaran | Data Pembayaran</a>
                </div>
            </div>
        </div>
        <div class="navbar-nav nav-pills mb-2  flex-column justify-content-end flex-grow-1">
            <div class=" card justify-content-center">
                <div class="card-header">
                    <b>Pembayaran</b>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="d-flex justify-content-end">
                            <div class="d-flex justify-content">
                                <input type="search" name="cari" class="form-control me-2" aria-label="search" placeholder="Cari. . . .">
                                <button class="btn btn-success">Cari</button>
                            </div>
                        </div>
                    </div>


                    <?php
                    foreach ($result as $row) { ?>

                        <!-- Modal Pembayaran -->
                        <div class="modal fade" id="ModalPembayaran<?= $row['id_rekam']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-6" id="exampleModalLabel"><i class="bi bi-plus"></i> Pembayaran</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate action="proses/proses_input_pembayaran.php" method="POST">

                                            <input type="hidden" name="id_rekam" value="<?= $row['id_rekam'] ?>">
                                            <input type="hidden" name="id_pasien" value="<?= $row['id_pasien'] ?>">
                                            <input type="hidden" name="harga" value="<?= $row['harga'] ?>">

                                            <div class="row mt-3">
                                                <div class="col-4">
                                                    <div class="form-floating mb-3">
                                                        <input disabled type="text" name="nik_pasien" value="<?= $row['nik_pasien'] ?>" class="form-control" id="floatingInput">
                                                        <label for="floatingInput">Identitas Pasien</label>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-floating mb-3">
                                                        <input disabled type="text" name="nik_pasien" value="<?= $row['nama_pasien'] ?>" class="form-control" id="floatingInput">
                                                        <label for="floatingInput">Nama Pasien</label>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-floating mb-3">
                                                        <input disabled type="text" name="nik_pasien" value="<?= $row['jenis_kelamin'] ?>" class="form-control" id="floatingInput">
                                                        <label for="floatingInput">Jenis Kelamin</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr class="text-nowrap">
                                                            <th scope="col">Tanggal Periksa</th>
                                                            <th scope="col">Nama Obat</th>
                                                            <th scope="col">Harga</th>
                                                            <th scope="col">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr>
                                                            <td><?= $row['tgl_periksa'] ?></td>
                                                            <td><?= $row['nama_obat'] ?></td>
                                                            <td><?= $row['harga'] ?></td>
                                                            <td><span class='badge text-bg-danger'>Belum Bayar</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" class="fw-bold">
                                                                Total Harga
                                                            </td>
                                                            <td class="fw-bold">
                                                                <?= $row['harga'] ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" class="fw-bold mt-5">
                                                                Total Tagihan
                                                            </td>
                                                            <td class="fw-bold">
                                                                <?= $row['harga'] ?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <h5 class="mt-4 ps-2">Bayar Sekarang</h5>
                                            <div class="col-4 mt-3 mb-5">
                                                <div class="form-floating">
                                                    <input type="number" name="uang" class="form-control" id="floatingInput" placeholder="0">
                                                    <label for="floatingInput">Masukan Nominal Uang</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" name="simpan" value="12345" class="btn btn-success">Bayar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal Pembayaran -->

                    <?php
                    }
                    if (empty($result)) {
                        echo "<div class='text-center border mt-5'>Tidak ada Data Rekam Medik!</div>";
                    } else { ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-nowrap">
                                        <th scope="col">No.</th>
                                        <th scope="col">Tanggal Periksa</th>
                                        <th scope="col">No Identitas Pasien</th>
                                        <th scope="col">Nama Pasien</th>
                                        <th scope="col">Nama Dokter</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($result as $row) {
                                        if (empty($row['status'])) {
                                    ?>
                                            <tr>
                                                <th scope="row"><?= $no++; ?></th>
                                                <td><?= $row['tgl_periksa']; ?></td>
                                                <td><?= $row['nik_pasien']; ?></td>
                                                <td><?= ucwords($row['nama_pasien']); ?></td>
                                                <td><?= $row['nama_dokter']; ?></td>
                                                <td class="">
                                                    <div class="row">
                                                        <div class="col d-flex">
                                                            <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalPembayaran<?= $row['id_rekam']; ?>"> Bayar</button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- Akhir Data Pasien Yang Belum Bayar -->

        <!-- Pembayaran -->
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

        <div class="navbar-nav nav-pills mb-2  flex-column justify-content-end flex-grow-1">
            <div class=" card justify-content-center">
                <div class="card-header">
                    <b>Pembayaran</b>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="d-flex justify-content-end">
                            <div class="d-flex justify-content-between">
                                <input type="search" name="cari" class="form-control me-2" aria-label="search" placeholder="Cari. . . .">
                                <button class="btn btn-success">Cari</button>
                            </div>
                        </div>
                    </div>

                    <?php
                    foreach ($result as $row) { ?>

                        <!-- Modal Detail Data -->
                        <div class="modal fade" id="ModalDetail<?= $row['id_rekam']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-6" id="exampleModalLabel"><i class="bi bi-eye"></i> Detail Data Pembayaran </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate action="proses/proses_edit_rekam.php" method="POST">

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-floating mb-3">
                                                        <input disabled type="text" name="nik_pasien" value="<?= $row['tgl_periksa'] ?>" class="form-control" id="floatingInput">
                                                        <label for="floatingInput">Tanggal Periksa</label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-floating mb-3">
                                                        <input disabled type="number" name="nik_pasien" value="<?= $row['nik_pasien'] ?>" class="form-control" id="floatingInput" placeholder="32053320070001">
                                                        <label for="floatingInput">Nomor Identitas Pasien</label>
                                                        <div class="invalid-feedback">
                                                            Masukan Nomor Identitas Pasien!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-6">
                                                    <div class="form-floating mb-3">
                                                        <select name="pasien" id="pasien" class="form-select" aria-label="Default Select Example" disabled>
                                                            <option selected hidden value="">Pilih</option>
                                                            <?php
                                                            foreach ($select_pasien as $value) {
                                                                if ($row['pasien'] == $value['id_pasien']) {
                                                                    echo "<option selected value=" . $value['id_pasien'] . ">$value[nama_pasien]</option>";
                                                                } else {
                                                                    echo "<option value=" . $value['id_pasien'] . ">$value[nama_pasien]</option>";
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                        <label for="floatingInput">Nama Pasien</label>
                                                        <div class="invalid-feedback">
                                                            Pilih Pasien!
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-floating mb-3">
                                                        <select disabled name="dokter" id="dokter" class="form-select" aria-label="Default Select Example">
                                                            <option value=""><?= $row['jenis_kelamin'] ?></option>
                                                        </select>
                                                        <label for="floatingInput">Jenis Kelamin pasien</label>
                                                        <div class="invalid-feedback">
                                                            Pilih Jenis Kelamin pasien!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-floating mb-3">
                                                        <input disabled type="number" name="umur" value="<?= $row['usia'] ?>" class="form-control" id="floatingInput" placeholder="32053320070001">
                                                        <label for="floatingInput">Usia Pasien</label>
                                                        <div class="invalid-feedback">
                                                            Masukan Umur Pasien!
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-floating mb-3">
                                                        <select disabled name="dokter" id="dokter" class="form-select" aria-label="Default Select Example">
                                                            <option selected hidden value="">Pilih</option>
                                                            <?php
                                                            foreach ($select_dokter as $value) {
                                                                if ($row['dokter'] == $value['id_dokter']) {
                                                                    echo "<option selected value=" . $value['id_dokter'] . ">$value[nama_dokter]</option>";
                                                                } else {
                                                                    echo "<option value=" . $value['id_dokter'] . ">$value[nama_dokter]</option>";
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                        <label for="floatingInput">Nama Dokter</label>
                                                        <div class="invalid-feedback">
                                                            Pilih Dokter!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <textarea disabled class="form-control" name="keluhan" id="floatingInput" cols="30" rows="10" style="height: 80px;"><?= $row['keluhan']; ?></textarea>
                                                <label for="floatingInput">Keluhan Pasien</label>
                                                <div class="invalid-feedback">
                                                    Masukan Keluhan Pasien!
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <textarea disabled class="form-control" name="diagnosa" id="floatingInput" cols="30" rows="10" style="height: 90px;"><?= $row['diagnosa']; ?></textarea>
                                                <label for="floatingInput">Diagnosa</label>
                                                <div class="invalid-feedback">
                                                    Masukan Diagnosa!
                                                </div>
                                            </div>
                                            <div class="col-auto mb-5">
                                                <div class="form-floating">
                                                    <select disabled name="obat" id="obat" class="form-select" aria-label="Default Select Example">
                                                        <option selected hidden value="">Pilih</option>
                                                        <?php
                                                        foreach ($select_obat as $value) {
                                                            if ($row['obat'] == $value['id_obat']) {
                                                                echo "<option selected value=" . $value['id_obat'] . ">$value[nama_obat]</option>";
                                                            } else {
                                                                echo "<option value=" . $value['id_obat'] . ">$value[nama_obat]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="floatingInput">Nama Obat</label>
                                                    <div class="invalid-feedback">
                                                        Pilih Obat!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal Detail Data -->

                    <?php
                    }
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
                                        <th scope="col">Status</th>
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
                                                <td>
                                                    <span class='badge text-bg-success'>Lunas</span>
                                                </td>
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