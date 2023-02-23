<?php
// session_start();
include "connect.php";

//Ambil data yang dikirim dari form
$id_pasien = (isset($_POST['id_pasien']) ? htmlentities($_POST['id_pasien']) : "");

//Jika tombol hapus diklik lakukan query update password user berdasarkan id user
if (!empty($_POST['reset'])) {
    $query = mysqli_query($conn, "UPDATE pasien SET password=md5('12345') WHERE id_pasien='$id_pasien'");
    if ($query) {
        echo '<script>
                        alert("Password Berhasil di Reset!");
                        window.location = "../user.php";
                    </script>';
    } else {
        echo  "<script>
                    alert('Password Gagal di Reset!');
                </script>";
    }
}
