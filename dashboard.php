<?php 
    session_start();

    if (!isset($_SESSION["user"])) {
        header('location: login.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>SCHOOL ADMINISTRATIONS</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles -->
    <link href="custom/css/style.css" rel="stylesheet">

    <!-- End Of Styler -->
  </head>

  <body>
    <!-- You Can Play Your Code Here -->
    <!-- ============================================= -->
    <?php
        $page = 'dashboard';
        include '_nav.php'
    ?>

    <div class="container mt-7">
        <div class="card-deck">
            <div class="card pointer shadow-2" onclick="document.location.href='students.php'">
                <div class="card-body text-center">
                    <i class="fas fa-users display-1 text-secondary"></i>
                </div>
                <div class="card-footer">
                    <p class="card-text">LIHAT DAFTAR SISWA</p>
                </div>
            </div>
            <div class="card pointer shadow-2" onclick="document.location.href='spp.php'">
                <div class="card-body text-center">
                    <i class="fas fa-desktop display-1 text-secondary"></i>
                </div>
                <div class="card-footer">
                    <p class="card-text">BAYAR SPP</p>
                </div>
            </div>
            <div class="card pointer shadow-2" onclick="document.location.href='report.php'">
                <div class="card-body text-center">
                    <i class="fas fa-folder-open display-1 text-secondary"></i>
                </div>
                <div class="card-footer">
                    <p class="card-text">LIHAT LAPORAN</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    <!-- Custom -->
    <script src="custom/js/script.js"></script>
    <!-- icon / font-awesome -->
    <script src="dist\fontawesome-free-5.0.2\svg-with-js\js\fontawesome-all.min.js"></script>
  </body>
</html> 