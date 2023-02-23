<?php
include "connect.php";

//Ambil data yang di inputkan
$id = (isset($_POST['id']) ? htmlentities($_POST['id']) : "");

//Jika tombol hapus diklik lakukan query delete data user berdasarkan id user
if (!empty($_POST['hapus'])) {
    $query = mysqli_query($conn, "DELETE FROM tb_user WHERE id='$id'");
    if ($query) {
        $message = '<script>
                        alert("Data User Berhasil dihapus!");
                        window.location = "../user";
                    </script>';
    } else {
        $message =  '<script>
                    alert("Data User Gagal dihapus!");
                </script>';
    }
}
echo $message;
