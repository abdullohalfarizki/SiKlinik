<?php
include "connect.php";

//Registrasi pasien / menambahkan data pendaftaran pasien ke database
//Mengambil data yang telah diinfutkan
$nik_pasien = (isset($_POST['nik_pasien'])) ? htmlentities($_POST['nik_pasien']) : "";
$nama_pasien = (isset($_POST['nama_pasien'])) ? htmlentities($_POST['nama_pasien']) : "";
$jenis_kelamin = (isset($_POST['jenis_kelamin'])) ? htmlentities($_POST['jenis_kelamin']) : "";
$usia = (isset($_POST['usia'])) ? htmlentities($_POST['usia']) : "";
$telp_pasien = (isset($_POST['telp_pasien'])) ? htmlentities($_POST['telp_pasien']) : "";
$alamat_pasien = (isset($_POST['alamat_pasien'])) ? htmlentities($_POST['alamat_pasien']) : "";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password']))  : "";

//Jika tombol diklik maka lakukan pengecekan no identitas/nik pasien
if (!empty($_POST['simpan'])) {
    $select = mysqli_query($conn, "SELECT * FROM pasien WHERE nik_pasien = '$nik_pasien'");
    if (mysqli_num_rows($select) > 0) {
        echo '<script>
                        alert("Nomor Identitas Sudah Terdaftar!");
                        window.history.back();
                    </script>';
    } else {
        //jika nik blm digunakan maka lanjutkan pendaftaran 
        $query = mysqli_query($conn, "INSERT INTO pasien (nik_pasien, nama_pasien, jenis_kelamin, usia, telp_pasien, alamat_pasien,  username, password) VALUES ('$nik_pasien','$nama_pasien','$jenis_kelamin','$usia','$telp_pasien','$alamat_pasien','$username','$password')");
        if (!$query) {
            var_dump($query);
        } else {
            echo '<script>
                        alert("Pendaftaran Berhasil!");
                        window.location = "../main.php";
                    </script>';
        }
    }
}
