<?php
include "proses/connect.php";

$select = mysqli_query($conn, "SELECT * FROM pasien");
$pasien = mysqli_num_rows($select);

$select = mysqli_query($conn, "SELECT * FROM dokter");
$dokter = mysqli_num_rows($select);

$select = mysqli_query($conn, "SELECT * FROM rekam_medik");
$rekamMedik = mysqli_num_rows($select);

$select = mysqli_query($conn, "SELECT * FROM user");
$user = mysqli_num_rows($select);
?>

<div class="col-lg-9 mt-3">
    <div class="me-lg-3">
        <div class="card mb-3">
            <div class="card-header bg-body">
                <div class="d-flex justify-content-end">
                    <a href="." class="">Home | Home</a>
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <div class="d-flex justify-content-between">
                <div class="col-2">
                    <div class="cards text-center py-4" data-aos="fade-up" data-aos-delay="150">
                        <div class="cardss">
                            <h1><?= $pasien; ?></h1>
                            <h6>Data Pasien</h6>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="cards text-center py-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="cardss">
                            <h1><?= $dokter; ?></h1>
                            <h6>Data Dokter</h6>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="cards text-center py-4" data-aos="fade-up" data-aos-delay="500">
                        <div class="cardss">
                            <h1><?= $rekamMedik; ?></h1>
                            <h6>Rekam Medik</h6>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="cards text-center py-4" data-aos="fade-up" data-aos-delay="700">
                        <div class="cardss">
                            <h1><?= $user; ?></h1>
                            <h6>Data User</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>