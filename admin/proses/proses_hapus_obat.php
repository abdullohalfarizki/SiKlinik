<?php
include "connect.php";

//Ambil data yang di inputkan
$id_obat = (isset($_POST['id_obat']) ? htmlentities($_POST['id_obat']) : "");

//Jika tombol hapus diklik lakukan query delete data Obat berdasarkan id_obat
if (!empty($_POST['hapus'])) {
    $query = mysqli_query($conn, "DELETE FROM obat WHERE id_obat='$id_obat'");
    if ($query) {
        $message = '<script>
                        alert("Data Obat Berhasil dihapus!");
                        window.location = "../obat";
                    </script>';
    } else {
        $message =  '<script>
                    alert("Data Obat Gagal dihapus!");
                </script>';
    }
}
echo $message;
