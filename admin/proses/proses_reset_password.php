<?php
include "connect.php";

//Ambil data yang dikirim dari form
$id = (isset($_POST['id']) ? htmlentities($_POST['id']) : "");

//Jika tombol hapus diklik lakukan query update password user berdasarkan id user
if (!empty($_POST['reset'])) {
    $query = mysqli_query($conn, "UPDATE tb_user SET password=md5('12345') WHERE id='$id'");
    if ($query) {
        $message = '<script>
                        alert("Password Berhasil di Reset!");
                        window.location = "../user";
                    </script>';
    } else {
        $message =  '<script>
                    alert("Password Gagal di Reset!");
                </script>';
    }
}
echo $message;
