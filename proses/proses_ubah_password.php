<?php

session_start();
include "connect.php";

$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$passwordlama = (isset($_POST['passwordlama'])) ? md5(htmlentities($_POST['passwordlama']))  : "";
$passwordbaru = (isset($_POST['passwordbaru'])) ? md5(htmlentities($_POST['passwordbaru']))  : "";
$repasswordbaru = (isset($_POST['repasswordbaru'])) ? md5(htmlentities($_POST['repasswordbaru']))  : "";


if (!empty($_POST['ubah'])) {
    $query = mysqli_query($conn, "SELECT * FROM pasien WHERE username = '$_SESSION[userName]' && password = '$passwordlama' ");
    $hasil = mysqli_fetch_array($query);
    if ($hasil) {
        if ($passwordbaru == $repasswordbaru) {
            $query = mysqli_query($conn, "UPDATE pasien SET password='$passwordbaru' WHERE username = '$_SESSION[userName]' ");
            if ($query) {
                $message = '<script>alert("Password Berhasil diubah!");
                                window.history.back()
                            </script>';
            } else {
                $message =  '<script> alert("Password Gagal diubah!"); 
                            window.history.back()</script>';
            }
        } else {
            $message =  '<script> alert("Password baru tidak sama!"); 
                        window.history.back()</script>';
        }
    } else {
        $message =  '<script> alert("Password lama tidak sesuai!"); 
                        window.history.back()
                        </script>';
    }
} else {
    header('Location:../home');
}
echo $message;
