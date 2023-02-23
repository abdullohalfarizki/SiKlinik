<?php
include "proses/connect.php";
?>

<div class="col-lg-9 mt-3">
    <div class="me-lg-3">
        <div class="card mb-3">
            <div class="card-header bg-body">
                <div class="d-flex justify-content-end">
                    <a href="perawat" class="">Perawat | Data Perawat</a>
                </div>
            </div>
        </div>
        <div class="navbar-nav nav-pills mb-2  flex-column justify-content-end flex-grow-1">
            <div class=" card justify-content-center">
                <div class="card-header">
                    <b>Perawat</b>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-tambah" data-bs-toggle="modal" data-bs-target="#ModalTambahPerawat">Tambah</button>
                            <div class="d-flex justify-content-between">
                                <input type="search" name="cari" class="form-control me-2" aria-label="search" placeholder="Cari. . . .">
                                <button class="btn btn-success">Cari</button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Tambah Data -->
                    <div class="modal fade" id="ModalTambahPerawat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-6" id="exampleModalLabel"><i class="bi bi-plus"></i> Tambah Perawat </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_input_perawat.php" method="POST">

                                        <div class="form-floating mb-3">
                                            <input required type="text" name="nama_perawat" class="form-control" id="floatingInput" placeholder="Jhon">
                                            <label for="floatingInput">Nama Perawat</label>
                                            <div class="invalid-feedback">
                                                Masukan Nama Perawat!
                                            </div>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" aria-label="Default Select Example">
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
                                            <input required type="number" name="telp_perawat" class="form-control" id="floatingInput" placeholder="082122223333">
                                            <label for="floatingInput">Nomor Telpon</label>
                                            <div class="invalid-feedback">
                                                Masukan Nomor Telpon!
                                            </div>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <textarea required class="form-control" name="alamat_perawat" id="floatingInput" cols="30" rows="10" style="height: 90px;"></textarea>
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
                    $query = mysqli_query($conn, "SELECT * FROM perawat");
                    while ($record = mysqli_fetch_array($query)) {
                        $result[] = $record;

                        foreach ($result as $row) {
                        }
                    ?>
                        <!-- Modal Tambah Edit -->
                        <div class="modal fade" id="ModalEdit<?= $row['id_perawat']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-6" id="exampleModalLabel"><i class="bi bi-pencil-square"></i> Edit Data Perawat </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate action="proses/proses_edit_perawat.php" method="POST">

                                            <input type="hidden" name="id_perawat" value="<?= $row['id_perawat'] ?>">

                                            <div class=" form-floating mb-3">
                                                <input required type="text" name="nama_perawat" value="<?= $row['nama_perawat'] ?>" class="form-control" id="floatingInput" placeholder="Jhon">
                                                <label for="floatingInput">Nama Perawat</label>
                                                <div class="invalid-feedback">
                                                    Masukan Nama Perawat!
                                                </div>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <select name="jenis_kelamin" value="<?= $row['jk_perawat'] ?>" id="jenis_kelamin" class="form-select" aria-label="Default Select Example">
                                                    <option selected hidden value="">Pilih Jenis Kelamin</option>
                                                    <?php
                                                    $data = array("Laki-laki", "Perempuan");
                                                    foreach ($data as $key => $value) {
                                                        if ($row['jk_perawat'] == $value) {
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
                                                <input required type="number" name="telp_perawat" value="<?= $row['telp_perawat'] ?>" class="form-control" id="floatingInput" placeholder="082122223333">
                                                <label for="floatingInput">Nomor Telpon</label>
                                                <div class="invalid-feedback">
                                                    Masukan Nomor Telpon!
                                                </div>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <textarea required class="form-control" name="alamat_perawat" id="floatingInput" cols="30" rows="10" style="height: 90px;"><?= $row['alamat_perawat'] ?></textarea>
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
                        <div class="modal fade" id="ModalHapus<?= $row['id_perawat']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-fullscreen-md-down">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-6" id="exampleModalLabel"><i class="bi bi-trash"></i> Hapus Data Perawat </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate action="proses/proses_hapus_perawat.php" method="POST">
                                            <input type="hidden" name="id_perawat" value="<?= $row['id_perawat']; ?>">
                                            <div class="col lg-12 text-center mb-3">
                                                <?php
                                                echo "Apakah anda yakin ingin menghapus Perawat <b>$row[nama_perawat]</b>";
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
                        echo "<div class='text-center border mt-5'>Tidak ada Data Perawat!</div>";
                    } else {
                    ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-nowrap">
                                        <th scope="col">No.</th>
                                        <th scope="col">Nama Perawat</th>
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
                                            <td><?= ucwords($row['nama_perawat']); ?></td>
                                            <td><?= $row['jk_perawat']; ?></td>
                                            <td><?= $row['telp_perawat']; ?></td>
                                            <td><?= $row['alamat_perawat']; ?></td>
                                            <td class="">
                                                <div class="row">
                                                    <div class="col d-flex">
                                                        <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?= $row['id_perawat']; ?>"><i class="bi bi-pencil-square"></i> Edit</button>
                                                        <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalHapus<?= $row['id_perawat']; ?>"><i class="bi bi-trash"></i> Hapus</button>
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