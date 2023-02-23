<?php

include "connect.php";

//Ambil data yang dikirim pada form
$id_pasien = (isset($_POST['id_pasien'])) ? htmlentities($_POST['id_pasien']) : "";
$nik_pasien = (isset($_POST['nik_pasien'])) ? htmlentities($_POST['nik_pasien']) : "";
$nama_pasien = (isset($_POST['nama_pasien'])) ? htmlentities($_POST['nama_pasien']) : "";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$jenis_kelamin = (isset($_POST['jenis_kelamin'])) ? htmlentities($_POST['jenis_kelamin']) : "";
$usia = (isset($_POST['usia'])) ? htmlentities($_POST['usia']) : "";
$telp_pasien = (isset($_POST['telp_pasien'])) ? htmlentities($_POST['telp_pasien']) : "";
$alamat_pasien = (isset($_POST['alamat_pasien'])) ? htmlentities($_POST['alamat_pasien']) : "";

//jika tombol simpan diklik lakukan update data
if (!empty($_POST['simpan'])) {
    $query = mysqli_query($conn, "UPDATE pasien SET nama_pasien='$nama_pasien', username='$username', jenis_kelamin='$jenis_kelamin', usia='$usia', telp_pasien='$telp_pasien', alamat_pasien='$alamat_pasien' WHERE id_pasien='$id_pasien'");
    if (!$query) {
        $message = '<script>
                        alert("Data Pasien Gagal diupdate!");
                        window.history.back()
                    </script>';
    } else {
        $message = '<script>
                        alert("Data Pasien Berhasil diupdate!");
                        window.location = "../pasien";
                    </script>';
    }
}
echo $message;
