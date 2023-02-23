<?php

include "connect.php";

//menambahkan data user ke database
$nama = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password']))  : "";
$jenis_kelamin = (isset($_POST['jenis_kelamin'])) ? htmlentities($_POST['jenis_kelamin']) : "";
$telp = (isset($_POST['telp'])) ? htmlentities($_POST['telp']) : "";
$level = (isset($_POST['level'])) ? htmlentities($_POST['level']) : "";
$alamat = (isset($_POST['alamat'])) ? htmlentities($_POST['alamat']) : "";

//jika tombol simpan diklik lakukan pengecekan username
if (!empty($_POST['simpan'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>
                        alert("Username Sudah Digunakan!");
                        window.location = "../user";
                    </script>';
    } else {
        //jika username belum digunakan(tidak daka di database) lakukan query untuk menambahkan user baru ke database
        $query = mysqli_query($conn, "INSERT INTO tb_user (nama, username, password, jenis_kelamin, level, telp, alamat) VALUES ('$nama','$username','$password','$jenis_kelamin','$level','$telp','$alamat')");
        if (!$query) {
            $message = '<script>
                        alert("Data User Gagal ditambahkan!");
                    </script>';
        } else {
            $message = '<script>
                        alert("Data User Berhasil ditambahkan!");
                        window.location = "../user";
                    </script>';
        }
    }
}
echo $message;
