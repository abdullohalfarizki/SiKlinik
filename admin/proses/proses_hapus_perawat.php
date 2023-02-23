<?php
include "connect.php";

//Ambil data yang di inputkan
$id_perawat = (isset($_POST['id_perawat']) ? htmlentities($_POST['id_perawat']) : "");

//Jika tombol hapus diklik lakukan query delete data Perawat berdasarkan id_perawat
if (!empty($_POST['hapus'])) {
    $query = mysqli_query($conn, "DELETE FROM perawat WHERE id_perawat='$id_perawat'");
    if ($query) {
        $message = '<script>
                        alert("Data Perawat Berhasil dihapus!");
                        window.location = "../perawat";
                    </script>';
    } else {
        $message =  '<script>
                    alert("Data Perawat Gagal dihapus!");
                </script>';
    }
}
echo $message;
