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
                    <a href="rekam" class="">Rekam Medik | Data Rekam Medik</a>
                </div>
            </div>
        </div>
        <div class="navbar-nav nav-pills mb-2  flex-column justify-content-end flex-grow-1">
            <div class=" card justify-content-center">
                <div class="card-header">
                    <b>Rekam Medik</b>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-tambah" data-bs-toggle="modal" data-bs-target="#ModalTambah">Tambah</button>
                            <div class="d-flex justify-content-between">
                                <input type="search" name="cari" class="form-control me-2" aria-label="search" placeholder="Cari. . . .">
                                <button class="btn btn-success">Cari</button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Tambah Data -->
                    <div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-6" id="exampleModalLabel"><i class="bi bi-plus"></i> Tambah Rekam Medik </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_input_rekam.php" method="POST">
                                        <div class="row mt-3">
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <select name="pasien" id="pasien" class="form-select" aria-label="Default Select Example">
                                                        <option selected hidden value="">Pilih</option>
                                                        <?php
                                                        foreach ($select_pasien as $value) {
                                                            echo "<option selected value=" . $value['id_pasien'] . ">$value[nama_pasien]</option>";
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
                                                    <select name="dokter" id="dokter" class="form-select" aria-label="Default Select Example">
                                                        <option selected hidden value="">Pilih</option>
                                                        <?php
                                                        foreach ($select_dokter as $value) {
                                                            echo "<option selected value=" . $value['id_dokter'] . ">$value[nama_dokter]</option>";
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
                                            <textarea required class="form-control" name="keluhan" id="floatingInput" cols="30" rows="10" style="height: 90px;"></textarea>
                                            <label for="floatingInput">Keluhan Pasien</label>
                                            <div class="invalid-feedback">
                                                Masukan Keluhan Pasien!
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea required class="form-control" name="diagnosa" id="floatingInput" cols="30" rows="10" style="height: 90px;"></textarea>
                                            <label for="floatingInput">Diagnosa</label>
                                            <div class="invalid-feedback">
                                                Masukan Diagnosa!
                                            </div>
                                        </div>
                                        <div class="col-auto mb-5">
                                            <div class="form-floating">
                                                <select name="obat" id="obat" class="form-select" aria-label="Default Select Example">
                                                    <option selected hidden value="">Pilih</option>
                                                    <?php
                                                    foreach ($select_obat as $value) {
                                                        echo "<option selected value=" . $value['id_obat'] . ">$value[nama_obat]</option>";
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
                                            <button type="reset" class="btn btn-secondary">Reset</button>
                                            <button type="submit" name="simpan" value="12345" class="btn btn-success">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Modal Tambah Data -->

                    <?php
                    foreach ($result as $row) { ?>

                        <!-- Modal Detail Data -->
                        <div class="modal fade" id="ModalDetail<?= $row['id_rekam']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-6" id="exampleModalLabel"><i class="bi bi-eye"></i> Detail Data Rekam Medik </h1>
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

                        <!-- Modal Edit Data -->
                        <div class="modal fade" id="ModalEdit<?= $row['id_rekam']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-6" id="exampleModalLabel"><i class="bi bi-pencil-square"></i> Edit Data Rekam Medik </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate action="proses/proses_edit_rekam.php" method="POST">

                                            <input type="hidden" name="id_rekam" value="<?= $row['id_rekam'] ?>">
                                            <input type="hidden" name="id_pasien" value="<?= $row['id_pasien'] ?>">

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
                                                        <select name="dokter" id="dokter" class="form-select" aria-label="Default Select Example">
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
                                                <textarea required class="form-control" name="keluhan" id="floatingInput" cols="30" rows="10" style="height: 90px;"><?= $row['keluhan']; ?></textarea>
                                                <label for="floatingInput">Keluhan Pasien</label>
                                                <div class="invalid-feedback">
                                                    Masukan Keluhan Pasien!
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <textarea required class="form-control" name="diagnosa" id="floatingInput" cols="30" rows="10" style="height: 90px;"><?= $row['diagnosa']; ?></textarea>
                                                <label for="floatingInput">Diagnosa</label>
                                                <div class="invalid-feedback">
                                                    Masukan Diagnosa!
                                                </div>
                                            </div>
                                            <div class="col-auto mb-5">
                                                <div class="form-floating">
                                                    <select name="obat" id="obat" class="form-select" aria-label="Default Select Example">
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
                                                <button type="reset" class="btn btn-secondary">Reset</button>
                                                <button type="submit" name="simpan" value="12345" class="btn btn-success">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal Edit Data -->

                        <!-- Modal Hapus -->
                        <div class="modal fade" id="ModalHapus<?= $row['id_rekam']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-fullscreen-md-down">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-6" id="exampleModalLabel"><i class="bi bi-trash"></i> Hapus Data Rekam Medik </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate action="proses/proses_hapus_rekam.php" method="POST">
                                            <input type="hidden" name="id_rekam" value="<?= $row['id_rekam']; ?>">
                                            <div class="col lg-12 text-center mb-3 ps-4 pe-4 ">
                                                <?php
                                                echo "Apakah anda yakin ingin menghapus data Rekam Medik <b>$row[nama_pasien]</b>";
                                                ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" name="hapus" value="12345" class="btn btn-danger">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal Hapus-->

                    <?php
                    }
                    if (empty($result)) {
                        echo "<div class='text-center border mt-5'>Tidak ada Data Rekam Medik!</div>";
                    } else {
                    ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-nowrap">
                                        <th scope="col">No.</th>
                                        <th scope="col">Tanggal Periksa</th>
                                        <th scope="col">No Identitas Pasien</th>
                                        <th scope="col">Nama Pasien</th>
                                        <th scope="col">Nama Dokter</th>
                                        <th scope="col">Keluhan</th>
                                        <th scope="col">Diagnosa</th>
                                        <th scope="col">Obat</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($result as $row) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $no++; ?></th>
                                            <td><?= $row['tgl_periksa']; ?></td>
                                            <td><?= $row['nik_pasien']; ?></td>
                                            <td><?= ucwords($row['nama_pasien']); ?></td>
                                            <td><?= $row['nama_dokter']; ?></td>
                                            <td><?= $row['keluhan']; ?></td>
                                            <td><?= $row['diagnosa']; ?></td>
                                            <td><?= $row['nama_obat']; ?></td>
                                            <td class="">
                                                <div class="row">
                                                    <div class="col d-flex">
                                                        <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalDetail<?= $row['id_rekam']; ?>"><i class="bi bi-eye"></i> </button>
                                                        <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?= $row['id_rekam']; ?>"><i class="bi bi-pencil-square"></i> </button>
                                                        <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalHapus<?= $row['id_rekam']; ?>"><i class="bi bi-trash"></i> </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>