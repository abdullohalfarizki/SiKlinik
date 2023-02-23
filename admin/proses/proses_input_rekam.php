<?php

include "connect.php";

//Ambil data yang dikirim pada form

$id_rekam = (isset($_POST['id_rekam'])) ? htmlentities($_POST['id_rekam']) : "";
$pasien = (isset($_POST['pasien'])) ? htmlentities($_POST['pasien']) : "";
$dokter = (isset($_POST['dokter'])) ? htmlentities($_POST['dokter']) : "";
$keluhan = (isset($_POST['keluhan'])) ? htmlentities($_POST['keluhan']) : "";
$diagnosa = (isset($_POST['diagnosa'])) ? htmlentities($_POST['diagnosa']) : "";
$obat = (isset($_POST['obat'])) ? htmlentities($_POST['obat']) : "";

// var_dump($pasien, $dokter, $keluhan);
// die;

if (!empty($_POST['simpan'])) {
    $select = mysqli_query($conn, "SELECT * FROM rekam_medik WHERE pasien = '$pasien'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>
                        alert("Dat rekam medik sudah ada!");
                        window.history.back()
                    </script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO rekam_medik (pasien, dokter, keluhan, diagnosa, obat) VALUES ('$pasien','$dokter','$keluhan','$diagnosa','$obat')");
        if (!$query) {
            $message = '<script>
                        alert("Data rekam_medik gagal ditambahkan!");
                        window.history.back()
                    </script>';
        } else {
            $message = '<script>
                        alert("Data Rekam Medik berhasil ditambahkan!");
                        window.location = "../rekam";
                    </script>';
        }
    }
}
echo $message;
