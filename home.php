<?php
session_start();
if (empty($_SESSION['userName'])) {
    header("location: main.php");
}

include "proses/connect.php";

$query = mysqli_query($conn, "SELECT * FROM pasien WHERE username='$_SESSION[userName] ' ");
$hasil = mysqli_fetch_array($query);

$select = mysqli_query($conn, "SELECT * FROM pasien");
$pasien = mysqli_num_rows($select);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siklinik</title>
    <link rel="icon" type="image/x-icon" href="assets/brand/favicon.ico" />
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="assets/user/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/user/css/aos.css">
    <link rel="stylesheet" href="assets/user/css/line-awesome.min.css">
    <link rel="stylesheet" href="assets/user/css/style.css">
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href=".">
                <b class="fw-bold ">SIKLINIK</b>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto text-lg-center">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?=
                            ucwords($hasil['nama_pasien']);
                            ?>
                        </a>
                        <ul class="dropdown-menu bg-base mt-2 me-lg-3 me-md-3">
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ModalProfile<?= $hasil['id_pasien']; ?>">Profile</a></li>
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ModalUbahPassword<?= $hasil['id_pasien']; ?>">Ubah Password</a></li>
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ModalResetPassword<?= $hasil['id_pasien']; ?>">Reset Password</a></li>
                            <li><a class="dropdown-item" href="proses/logout.php">Logout</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- //NAVBAR -->
    <!-- CONTENT WRAPPER -->

    <div id="content-wrapper">

        <!-- //HOME -->
        <section id="home" class="full-height px-5">

            <!-- Modal -->
            <div class="modal fade" id="ModalProfile<?= $hasil['id_pasien']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title text-brand ext-brand fs-5" id="exampleModalLabel">Profile</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_edit_profile.php" method="POST">
                                <input type="hidden" name="id_pasien" value="<?= $hasil['id_pasien'] ?>">

                                <div class="form-group col-md-12 mb-2">
                                    <input disabled type="number" name="nik_pasien" value="<?= $hasil['nik_pasien'] ?>" class="form-control" placeholder="Nomor Identitas">
                                    <div class="invalid-feedback">
                                        Masukan Nomor Identitas!
                                    </div>
                                </div>
                                <div class="form-group col-md-12 mb-2">
                                    <input required type="text" name="nama_pasien" value="<?= $hasil['nama_pasien'] ?>" class="form-control" placeholder="Nama Pasien">
                                    <div class="invalid-feedback">
                                        Masukan Nama Pasien!
                                    </div>
                                </div>
                                <div class="form-group col-md-12 mb-2">
                                    <input required type="text" name="username" value="<?= $hasil['username'] ?>" class="form-control" placeholder="Username">
                                    <div class="invalid-feedback">
                                        Masukan Username!
                                    </div>
                                </div>
                                <div class="form-group col-md-12 mb-2">
                                    <input required type="number" name="usia" value="<?= $hasil['usia'] ?>" class="form-control" placeholder="Usia Pasien">
                                    <div class="invalid-feedback">
                                        Masukan Usia!
                                    </div>
                                </div>
                                <div class="form-group col-md-12 mb-2">
                                    <select required type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin">
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
                                    <div class="invalid-feedback">
                                        Pilih Jenis Kelamin!
                                    </div>
                                </div>
                                <div class="form-group col-md-12 mb-2">
                                    <input required type="number" name="telp_pasien" value="<?= $hasil['telp_pasien'] ?>" class="form-control" placeholder="Nomor Telepon">
                                    <div class="invalid-feedback">
                                        Masukan Nomor Telpon!
                                    </div>
                                </div>
                                <div class="form-group col-md-12 mb-2">
                                    <textarea required type="text" name="alamat_pasien" value="" class="form-control" placeholder="Alamat"><?= $hasil['alamat_pasien'] ?></textarea>
                                    <div class="invalid-feedback">
                                        Masukan Alamat!
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-batal" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-simpan btn-sm" name="simpan" value="123">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal -->

            <!-- Ubah Pass -->
            <div class="modal fade" id="ModalUbahPassword<?= $hasil['id_pasien']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-6" id="exampleModalLabel"><i class="bi bi-key"></i> Ubah Password </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_ubah_password.php" method="POST">

                                <div class="form-group col-md-12 mb-2">
                                    <input required type="email" name="username" class="form-control" placeholder="Username" value="<?= $_SESSION['userName'] ?>">
                                    <div class="invalid-feedback">
                                        Masukan Username!
                                    </div>
                                </div>
                                <div class="form-group col-md-12 mb-2">
                                    <input required type="password" name="passwordlama" value="" class="form-control" placeholder="Password Lama*" value="">
                                    <div class="invalid-feedback">
                                        Masukan Password Lama!
                                    </div>
                                </div>
                                <div class="form-group col-md-12 mb-2">
                                    <input required type="password" name="passwordbaru" value="" class="form-control" placeholder="Password Baru*" value="">
                                    <div class="invalid-feedback">
                                        Masukan Password Baru!
                                    </div>
                                </div>
                                <div class="form-group col-md-12 mb-2">
                                    <input required type="password" name="repasswordbaru" value="" class="form-control" placeholder="Ulangi Password Baru*" value="">
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
            <!-- End Passs -->

            <!-- Modal Reset Password-->
            <div class="modal fade" id="ModalResetPassword<?= $hasil['id_pasien']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-6" id="exampleModalLabel"><i class="bi bi-key"></i> Reset Password </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_reset_password.php" method="POST">
                                <input type="hidden" name="id_pasien" value="<?= $hasil['id_pasien']; ?>">
                                <div class="col lg-12 text-center mb-3">
                                    <?php

                                    echo "Apakah anda yakin ingin mereset password user <b>$hasil[username]</b> menjadi password bawaan sistem yaitu <b>12345</b>";

                                    ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="reset" value="12345" class="btn btn-success">Reset Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Akhir Modal Reset Password-->


            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
                        <h1 class="display-4 fw-bold" data-aos="fade-up"><span class="text-brand">SIKLINIK</span></h1>
                    </div>
                    <div class="col-lg-5 border m-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="pt-3">
                            <h3>NOMOR ANTRIAN SAAT INI</h3>
                            <h1 class="text-brand"><?= ++$pasien; ?></h1>
                        </div>
                    </div>
                    <div class="pt-5" data-aos="fade-up" data-aos-delay="400">
                        <h5>AMBIL ANTRIAN</h5>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-5 mt-4 m-2" data-aos="fade-up" data-aos-delay="500">
                    <div class="p-2">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nomor Antrian Anda</th>
                                    <th> : </th>
                                    <th><?= --$pasien; ?></th>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <th> : </th>
                                    <th><?= $hasil['nama_pasien']; ?></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="col-lg-1 col-md-1 mt-4 m-2 justify-content-center">
                    <div class="py-3">
                        <a target="__blank" href="cetak.php" class="btn btn-brand me-3" data-aos="fade-up" data-aos-delay="500">Cetak</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

<?php
include "footer.php"; ?>