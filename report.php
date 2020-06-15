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
  </head>

  <body>
    <!-- Navbar -->
    <?php 
        $backto = 'dashboard.php';
        $page = '';
        include '_nav.php';
    ?>
    <!-- You Can Play Your Code Here -->
    <!-- ============================================= -->
    <div class="container mt-7">
        <div class="card-deck">
            <div class="card bg-light pointer" onclick="document.location.href='spp-report.php'">
                <div class="card-body text-center">
                    <i class="fas fa-file-alt display-1 text-primary"></i>
                </div>
                <div class="card-footer">
                    <p class="card-text">LAPORAN SPP</p>
                </div>
            </div>
        </div>
    </div>
    <!--  -->

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