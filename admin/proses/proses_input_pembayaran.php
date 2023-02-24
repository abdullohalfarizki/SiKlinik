<?php

include "connect.php";

//Ambil data yang dikirim pada form

$id_rekam = (isset($_POST['id_rekam'])) ? htmlentities($_POST['id_rekam']) : "";
$harga = (isset($_POST['harga'])) ? htmlentities($_POST['harga']) : "";
$uang = (isset($_POST['uang'])) ? htmlentities($_POST['uang']) : "";
$kembalian = (int)$uang - (int)$harga;
$status_pembayaran = 1;

if (!empty($_POST['simpan'])) {
    //pengecekan pembyaaran jika uangnya cukup lanjjut/sebaliknya
    if ($kembalian < 0) {
        $message = '<script>
                            alert("Nominal Uang Tidak Cukup!");
                            window.history.back()
                        </script>';
    } else {
        //jika uang cukup maka lanjutkan pembayaran
        $query = mysqli_query($conn, "INSERT INTO pembayaran (rekam_medik, total_pembayaran, nominal_uang, status_pembayaran) VALUES ('$id_rekam','$harga', '$uang','$status_pembayaran')");
        if (!$query) {
            $message = '<script>
                            alert("Pembayaran gagal dilakukan!");
                            window.history.back()
                            </script>';
        } else {
            $query = mysqli_query($conn, "UPDATE rekam_medik SET status='$status_pembayaran'");
            $message = '<script>
                                alert("Pembayaran Berhasil \nUANG KEMBALIAN Rp. ' . $kembalian . '");
                                window.location = "../pembayaran";
                            </script>';
        }
    }
}
echo $message;
