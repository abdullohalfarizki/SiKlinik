<?php

include "connect.php";

//Ambil data yang dikirim pada form
$id_dokter = (isset($_POST['id_dokter'])) ? htmlentities($_POST['id_dokter']) : "";
$nama_dokter = (isset($_POST['nama_dokter'])) ? htmlentities($_POST['nama_dokter']) : "";
$jenis_kelamin = (isset($_POST['jenis_kelamin'])) ? htmlentities($_POST['jenis_kelamin']) : "";
$telp_dokter = (isset($_POST['telp_dokter'])) ? htmlentities($_POST['telp_dokter']) : "";
$alamat_dokter = (isset($_POST['alamat_dokter'])) ? htmlentities($_POST['alamat_dokter']) : "";

//jika tombol simpan diklik cek data doter
if (!empty($_POST['simpan'])) {
    //jika nama dokter tidak daka di database lakukan query untuk update data obat baru ke database
    $select = mysqli_query($conn, "SELECT * FROM dokter WHERE nama_dokter = '$nama_dokter'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>
                        alert("Data Dokter Sudah Ada!");
                        window.history.back()
                    </script>';
    } else {
        $query = mysqli_query($conn, "UPDATE dokter SET nama_dokter='$nama_dokter',jenis_kelamin='$jenis_kelamin', telp_dokter='$telp_dokter', alamat_dokter='$alamat_dokter' WHERE id_dokter='$id_dokter'");
        if (!$query) {
            $message = '<script>
                        alert("Data Dokter Gagal diupdate!");
                        window.history.back()
                    </script>';
        } else {
            $message = '<script>
                        alert("Data Dokter Berhasil diupdate!");
                        window.location = "../dokter";
                    </script>';
        }
    }
}
echo $message;
