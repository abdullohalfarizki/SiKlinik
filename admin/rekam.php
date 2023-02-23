<?php
include "proses/connect.php";

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
                            <button class="btn btn-tambah" data-bs-toggle="modal" data-bs-target="#ModalTambahVitalsign">Tambah</button>
                            <div class="d-flex justify-content-between">
                                <input type="search" name="cari" class="form-control me-2" aria-label="search" placeholder="Cari. . . .">
                                <button class="btn btn-success">Cari</button>
                            </div>
                        </div>
                    </div>


                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM rekam_medik
                            LEFT JOIN pasien ON pasien.id_pasien = rekam_medik.pasien
                            LEFT JOIN dokter ON dokter.id_dokter = rekam_medik.dokter
                            LEFT JOIN obat ON obat.id_obat = rekam_medik.obat
                    ");
                    while ($record = mysqli_fetch_array($query)) {
                        $result[] = $record;
                        foreach ($result as $row) {
                        }

                        $select_pasien = mysqli_query($conn, "SELECT * FROM pasien");

                        $select_perawat = mysqli_query($conn, "SELECT id_perawat, nama_perawat FROM perawat");
                    ?>

                        <!-- Modal Tambah Data -->
                        <div class="modal fade" id="ModalTambahVitalsign" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-6" id="exampleModalLabel"><i class="bi bi-plus"></i> Tambah Rekam Medik </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate action="proses/proses_input_vitalsign.php" method="POST">

                                            <input type="hidden" name="id_pasien" value="<?= $row['id_pasien'] ?>">
                                            <input type="hidden" name="id_perawat" value="<?= $row['id_perawat'] ?>">


                                            <div class="row">
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
                                                            Pilih Jenis Kelamin!
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-floating mb-3">
                                                        <select name="perawat" id="perawat" class="form-select" aria-label="Default Select Example">
                                                            <option selected hidden value="">Pilih</option>
                                                            <?php
                                                            foreach ($select_perawat as $value) {
                                                                echo "<option selected value=" . $value['id_perawat'] . ">$value[nama_perawat]</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                        <label for="floatingInput">Nama Perawat</label>
                                                        <div class="invalid-feedback">
                                                            Pilih Jenis Kelamin!
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

                        <!-- Modal View/Detail -->
                        <div class="modal fade" id="ModalDetail<?= $row['id_vitalsign']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-6" id="exampleModalLabel"><i class="bi bi-eye"></i> Detail Data Rekam Medik </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row mt-2">
                                            <div class="col-4 ps-0 pe-0">
                                                <h6 class="ps-4">
                                                    Identitas Pasien
                                                </h6>
                                            </div>
                                            <div class="col-auto ps-1 pe-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-auto ps-0 pe-0">
                                                <p class="ps-0"><?= $row['nik_pasien'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 ps-0 pe-0">
                                                <h6 class="ps-4">Nama Pasien</h6>
                                            </div>
                                            <div class="col-auto ps-1 pe-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-auto ps-0 pe-0">
                                                <p class="ps-0"><?= $row['nama_pasien'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 ps-0 pe-0">
                                                <h6 class="ps-4">Jenis Kelamin</h6>
                                            </div>
                                            <div class="col-auto ps-1 pe-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-auto ps-0 pe-0">
                                                <p class="ps-0"><?= $row['jenis_kelamin'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 ps-0 pe-0">
                                                <h6 class="ps-4">Usia</h6>
                                            </div>
                                            <div class="col-auto ps-1 pe-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-auto ps-0 pe-0">
                                                <p class="ps-0"><?= $row['usia'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 ps-0 pe-0">
                                                <h6 class="ps-4">Nama Perawat</h6>
                                            </div>
                                            <div class="col-auto ps-1 pe-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-auto ps-0 pe-0">
                                                <p class="ps-0"><?= $row['nama_perawat'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 ps-0 pe-0">
                                                <h6 class="ps-4">Keluhan</h6>
                                            </div>
                                            <div class="col-auto ps-1 pe-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-auto ps-0 pe-0">
                                                <p class="ps-0"><?= $row['keluhan'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir View/Detail -->

                        <!-- Modal Edit Data -->
                        <div class="modal fade" id="ModalEdit<?= $row['id_vitalsign']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-6" id="exampleModalLabel"><i class="bi bi-pencil-square"></i> Edit Data Rekam Medik </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate action="proses/proses_edit_vitalsign.php" method="POST">

                                            <input type="hidden" name="id_vitalsign" value="<?= $row['id_vitalsign'] ?>">
                                            <input type="hidden" name="id_pasien" value="<?= $row['id_pasien'] ?>">
                                            <input type="hidden" name="id_perawat" value="<?= $row['id_perawat'] ?>">


                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-floating mb-3">
                                                        <select disabled name="pasien" id="pasien" class="form-select" aria-label="Default Select Example">
                                                            <option selected disabled value=""><?= $row['nama_pasien'] ?></option>
                                                        </select>
                                                        <label for="floatingInput">Nama Pasien</label>
                                                        <div class="invalid-feedback">
                                                            Pilih Jenis Kelamin!
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-floating mb-3">
                                                        <select disabled name="perawat" id="perawat" class="form-select" aria-label="Default Select Example">
                                                            <option selected hidden value=""><?= $row['nama_perawat'] ?></option>
                                                        </select>
                                                        <label for="floatingInput">Nama Perawat</label>
                                                        <div class="invalid-feedback">
                                                            Pilih Jenis Kelamin!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <textarea required class="form-control" name="keluhan" id="floatingInput" cols="30" rows="10" style="height: 90px;"><?= $row['keluhan'] ?></textarea>
                                                <label for="floatingInput">Keluhan Pasien</label>
                                                <div class="invalid-feedback">
                                                    Masukan Keluhan Pasien!
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
                        <div class="modal fade" id="ModalHapus<?= $row['id_vitalsign']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-fullscreen-md-down">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-6" id="exampleModalLabel"><i class="bi bi-trash"></i> Hapus Data Rekam Medik </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate action="proses/proses_hapus_vitalsign.php" method="POST">
                                            <input type="hidden" name="id_vitalsign" value="<?= $row['id_vitalsign']; ?>">
                                            <div class="col lg-12 text-center mb-3">
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
                                        <th scope="col">No Identitas Pasien</th>
                                        <th scope="col">Nama Pasien</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Nama Dokter</th>
                                        <th scope="col">Keluhan</th>
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
                                            <td><?= $row['nik_pasien']; ?></td>
                                            <td><?= ucwords($row['nama_pasien']); ?></td>
                                            <td><?= $row['jenis_kelamin']; ?></td>
                                            <td><?= $row['nama_dokter']; ?></td>
                                            <td><?= $row['keluhan']; ?></td>
                                            <td class="">
                                                <div class="row">
                                                    <div class="col d-flex">
                                                        <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalDetail<?= $row['id_vitalsign']; ?>"><i class="bi bi-eye"></i> Detail</button>
                                                        <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?= $row['id_vitalsign']; ?>"><i class="bi bi-pencil-square"></i> Edit</button>
                                                        <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalHapus<?= $row['id_vitalsign']; ?>"><i class="bi bi-trash"></i> Hapus</button>
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