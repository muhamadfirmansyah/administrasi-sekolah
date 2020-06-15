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
        $backto = 'spp-report.php';
        $page = '';
        include '_nav.php';
    ?>
    <!-- You Can Play Your Code Here -->
    <!-- ============================================= -->

    <div class="container mt-7 shadow">
        <div class="card-body">
            <table class="table-bordered table table-responsive-md table-hover">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Bulan</td>
                        <td>Pendapatan</td>
                        <td>Tunggakkan</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Januari</td>
                        <td>Rp. 3450000</td>
                        <td>Rp. 1200000</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Februari</td>
                        <td>Rp. 3250000</td>
                        <td>Rp. 1400000</td>
                    </tr>
                    <tr>
                        <td colspan="2">Total</td>
                        <td>Rp. 6700000</td>
                        <td>Rp. 2600000</td>
                    </tr>
                </tbody>
            </table>
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