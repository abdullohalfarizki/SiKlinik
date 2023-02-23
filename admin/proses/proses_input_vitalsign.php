<?php

include "connect.php";

//Ambil data yang dikirim pada form

$id_vitalsign = (isset($_POST['id_vitalsign'])) ? htmlentities($_POST['id_vitalsign']) : "";
$pasien = (isset($_POST['pasien'])) ? htmlentities($_POST['pasien']) : "";
$perawat = (isset($_POST['perawat'])) ? htmlentities($_POST['perawat']) : "";
$keluhan = (isset($_POST['keluhan'])) ? htmlentities($_POST['keluhan']) : "";

// var_dump($pasien, $perawat, $keluhan);
// die;

if (!empty($_POST['simpan'])) {
    $select = mysqli_query($conn, "SELECT * FROM vitalsign WHERE id_pasien = '$pasien'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>
                        alert("Nama Pasien sudah Ada!");
                        window.history.back()
                    </script>';
    } else {
        //lakukan query untuk menambahkan vitalsign baru ke database
        $query = mysqli_query($conn, "INSERT INTO vitalsign (id_pasien, id_perawat, keluhan) VALUES ('$pasien','$perawat','$keluhan')");
        if (!$query) {
            $message = '<script>
                        alert("Data Vitalsign Gagal ditambahkan!");
                        window.history.back()
                    </script>';
        } else {
            $message = '<script>
                        alert("Data Vitalsign Berhasil ditambahkan!");
                        window.location = "../vitalsign";
                    </script>';
        }
    }
}
echo $message;
