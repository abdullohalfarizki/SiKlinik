<?php

include "connect.php";

//Ambil data yang dikirim pada form
$id_obat = (isset($_POST['id_obat'])) ? htmlentities($_POST['id_obat']) : "";
$nama_obat = (isset($_POST['nama_obat'])) ? htmlentities($_POST['nama_obat']) : "";
$keterangan = (isset($_POST['keterangan'])) ? htmlentities($_POST['keterangan']) : "";
$harga = (isset($_POST['harga'])) ? htmlentities($_POST['harga']) : "";


//jika tombol simpan diklik
if (!empty($_POST['simpan'])) {
    $query = mysqli_query($conn, "UPDATE obat SET nama_obat='$nama_obat',keterangan='$keterangan', harga='$harga' WHERE id_obat='$id_obat'");
    if (!$query) {
        $message = '<script>
                        alert("Data Obat Gagal diupdate!");
                        window.history.back()
                    </script>';
    } else {
        $message = '<script>
                        alert("Data Obat Berhasil diupdate!");
                        window.location = "../obat";
                    </script>';
    }
}

echo $message;
