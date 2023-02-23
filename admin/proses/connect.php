<?php
$conn =  mysqli_connect('localhost', 'root', '', 'db_klinik');
if (!$conn) {
    echo "Gagal Koneksi ke database!";
}
