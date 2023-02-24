<?php

session_start();

if (isset($_GET['x']) && $_GET['x'] == 'home') {
    $page = "home.php";
    include "main.php";
} else if (isset($_GET['x']) && $_GET['x'] == 'pasien') {
    if ($_SESSION['level_siklinik'] == 1) {
        $page = "pasien.php";
        include "main.php";
    } else { ?>
        <script>
            alert('Anda tidak memiliki akses !');
            window.location = 'main.php';
        </script>
    <?php
    }
} else if (isset($_GET['x']) && $_GET['x'] == 'dokter') {
    if ($_SESSION['level_siklinik'] == 1) {
        $page = "dokter.php";
        include "main.php";
    } else { ?>
        <script>
            alert('Anda tidak memiliki akses !');
            window.location = 'main.php';
        </script>
    <?php
    }
} else if (isset($_GET['x']) && $_GET['x'] == 'obat') {
    if ($_SESSION['level_siklinik'] == 1) {
        $page = "obat.php";
        include "main.php";
    } else { ?>
        <script>
            alert('Anda tidak memiliki akses !');
            window.location = 'main.php';
        </script>
    <?php
    }
} else if (isset($_GET['x']) && $_GET['x'] == 'rekam') {
    if ($_SESSION['level_siklinik'] == 1) {
        $page = "rekam.php";
        include "main.php";
    } else { ?>
        <script>
            alert('Anda tidak memiliki akses !');
            window.location = 'main.php';
        </script>
    <?php
    }
} else if (isset($_GET['x']) && $_GET['x'] == 'pembayaran') {
    if ($_SESSION['level_siklinik'] == 1) {
        $page = "pembayaran.php";
        include "main.php";
    } else { ?>
        <script>
            alert('Anda tidak memiliki akses !');
            window.location = 'main.php';
        </script>
    <?php
    }
} else if (isset($_GET['x']) && $_GET['x'] == 'laporan') {
    if ($_SESSION['level_siklinik'] == 1) {
        $page = "laporan.php";
        include "main.php";
    } else { ?>
        <script>
            alert('Anda tidak memiliki akses !');
            window.location = 'main.php';
        </script>
    <?php
    }
} else if (isset($_GET['x']) && $_GET['x'] == 'user') {
    if ($_SESSION['level_siklinik'] == 1) {
        $page = "user.php";
        include "main.php";
    } else { ?>
        <script>
            alert('Anda tidak memiliki akses !');
            window.location = 'main.php';
        </script>
<?php
    }
} else if (isset($_GET['x']) && $_GET['x'] == 'login') {
    include "login.php";
} else if (isset($_GET['x']) && $_GET['x'] == 'logout') {
    include "proses/proses_logout.php";
} else {
    $page = "home.php";
    include "main.php";
}
