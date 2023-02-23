<?php
// session_start();
if (!empty($_SESSION['username_siklinik'])) {
    header("location: home");
}

include "proses/connect.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siklinik</title>
    <link rel="icon" type="image/x-icon" href="assets/brand/favicon.ico" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/aos.css">
    <link rel="stylesheet" href="../assets/css/line-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar">
    <div id="content-wrapper">
        <!-- LOGIN -->
        <section class="full-height px-lg-5">
            <div class="container">

                <div class="row justify-content-center text-center">
                    <div class="col-lg-12 pb-4" data-aos="fade-up">
                        <h1 class="fw-bold">
                            <span class="text-brand">LOGIN</span>
                        </h1>
                        <div class="pt-3" data-aos="fade-up" data-aos-delay="200">
                            <h4>Silahkan Login!</h4>
                        </div>
                    </div>
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <form action="proses/proses_login.php" method="POST" class="row g-lg-3 gy-3">
                            <div class="form-group col-md-12">
                                <input type="text" name="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group col-12 d-grid">
                                <button type="submit" name="simpan" value="123" class="btn btn-brand mb-3">Login</button>
                                <button type="button" class="btn btn-batal">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- //LOGIN -->
    </div>
    <!-- //CONTENT WRAPPER -->



    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/aos.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>