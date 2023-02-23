<?php
// session_start();

include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM pasien");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}


if (isset($_GET['x']) && $_GET['x'] == 'home.php') {
    include "home.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'logout.php') {
    include "proses/proses_logout.php.php";
} else {
    include "main.php";
}
