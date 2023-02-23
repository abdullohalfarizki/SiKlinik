<?php

include "connect.php";

//Ambil data yang dikirim pada form
$id_perawat = (isset($_POST['id_perawat'])) ? htmlentities($_POST['id_perawat']) : "";
$nama_perawat = (isset($_POST['nama_perawat'])) ? htmlentities($_POST['nama_perawat']) : "";
$jenis_kelamin = (isset($_POST['jenis_kelamin'])) ? htmlentities($_POST['jenis_kelamin']) : "";
$telp_perawat = (isset($_POST['telp_perawat'])) ? htmlentities($_POST['telp_perawat']) : "";
$alamat_perawat = (isset($_POST['alamat_perawat'])) ? htmlentities($_POST['alamat_perawat']) : "";

//jika tombol simpan diklik lakukan update data
if (!empty($_POST['simpan'])) {
    $query = mysqli_query($conn, "UPDATE perawat SET nama_perawat='$nama_perawat',jk_perawat='$jenis_kelamin', telp_perawat='$telp_perawat', alamat_perawat='$alamat_perawat' WHERE id_perawat='$id_perawat'");
    if (!$query) {
        $message = '<script>
                        alert("Data Perawat Gagal diupdate!");
                        window.history.back()
                    </script>';
    } else {
        $message = '<script>
                        alert("Data Perawat Berhasil diupdate!");
                        window.location = "../perawat";
                    </script>';
    }
}
echo $message;
