<?php

include "connect.php";

//Ambil data yang dikirim pada form
$nama_perawat = (isset($_POST['nama_perawat'])) ? htmlentities($_POST['nama_perawat']) : "";
$jenis_kelamin = (isset($_POST['jenis_kelamin'])) ? htmlentities($_POST['jenis_kelamin']) : "";
$telp_perawat = (isset($_POST['telp_perawat'])) ? htmlentities($_POST['telp_perawat']) : "";
$alamat_perawat = (isset($_POST['alamat_perawat'])) ? htmlentities($_POST['alamat_perawat']) : "";

//jika tombol simpan diklik cek data perawat
if (!empty($_POST['simpan'])) {
    //jika nama perawat tidak daka di database lakukan query untuk menambahkan data perawat baru ke database
    $select = mysqli_query($conn, "SELECT * FROM perawat WHERE nama_perawat = '$nama_perawat'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>
                        alert("Data Dokter Sudah Ada!");
                        window.history.back()
                    </script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO perawat (nama_perawat, jk_perawat, telp_perawat, alamat_perawat) VALUES ('$nama_perawat','$jenis_kelamin','$telp_perawat','$alamat_perawat')");
        if (!$query) {
            $message = '<script>
                        alert("Data Perawat Gagal ditambahkan!");
                        window.history.back()
                    </script>';
        } else {
            $message = '<script>
                        alert("Data Perawat Berhasil ditambahkan!");
                        window.location = "../perawat";
                    </script>';
        }
    }
}
echo $message;
