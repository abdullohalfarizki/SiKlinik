<?php

include "connect.php";

//Ambil data yang dikirim pada form
$id_vitalsign = (isset($_POST['id_vitalsign'])) ? htmlentities($_POST['id_vitalsign']) : "";
$keluhan = (isset($_POST['keluhan'])) ? htmlentities($_POST['keluhan']) : "";


if (!empty($_POST['simpan'])) {
    $query = mysqli_query($conn, "UPDATE vitalsign SET keluhan='$keluhan'WHERE id_vitalsign='$id_vitalsign'");
    if (!$query) {
        $message = '<script>
                        alert("Data Vital Sign Gagal diupdate!");
                        window.history.back()
                    </script>';
    } else {
        $message = '<script>
                        alert("Data Vital Sign Berhasil diupdate!");
                        window.location = "../vitalsign";
                    </script>';
    }
}
echo $message;
