<?php
include "connect.php";

//Ambil data yang di inputkan
$id_pasien = (isset($_POST['id_pasien']) ? htmlentities($_POST['id_pasien']) : "");

//Jika tombol hapus diklik lakukan query delete data pasien berdasarkan id_pasien
if (!empty($_POST['hapus'])) {
    $query = mysqli_query($conn, "DELETE FROM pasien WHERE id_pasien='$id_pasien'");
    if ($query) {
        $message = '<script>
                        alert("Data Pasien Berhasil dihapus!");
                        window.location = "../pasien";
                    </script>';
    } else {
        $message =  '<script>
                    alert("Data Pasien Gagal dihapus!");
                </script>';
    }
}
echo $message;
