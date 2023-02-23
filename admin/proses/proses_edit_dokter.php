<?php

include "connect.php";

//Ambil data yang dikirim pada form
$id_dokter = (isset($_POST['id_dokter'])) ? htmlentities($_POST['id_dokter']) : "";
$nama_dokter = (isset($_POST['nama_dokter'])) ? htmlentities($_POST['nama_dokter']) : "";
$jk_dokter = (isset($_POST['jk_dokter'])) ? htmlentities($_POST['jk_dokter']) : "";
$telp_dokter = (isset($_POST['telp_dokter'])) ? htmlentities($_POST['telp_dokter']) : "";
$alamat_dokter = (isset($_POST['alamat_dokter'])) ? htmlentities($_POST['alamat_dokter']) : "";

//jika tombol simpan diklik maka lakukan query tmbh data dokter ke database
if (!empty($_POST['simpan'])) {
    $query = mysqli_query($conn, "UPDATE dokter SET nama_dokter='$nama_dokter',jk_dokter='$jk_dokter', telp_dokter='$telp_dokter', alamat_dokter='$alamat_dokter' WHERE id_dokter='$id_dokter'");
    if (!$query) {
        $message = '<script>
                        alert("Data Dokter Gagal diupdate!");
                        window.history.back()
                    </script>';
    } else {
        $message = '<script>
                        alert("Data Dokter Berhasil diupdate!");
                        window.location = "../dokter";
                    </script>';
    }
}
echo $message;
