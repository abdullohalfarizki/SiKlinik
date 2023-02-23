<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username ='$_SESSION[username_siklinik]'");
while ($val = mysqli_fetch_array($query)) {
    $value[] = $val;
}
?>
<nav class="navbar navbar-expand navbar-dark sticky-top">
    <div class="container-fluid">
        <a class="nav-link ms-lg-3 ms-md-3" href=".">
            <h4>SIKLINIK</h4>
        </a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light me-lg-3 me-md-3" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= ucwords($hasil['nama']); ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end bg-brand mt-2 me-lg-3">
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ModalProfile"><i class="bi bi-person-fill"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ModalUbahPassword"><i class="bi bi-key"></i> Ubah Password</a></li>
                        <li><a class="dropdown-item" href="logout"><i class="bi bi-box-arrow-in-left"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php foreach ($value as $data) { ?>
    <!-- Modal Edit -->
    <div class="modal fade" id="ModalProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-6" id="exampleModalLabel"><i class="bi bi-pencil-square"></i> Profile </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate action="proses/proses_profile.php" method="POST">
                        <input type="hidden" name="id" value="<?= $data['id']; ?>">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-floating mb-3">
                                    <input required type="text" name="nama" class="form-control" id="floatingInput" placeholder="Jhon" value="<?= ucwords($data['nama']); ?>">
                                    <label for="floatingInput">Nama</label>
                                    <div class="invalid-feedback">
                                        Masukan Nama!
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-3">
                                    <input <?= ($data['username'] == $_SESSION['username_siklinik']) ? "disable" : "" ?> required type="email" name="username" class="form-control" id="floatingInput" placeholder="contoh@gmail.com" value="<?= $data['username'] ?>">
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
                                    <input required type="number" name="telp" class="form-control" id="floatingInput" placeholder="082122223333" value="<?= $data['telp'] ?>">
                                    <label for="floatingInput">Nomor Telpon</label>
                                    <div class="invalid-feedback">
                                        Masukan Nomor Telpon!
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-3">
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" aria-label="Default Select Example">
                                        <option selected hidden value="">Pilih Jenis Kelamin</option>
                                        <?php
                                        $jk = array("Laki-laki", "Perempuan");
                                        foreach ($jk as $key => $value) {
                                            if ($data['jenis_kelamin'] == $value) {
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
                        </div>
                        <div class="form-floating mb-3">
                            <textarea required class="form-control" name="alamat" id="floatingInput" cols="30" rows="10" style="height: 90px;"><?= $data['alamat'] ?></textarea>
                            <label for="floatingInput">Alamat</label>
                            <div class="invalid-feedback">
                                Masukan Alamat!
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>
                            <button type="submit" name="simpan" value="12345" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal Edit-->
<?php } ?>

<!-- Modal Ubah Password-->
<div class="modal fade" id="ModalUbahPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-md-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-6" id="exampleModalLabel"><i class="bi bi-key"></i> Ubah Password </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate action="proses/proses_ubah_password.php" method="POST">
                    <div class="form-floating mb-3">
                        <input disabled type="email" class="form-control" name="username" id="floatingInput" placeholder="name@example.com" value="<?php echo $_SESSION['username_siklinik'] ?>">
                        <label for="floatingInput">Username</label>
                        <div class="invalid-feedback">
                            Masukan Username!
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="passwordlama" class="form-control" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">Password Lama.</label>
                        <div class="invalid-feedback">
                            Masukan Password Lama!
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" name="passwordbaru" class="form-control" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">Password Baru.</label>
                        <div class="invalid-feedback">
                            Masukan Password Baru!
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="repasswordbaru" class="form-control" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">Ulangi Password Baru.</label>
                        <div class="invalid-feedback">
                            Ulangi Password Baru!
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" name="ubah" value="12345" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<!-- End Modal Ubah Password -->