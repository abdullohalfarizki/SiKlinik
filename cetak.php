<?php

include "proses/connect.php";

$query = mysqli_query($conn, "SELECT * FROM pasien");
$pasien = mysqli_num_rows($query);
?>
<!DOCTYPE html>
<html>

<head>
    <title>SiKlinik</title>
</head>
<style>
    table {
        border-collapse: collapse;
    }

    table {
        border: 1px solid black;
    }

    .judul {
        font-size: 23px;
        font-weight: bold;
        margin-top: 5px;
    }

    .klinik {
        font-size: 20px;
        font-weight: bold;
        margin-top: -20px;
    }

    .jalan {
        font-size: 15px;
        margin-top: -15px;
        margin-bottom: 5px;
    }

    .antrian {
        font-size: 22px;
        font-weight: bold;
        margin-bottom: 1px;
        margin-top: 10px;
    }

    .no {
        font-size: 35px;
        margin-top: -20px;
        margin-bottom: 4px;
    }

    .thnks {
        font-size: 20px;
        font-weight: bold;
        margin-top: 50px;
        padding-top: 4%;
    }
</style>

<body>
    <table border="1" class="cetak" style="width: 40%;">
        <thead>
            <tr align="center">
                <td>
                    <p class="judul">SELAMAT DATANG</p>
                    <p class="klinik"> Di SiKlinik</p>
                    <p class="jalan">Jalan Raya Babakan Dukuh No.220</p>
                </td>
            </tr>
            <tr align="center">
                <td <p class="antrian">ANTRIAN</p>
                    <p class="no"><?= $pasien; ?></p>
                </td>
            </tr>
            <tr align="center">
                <td <p class="thnks">TERIMAKASIH</p>
                </td>
            </tr>
    </table>
    <script type="text/javascript">
        window.print();
    </script>

</html>