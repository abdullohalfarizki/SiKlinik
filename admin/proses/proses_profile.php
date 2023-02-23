<?php

include "connect.php";

//Ambil data yang dikirim pada form
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$nama = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$jenis_kelamin = (isset($_POST['jenis_kelamin'])) ? htmlentities($_POST['jenis_kelamin']) : "";
$telp = (isset($_POST['telp'])) ? htmlentities($_POST['telp']) : "";
$alamat = (isset($_POST['alamat'])) ? htmlentities($_POST['alamat']) : "";

//jika tombol simpan diklik lakukan pengecekan username
if (!empty($_POST['simpan'])) {
    $query = mysqli_query($conn, "UPDATE tb_user SET nama='$nama', username='$username', jenis_kelamin='$jenis_kelamin', telp='$telp', alamat='$alamat' WHERE id='$id' ");
    if ($query) {
        // die;
        $message = '<script>
                        alert("Data Berhasil diupdate!");
                        window.history.back();
                    </script>';
    } else {
        $message =  '<script>
                    alert("Data Gagal diupdate!");
                    window.history.back();
                </script>';
    }
}
echo $message;
