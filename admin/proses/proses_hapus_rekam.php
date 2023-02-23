<?php
include "connect.php";

//Ambil data yang di inputkan
$id_rekam = (isset($_POST['id_rekam']) ? htmlentities($_POST['id_rekam']) : "");

//Jika tombol hapus diklik lakukan query delete data Rekam Medik berdasarkan id_rekam
if (!empty($_POST['hapus'])) {
    $query = mysqli_query($conn, "DELETE FROM rekam_medik WHERE id_rekam='$id_rekam'");
    if ($query) {
        $message = '<script>
                        alert("Data Rekam Medik Berhasil dihapus!");
                        window.location = "../rekam";
                    </script>';
    } else {
        $message =  '<script>
                    alert("Data Rekam Medik Gagal dihapus!");
                </script>';
    }
}
echo $message;
