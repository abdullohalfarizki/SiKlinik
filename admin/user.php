<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM user");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<div class="col-lg-9 mt-3">
    <div class="me-lg-3">
        <div class="card mb-3">
            <div class="card-header bg-body">
                <div class="d-flex justify-content-end">
                    <a href="user" class="">User | Data User</a>
                </div>
            </div>
        </div>
        <div class="navbar-nav nav-pills mb-2  flex-column justify-content-end flex-grow-1">
            <div class=" card justify-content-center">
                <div class="card-header">
                    <b>User</b>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-tambah" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">Tambah</button>
                            <div class="d-flex justify-content-between">
                                <input type="search" name="cari" class="form-control me-2" aria-label="search" placeholder="Cari. . . .">
                                <button class="btn btn-success">Cari</button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Tambah Data User-->
                    <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-6" id="exampleModalLabel"><i class="bi bi-plus"></i> Tambah User </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_input_user.php" method="POST">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input required type="text" name="nama" class="form-control" id="floatingInput" placeholder="Jhon">
                                                    <label for="floatingInput">Nama</label>
                                                    <div class="invalid-feedback">
                                                        Masukan Nama!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input required type="email" name="username" class="form-control" id="floatingInput" placeholder="contoh@gmail.com">
                                                    <label for="floatingInput">Username</label>
                                                    <div class="invalid-feedback">
                                                        Masukan Username!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input required type="password" name="password" class="form-control" id="floatingInput" placeholder="082122223333">
                                                    <label for="floatingInput">Password</label>
                                                    <div class="invalid-feedback">
                                                        Masukan Password!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input required type="number" name="telp" class="form-control" id="floatingInput" placeholder="082122223333">
                                                    <label for="floatingInput">Nomor Telpon</label>
                                                    <div class="invalid-feedback">
                                                        Masukan Nomor Telpon!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
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
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <select name="level" id="level" class="form-select" aria-label="Default Select Example">
                                                        <option selected hidden value="">Pilih Level User</option>
                                                        <option value="1">Adminnistrator</option>
                                                        <option value="2">Perawat</option>
                                                        <option value="3">Dokter</option>
                                                        <option value="4">Kasir</option>
                                                    </select>
                                                    <label for="floatingInput">Level User</label>
                                                    <div class="invalid-feedback">
                                                        Pilih Level User!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea required class="form-control" name="alamat" id="floatingInput" cols="30" rows="10" style="height: 90px;"></textarea>
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
                    <!-- Akhir Modal Tambah Data User -->

                    <?php
                    foreach ($result as $row) {
                    ?>
                        <!-- Modal Edit -->
                        <div class="modal fade" id="ModalEdit<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-6" id="exampleModalLabel"><i class="bi bi-pencil-square"></i> Edit Data User </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate action="proses/proses_edit_user.php" method="POST">
                                            <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-floating mb-3">
                                                        <input required type="text" name="nama" class="form-control" id="floatingInput" placeholder="Jhon" value="<?= ucwords($row['nama']); ?>">
                                                        <label for="floatingInput">Nama</label>
                                                        <div class="invalid-feedback">
                                                            Masukan Nama!
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-floating mb-3">
                                                        <input <?= ($row['username'] == $_SESSION['username_siklinik']) ? "disable" : "" ?> required type="email" name="username" class="form-control" id="floatingInput" placeholder="contoh@gmail.com" value="<?= $row['username'] ?>">
                                                        <label for="floatingInput">Username</label>
                                                        <div class="invalid-feedback">
                                                            Masukan Username!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-floating mb-3">
                                                        <input required type="number" name="telp" class="form-control" id="floatingInput" placeholder="082122223333" value="<?= $row['telp'] ?>">
                                                        <label for="floatingInput">Nomor Telpon</label>
                                                        <div class="invalid-feedback">
                                                            Masukan Nomor Telpon!
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-floating mb-3">
                                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" aria-label="Default Select Example">
                                                            <option selected hidden value="">Pilih Jenis Kelamin</option>
                                                            <?php
                                                            $data = array("Laki-laki", "Perempuan");
                                                            foreach ($data as $key => $value) {
                                                                if ($row['jenis_kelamin'] == $value) {
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
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-floating mb-3">
                                                        <select name="level" id="level" class="form-select" aria-label="Default Select Example">
                                                            <?php
                                                            $data = array("Administrator", "Perawat", "Dokter", "Kasir");
                                                            foreach ($data as $key => $value) {
                                                                if ($row['level'] == ++$key) {
                                                                    echo "<option value='$key' selected>$value</option>";
                                                                } else {
                                                                    echo "<option value='$key'>$value</option>";
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                        <label for="floatingInput">Level User</label>
                                                        <div class="invalid-feedback">
                                                            Pilih Level User!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <textarea required class="form-control" name="alamat" id="floatingInput" cols="30" rows="10" style="height: 90px;"><?= $row['alamat'] ?></textarea>
                                                <label for="floatingInput">Alamat</label>
                                                <div class="invalid-feedback">
                                                    Masukan Alamat!
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                                <button type="reset" class="btn btn-secondary">Reset</button>
                                                <button <?= ($row['username'] == $_SESSION['username_siklinik']) ? "disabled" : "" ?> type="submit" name="simpan" value="12345" class="btn btn-success">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal Edit-->

                        <!-- Modal Hapus -->
                        <div class="modal fade" id="ModalHapus<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-fullscreen-md-down">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-6" id="exampleModalLabel"><i class="bi bi-trash"></i> Hapus Data User </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate action="proses/proses_hapus_user.php" method="POST">
                                            <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                            <div class="col lg-12 text-center mb-3">
                                                <?php
                                                if ($row['username'] == $_SESSION['username_siklinik']) {
                                                    echo '<div class="alert alert-danger">Anda tidak dapat menghapus akun sendiri</div>';
                                                } else {
                                                    echo "Apakah anda yakin ingin menghapus user <b>$row[username]</b>";
                                                }
                                                ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" name="hapus" value="12345" class="btn btn-danger" <?= ($row['username'] == $_SESSION['username_siklinik']) ? 'disabled' : ''; ?>>Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal Hapus-->

                        <!-- Modal Reset Password-->
                        <div class="modal fade" id="ModalResetPassword<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-fullscreen-md-down">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-6" id="exampleModalLabel"><i class="bi bi-key"></i> Reset Password </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate action="proses/proses_reset_password.php" method="POST">
                                            <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                            <div class="col lg-12 text-center mb-3">
                                                <?php
                                                if ($row['username'] == $_SESSION['username_siklinik']) {
                                                    echo '<div class="alert alert-danger">Anda tidak dapat mereset password sendiri</div>';
                                                } else {
                                                    echo "Apakah anda yakin ingin mereset password user <b>$row[username]</b> menjadi password bawaan sistem yaitu <b>12345</b>";
                                                }
                                                ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="reset" value="12345" class="btn btn-success" <?= ($row['username'] == $_SESSION['username_siklinik']) ? 'disabled' : ''; ?>>Reset Password</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal Reset Password-->
                    <?php
                    }
                    if (empty($result)) {
                        echo "<div class='text-center border mt-5'>Tidak ada Data User!</div>";
                    } else {
                    ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-nowrap">
                                        <th scope="col">No.</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Level</th>
                                        <th scope="col">No HP</th>
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
                                            <td><?= ucwords($row['nama']); ?></td>
                                            <td><?= $row['username']; ?></td>
                                            <td><?= $row['jenis_kelamin']; ?></td>
                                            <td><?= ucwords($row['alamat']); ?></td>
                                            <td>
                                                <?php if ($row['level'] == 1) {
                                                    echo "Administrator";
                                                } elseif ($row['level'] == 2) {
                                                    echo "Perawat";
                                                } elseif ($row['level'] == 3) {
                                                    echo "Dokter";
                                                } elseif ($row['level'] == 4) {
                                                    echo "Kasir";
                                                } ?>
                                            </td>
                                            <td><?= $row['telp']; ?></td>
                                            <td class="">
                                                <div class="row">
                                                    <div class="col d-flex">
                                                        <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?= $row['id']; ?>"><i class="bi bi-pencil-square"></i> Edit</button>
                                                        <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalHapus<?= $row['id']; ?>"><i class="bi bi-trash"></i> Hapus</button>
                                                        <button class="btn btn-secondary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalResetPassword<?= $row['id']; ?>"><i class="bi bi-key"></i> Reset</button>
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