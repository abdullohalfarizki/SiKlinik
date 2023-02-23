<?php

include "connect.php";

//Ambil data yang dikirim pada form
$nama_dokter = (isset($_POST['nama_dokter'])) ? htmlentities($_POST['nama_dokter']) : "";
$jenis_kelamin = (isset($_POST['jenis_kelamin'])) ? htmlentities($_POST['jenis_kelamin']) : "";
$telp_dokter = (isset($_POST['telp_dokter'])) ? htmlentities($_POST['telp_dokter']) : "";
$alamat_dokter = (isset($_POST['alamat_dokter'])) ? htmlentities($_POST['alamat_dokter']) : "";


//jika tombol simpan diklik cek data doter
if (!empty($_POST['simpan'])) {
    //jika nama dokter tidak daka di database lakukan query untuk menambahkan data obat baru ke database
    $select = mysqli_query($conn, "SELECT * FROM dokter WHERE nama_dokter = '$nama_dokter'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>
                        alert("Data Dokter Sudah Ada!");
                        window.history.back()
                    </script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO dokter (nama_dokter, jenis_kelamin, telp_dokter, alamat_dokter) VALUES ('$nama_dokter','$jenis_kelamin','$telp_dokter','$alamat_dokter')");
        if (!$query) {
            $message = '<script>
                        alert("Data Dokter Gagal ditambahkan!");
                        window.history.back()
                    </script>';
        } else {
            $message = '<script>
                        alert("Data Dokter Berhasil ditambahkan!");
                        window.location = "../dokter";
                    </script>';
        }
    }
}
echo $message;
