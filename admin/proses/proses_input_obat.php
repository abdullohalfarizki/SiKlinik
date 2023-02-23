<?php

include "connect.php";

//Ambil data yang dikirim pada form
$nama_obat = (isset($_POST['nama_obat'])) ? htmlentities($_POST['nama_obat']) : "";
$keterangan = (isset($_POST['keterangan'])) ? htmlentities($_POST['keterangan']) : "";
$harga = (isset($_POST['harga'])) ? htmlentities($_POST['harga']) : "";


//jika tombol simpan diklik cek data obat
if (!empty($_POST['simpan'])) {
    //jika nama obat tidak daka di database lakukan query untuk menambahkan data obat baru ke database
    $select = mysqli_query($conn, "SELECT * FROM obat WHERE nama_obat = '$nama_obat'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>
                        alert("Obat Sudah Ada!");
                        window.history.back()
                    </script>';
    } else {
        //lakukan query untuk menambahkan data Obat baru ke database
        $query = mysqli_query($conn, "INSERT INTO obat (nama_obat, keterangan, harga) VALUES ('$nama_obat','$keterangan','$harga')");
        if (!$query) {
            $message = '<script>
                        alert("Data Obat Gagal ditambahkan!");
                        window.history.back()
                    </script>';
        } else {
            $message = '<script>
                        alert("Data Obat Berhasil ditambahkan!");
                        window.location = "../obat";
                    </script>';
        }
    }
}
echo $message;
