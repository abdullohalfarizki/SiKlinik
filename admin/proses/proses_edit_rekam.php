<?php

include "connect.php";

//Ambil data yang dikirim pada form
$id_rekam = (isset($_POST['id_rekam'])) ? htmlentities($_POST['id_rekam']) : "";
$pasien = (isset($_POST['pasien'])) ? htmlentities($_POST['pasien']) : "";
$dokter = (isset($_POST['dokter'])) ? htmlentities($_POST['dokter']) : "";
$keluhan = (isset($_POST['keluhan'])) ? htmlentities($_POST['keluhan']) : "";
$diagnosa = (isset($_POST['diagnosa'])) ? htmlentities($_POST['diagnosa']) : "";
$obat = (isset($_POST['obat'])) ? htmlentities($_POST['obat']) : "";

if (!empty($_POST['simpan'])) {
    $query = mysqli_query($conn, "UPDATE rekam_medik SET dokter='$dokter', keluhan='$keluhan', diagnosa='$diagnosa', obat='$obat' WHERE id_rekam='$id_rekam'");
    if (!$query) {
        $message = '<script>
                        alert("Data Rekam Medik Gagal diupdate!");
                        window.history.back()
                    </script>';
    } else {
        $message = '<script>
                        alert("Data Rekam Medik Berhasil diupdate!");
                        window.location = "../rekam";
                    </script>';
    }
}
echo $message;
