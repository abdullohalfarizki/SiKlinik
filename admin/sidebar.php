<div class="col-lg-3">
    <nav class="navbar navbar-expand-lg bg-body card rounded border mt-3 ms-lg-3">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel" style="width: 250px;">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title text-brands" id="offcanvasScrollingLabel"><b>SiK</b>linik</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body ">
                    <ul class="navbar-nav nav-pills  flex-column justify-content-end flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link <?php echo ((isset($_GET['x']) && $_GET['x'] == 'home') || !isset($_GET['x'])) ? 'active'  : 'link-dark'; ?>  ps-3" aria-current="page" href="home"><i class="bi bi-house-fill"></i> Home</a>
                        </li>

                        <?php if ($hasil['level'] == 1) { ?>
                            <li class="nav-item">
                                <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'pasien') ? 'active'  : 'link-dark'; ?> ps-3" href="pasien"><i class="bi bi-person-fill-add"></i> Data Pasien</a>
                            </li>
                        <?php } ?>

                        <?php if ($hasil['level'] == 1) { ?>
                            <li class="nav-item">
                                <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'dokter') ? 'active'  : 'link-dark'; ?> ps-3" href="dokter"><i class="bi bi-person-fill-check"></i> Data Dokter</a>
                            </li>
                        <?php } ?>

                        <?php if ($hasil['level'] == 1) { ?>
                            <li class="nav-item">
                                <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'obat') ? 'active'  : 'link-dark'; ?> ps-3" href="obat"><i class="bi bi-droplet-half"></i> Data Obat</a>
                            </li>
                        <?php } ?>

                        <?php if ($hasil['level'] == 1) { ?>
                            <li class="nav-item">
                                <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'rekam') ? 'active'  : 'link-dark'; ?> ps-3" href="rekam"><i class="bi bi-binoculars-fill"></i> Rekam Medik</a>
                            </li>
                        <?php } ?>

                        <?php if ($hasil['level'] == 1) { ?>
                            <li class="nav-item">
                                <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'pembayaran') ? 'active'  : 'link-dark'; ?> ps-3" href="pembayaran"><i class="bi bi-credit-card-2-back"></i> Pembayaran</a>
                            </li>
                        <?php } ?>

                        <?php if ($hasil['level'] == 1) { ?>
                            <li class="nav-item">
                                <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'laporan') ? 'active'  : 'link-dark'; ?> ps-3" href="laporan"><i class="bi bi-file-earmark-spreadsheet-fill"></i> Laporan</a>
                            </li>
                        <?php } ?>

                        <?php if ($hasil['level'] == 1) { ?>
                            <li class="nav-item">
                                <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'user') ? 'active'  : 'link-dark'; ?> ps-3" href="user"><i class="bi bi-person-fill-gear"></i> Data User</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>