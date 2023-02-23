<?php
session_start();
include "proses/connect.php";
if (!empty($_SESSION['userName'])) {
    header("location: home.php");
}
$query = mysqli_query($conn, "SELECT * FROM pasien");
$pasien = mysqli_num_rows($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiKlinik</title>
    <link rel="icon" type="image/x-icon" href="assets/user/favicon.ico" />
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

                    <li class="nav-item">
                        <a class="nav-link link-custom active link-custom  me-3" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-custom active link-custom me-3" href="#bantuan">Bantuan</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link link-custom active link-custom me-3" href="#login">Login</a>
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
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title text-brand ext-brand fs-5" id="exampleModalLabel">Pendaftaran</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/registrasi.php" method="POST">
                                <div class="form-group col-md-12 mb-2">
                                    <input required type="number" name="nik_pasien" class="form-control" placeholder="Nomor Identitas">
                                    <div class="invalid-feedback">
                                        Masukan Nomor Identitas!
                                    </div>
                                </div>
                                <div class="form-group col-md-12 mb-2">
                                    <input type="text" name="nama_pasien" class="form-control" placeholder="Nama Pasien">
                                    <div class="invalid-feedback">
                                        Masukan Nama Pasien!
                                    </div>
                                </div>
                                <div class="form-group col-md-12 mb-2">
                                    <input type="number" name="usia" class="form-control" placeholder="Usia Pasien">
                                    <div class="invalid-feedback">
                                        Masukan Usia!
                                    </div>
                                </div>
                                <div class="form-group col-md-12 mb-2">
                                    <select type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                        <option hidden value="" selected>Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Pilih Jenis Kelamin!
                                    </div>
                                </div>
                                <div class="form-group col-md-12 mb-2">
                                    <input type="number" name="telp_pasien" class="form-control" placeholder="Nomor Telepon">
                                    <div class="invalid-feedback">
                                        Masukan Nomor Telpon!
                                    </div>
                                </div>
                                <div class="form-group col-md-12 mb-2">
                                    <textarea type="text" name="alamat_pasien" class="form-control" placeholder="Alamat"></textarea>
                                    <div class="invalid-feedback">
                                        Masukan Alamat!
                                    </div>
                                </div>
                                <div class="form-group col-md-12 mb-2">
                                    <input type="text" name="username" class="form-control" placeholder="Username">
                                    <div class="invalid-feedback">
                                        Masukan Username!
                                    </div>
                                </div>
                                <div class="form-group col-md-12 mb-2">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    <div class="invalid-feedback">
                                        Masukan Password!
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
            <div class="container">

                <div class="row justify-content-center text-center">
                    <div class="col-lg-12" data-aos="fade-up">
                        <h1 class="display-4 fw-bold" data-aos="fade-up"><span class="text-brand">SIKLINIK</span></h1>
                    </div>
                    <div class="col-lg-5 border m-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="pt-3">
                            <h3>NOMOR ANTRIAN SAAT INI</h3>

                            <h1 class="text-brand"><?= ++$pasien; ?></h1>
                        </div>
                    </div>
                    <p class="lead mt-2 mb-4" data-aos="fade-up" data-aos-delay="400">Selamat Datang di SiKlinik.
                        <br>Jika anda belum memiliki Akun, Silahkan Registrasi terlebih dahulu.
                    </p>
                </div>
                <div class="justify-content-center text-center">
                    <a class="btn btn-brand me-3" data-aos="fade-up" data-aos-delay="600" data-bs-toggle="modal" data-bs-target="#exampleModal">Registrasi</a>
                </div>
            </div>
        </section>
        <!-- //HOME -->

        <!-- BANTUAN -->
        <section id="bantuan" class="full-height px-lg-5">
            <div class="container">

                <div class="row justify-content-center text-center">
                    <h1 class="fw-bold" data-aos="fade-up">
                        <span class="text-brand">BANTUAN</span>
                    </h1>

                    <p class="lead mt-5 mb-4" data-aos="fade-up" data-aos-delay="400">Klik Login > Klik Cetak.
                        <br>Pasien melakukan Registrasi > Input Nomor Identitas > Nama Pasien ><br> Jenis Kelamin > Nomor Telepon
                        Alamat
                    </p>

                </div>
            </div>
        </section>
        <!-- //BANTUAN -->

        <!-- LOGIN -->
        <section id="login" class="full-height px-lg-5">
            <div class="container">

                <div class="row justify-content-center text-center">
                    <div class="col-lg-12 pb-4" data-aos="fade-up">
                        <h1 class="fw-bold">
                            <span class="text-brand">LOGIN</span>
                        </h1>
                        <div class="pt-3" data-aos="fade-up" data-aos-delay="200">
                            <h4>Silahkan Login!</h4>
                        </div>
                    </div>
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <form action="proses/proses_login.php" method="POST" class="row g-lg-3 gy-3">
                            <div class="form-group col-md-12" data-aos="fade-up" data-aos-delay="500">
                                <input type="text" name="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group col-md-12" data-aos="fade-up" data-aos-delay="700">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group col-12 d-grid" data-aos="fade-up" data-aos-delay="900">
                                <button type="submit" name="simpan" value="123" class="btn btn-brand mb-3">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- //LOGIN -->
    </div>
    <!-- //CONTENT WRAPPER -->

    <?= include "footer.php" ?>

    <!-- Alert Js -->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>