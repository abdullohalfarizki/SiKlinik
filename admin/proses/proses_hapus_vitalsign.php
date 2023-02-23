<?php
include "connect.php";

//Ambil data yang di inputkan
$id_vitalsign = (isset($_POST['id_vitalsign']) ? htmlentities($_POST['id_vitalsign']) : "");

//Jika tombol hapus diklik lakukan query delete data Vital Sign berdasarkan id_vitalsign
if (!empty($_POST['hapus'])) {
    $query = mysqli_query($conn, "DELETE FROM vitalsign WHERE id_vitalsign='$id_vitalsign'");
    if ($query) {
        $message = '<script>
                        alert("Data Vital Sign Berhasil dihapus!");
                        window.location = "../vitalsign";
                    </script>';
    } else {
        $message =  '<script>
                    alert("Data Vital Sign Gagal dihapus!");
                </script>';
    }
}
echo $message;
