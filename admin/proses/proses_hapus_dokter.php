<?php
include "connect.php";

//Ambil data yang di inputkan
$id_dokter = (isset($_POST['id_dokter']) ? htmlentities($_POST['id_dokter']) : "");

//Jika tombol hapus diklik lakukan query delete data Dokter berdasarkan id_dokter
if (!empty($_POST['hapus'])) {
    $query = mysqli_query($conn, "DELETE FROM dokter WHERE id_dokter='$id_dokter'");
    if ($query) {
        $message = '<script>
                        alert("Data Dokter Berhasil dihapus!");
                        window.location = "../dokter";
                    </script>';
    } else {
        $message =  '<script>
                    alert("Data Dokter Gagal dihapus!");
                </script>';
    }
}
echo $message;
