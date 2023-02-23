<?php
// session_start();
if (empty($_SESSION['username_siklinik'])) {
    header("location: login");
}

include "proses/connect.php";

$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$_SESSION[username_siklinik]' ");
$hasil = mysqli_fetch_array($query);
if ($hasil) {
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SiKlinik</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styleAdmin.css">
</head>

<body>

    <!-- Header -->
    <?php include "header.php" ?>
    <!-- End Header -->

    <div class="container-fluid">
        <div class="row mb-5">
            <!-- Sidebar -->
            <?php include "sidebar.php" ?>
            <!-- End Sidebar -->

            <!-- Content -->

            <?php include $page; ?>

            <!-- End Content -->
        </div>
    </div>
    <!-- Footer -->

    <?php include "footer.php" ?>
    <!-- End Footer -->

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!-- Alert Js -->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>

</html>