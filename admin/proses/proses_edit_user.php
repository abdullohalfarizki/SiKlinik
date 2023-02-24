<?php

include "connect.php";

//Ambil data yang dikirim pada form
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$nama = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$jenis_kelamin = (isset($_POST['jenis_kelamin'])) ? htmlentities($_POST['jenis_kelamin']) : "";
$level = (isset($_POST['level'])) ? htmlentities($_POST['level']) : "";
$telp = (isset($_POST['telp'])) ? htmlentities($_POST['telp']) : "";
$alamat = (isset($_POST['alamat'])) ? htmlentities($_POST['alamat']) : "";

//jika tombol simpan diklik lakukan update data
if (!empty($_POST['simpan'])) {
    $query = mysqli_query($conn, "UPDATE user SET nama='$nama', username='$username', jenis_kelamin='$jenis_kelamin', level='$level', telp='$telp', alamat='$alamat' WHERE id='$id' ");
    if ($query) {
        $message = '<script>
                        alert("Data User Berhasil diupdate!");
                        window.location = "../user";
                    </script>';
    } else {
        $message =  '<script>
                    alert("Data User Gagal diupdate!");
                    window.location = "../user";
                </script>';
    }
}
echo $message;
