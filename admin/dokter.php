<?php
include "proses/connect.php";
?>

<div class="col-lg-9 mt-3">
    <div class="me-lg-3">
        <div class="card mb-3">
            <div class="card-header bg-body">
                <div class="d-flex justify-content-end">
                    <a href="dokter" class="">Dokter | Data Dokter</a>
                </div>
            </div>
        </div>
        <div class="navbar-nav nav-pills mb-2  flex-column justify-content-end flex-grow-1">
            <div class=" card justify-content-center">
                <div class="card-header">
                    <b>Dokter</b>
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
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-6" id="exampleModalLabel"><i class="bi bi-plus"></i> Tambah Dokter </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_input_dokter.php" method="POST">

                                        <div class="form-floating mb-3">
                                            <input required type="text" name="nama_dokter" class="form-control" id="floatingInput" placeholder="Jhon">
                                            <label for="floatingInput">Nama Dokter</label>
                                            <div class="invalid-feedback">
                                                Masukan Nama Dokter!
                                            </div>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <select name="jk_dokter" id="jk_dokter" class="form-select" aria-label="Default Select Example">
                                                <option selected hidden value="">Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            <label for="floatingInput">Jenis Kelamin</label>
                                            <div class="invalid-feedback">
                                                Pilih Jenis Kelamin!
                                            </div>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input required type="number" name="telp_dokter" class="form-control" id="floatingInput" placeholder="082122223333">
                                            <label for="floatingInput">Nomor Telpon</label>
                                            <div class="invalid-feedback">
                                                Masukan Nomor Telpon!
                                            </div>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <textarea required class="form-control" name="alamat_dokter" id="floatingInput" cols="30" rows="10" style="height: 90px;"></textarea>
                                            <label for="floatingInput">Alamat</label>
                                            <div class="invalid-feedback">
                                                Masukan Alamat!
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
                    $query = mysqli_query($conn, "SELECT * FROM dokter");
                    while ($record = mysqli_fetch_array($query)) {
                        $result[] = $record;

                        foreach ($result as $row) {
                        }
                    ?>

                        <!-- Modal Tambah Edit -->
                        <div class="modal fade" id="ModalEdit<?= $row['id_dokter']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-6" id="exampleModalLabel"><i class="bi bi-pencil-square"></i> Edit Data Dokter </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate action="proses/proses_edit_dokter.php" method="POST">

                                            <input type="hidden" name="id_dokter" value="<?= $row['id_dokter'] ?>">

                                            <div class=" form-floating mb-3">
                                                <input required type="text" name="nama_dokter" value="<?= $row['nama_dokter'] ?>" class="form-control" id="floatingInput" placeholder="Jhon">
                                                <label for="floatingInput">Nama Dokter</label>
                                                <div class="invalid-feedback">
                                                    Masukan Nama Dokter!
                                                </div>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <select name="jk_dokter" value="<?= $row['jk_dokter'] ?>" id="jk_dokter" class="form-select" aria-label="Default Select Example">
                                                    <option selected hidden value="">Pilih Jenis Kelamin</option>
                                                    <?php
                                                    $data = array("Laki-laki", "Perempuan");
                                                    foreach ($data as $key => $value) {
                                                        if ($row['jk_dokter'] == $value) {
                                                            echo "<option value='$value' selected>$value</option>";
                                                        } else {
                                                            echo "<option value='$value'>$value</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <label for="floatingInput">Jenis Kelamin</label>
                                                <div class="invalid-feedback">
                                                    Pilih Jenis Kelamin!
                                                </div>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <input required type="number" name="telp_dokter" value="<?= $row['telp_dokter'] ?>" class="form-control" id="floatingInput" placeholder="082122223333">
                                                <label for="floatingInput">Nomor Telpon</label>
                                                <div class="invalid-feedback">
                                                    Masukan Nomor Telpon!
                                                </div>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <textarea required class="form-control" name="alamat_dokter" id="floatingInput" cols="30" rows="10" style="height: 90px;"><?= $row['alamat_dokter'] ?></textarea>
                                                <label for="floatingInput">Alamat</label>
                                                <div class="invalid-feedback">
                                                    Masukan Alamat!
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
                        <div class="modal fade" id="ModalHapus<?= $row['id_dokter']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-fullscreen-md-down">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-6" id="exampleModalLabel"><i class="bi bi-trash"></i> Hapus Data Dokter </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate action="proses/proses_hapus_dokter.php" method="POST">
                                            <input type="hidden" name="id_dokter" value="<?= $row['id_dokter']; ?>">
                                            <div class="col lg-12 text-center mb-3">
                                                <?php
                                                echo "Apakah anda yakin ingin menghapus Dokter <b>$row[nama_dokter]</b>";
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
                        echo "<div class='text-center border mt-5'>Tidak ada Data Dokter!</div>";
                    } else {
                    ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-nowrap">
                                        <th scope="col">No.</th>
                                        <th scope="col">Nama Dokter</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Nomor Telpon</th>
                                        <th scope="col">Alamat</th>
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
                                            <td><?= ucwords($row['nama_dokter']); ?></td>
                                            <td><?= $row['jk_dokter']; ?></td>
                                            <td><?= $row['telp_dokter']; ?></td>
                                            <td><?= $row['alamat_dokter']; ?></td>
                                            <td class="">
                                                <div class="row">
                                                    <div class="col d-flex">
                                                        <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?= $row['id_dokter']; ?>"><i class="bi bi-pencil-square"></i> </button>
                                                        <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalHapus<?= $row['id_dokter']; ?>"><i class="bi bi-trash"></i> </button>
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