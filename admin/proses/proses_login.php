<?php

session_start();

include "connect.php";

$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password']))  : "";
if (!empty($_POST['simpan'])) {
    //cek username dan password yang diinputkan apakah sesuai dengan yang  ada di database
    $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' && password = '$password' ");
    $hasil = mysqli_fetch_array($query);
    //jika data yang inputkan sesuai dengan yang ada di database maka login berhasil 
    if ($hasil) {
        //dibuatkan session dengan nama username_dzulfood

        $_SESSION['username_siklinik'] = $username;
        $_SESSION['level_siklinik'] = $hasil['level'];
        $_SESSION['id_siklinik'] = $hasil['id'];

        // header("location: login");
        header('Location:../home');
    } else { ?>
        <script>
            alert('Username dan Password yang anda masukan salah');
            window.location = '../login';
        </script>
<?php
    }
}
?>