<?php

include "connect.php";

//Ambil data yang dikirim pada form
$nik_pasien = (isset($_POST['nik_pasien'])) ? htmlentities($_POST['nik_pasien']) : "";
$nama_pasien = (isset($_POST['nama_pasien'])) ? htmlentities($_POST['nama_pasien']) : "";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password'])) : "";
$jenis_kelamin = (isset($_POST['jenis_kelamin'])) ? htmlentities($_POST['jenis_kelamin']) : "";
$usia = (isset($_POST['usia'])) ? htmlentities($_POST['usia']) : "";
$telp_pasien = (isset($_POST['telp_pasien'])) ? htmlentities($_POST['telp_pasien']) : "";
$alamat_pasien = (isset($_POST['alamat_pasien'])) ? htmlentities($_POST['alamat_pasien']) : "";

//jika tombol simpan diklik lakukan pengecekan nomor identitas pasien/nik
if (!empty($_POST['simpan'])) {
    $select = mysqli_query($conn, "SELECT * FROM pasien WHERE nik_pasien = '$nik_pasien'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>
                        alert("Nomor Identitas Pasien Sudah Digunakan!");
                        window.history.back()
                    </script>';
    } else {
        //jika no identitas belum digunakan(tidak daka di database) lakukan query untuk menambahkan data pasien baru ke database
        $query = mysqli_query($conn, "INSERT INTO pasien (nik_pasien, nama_pasien, username, password, jenis_kelamin, usia, telp_pasien, alamat_pasien) VALUES ('$nik_pasien','$nama_pasien','$username','$password','$jenis_kelamin','$usia','$telp_pasien','$alamat_pasien')");
        if (!$query) {
            $message = '<script>
                        alert("Data Pasien Gagal ditambahkan!");
                        window.history.back()
                    </script>';
        } else {
            $message = '<script>
                        alert("Data Pasien Berhasil ditambahkan!");
                        window.location = "../pasien";
                    </script>';
        }
    }
}
echo $message;
