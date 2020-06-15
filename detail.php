<?php 
    
    session_start();
    require 'config/koneksi.php';

    if (!isset($_SESSION['user'])) {
        header('location: login.php');
    }

    $sql = mysqli_query($con, "SELECT * FROM tb_siswa WHERE nis = '$_GET[nis]'");
    $row = mysqli_fetch_array($sql);

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
  </head>

  <body>
    <!-- Navbar -->
    <?php 
        $backto = 'students.php';
        $page = 'detail';
        include '_nav.php';
    ?>
    <!-- You Can Play Your Code Here -->
    <!-- ============================================= -->

    <div class="container mt-7 mb-5 shadow p-4">
        <h3 class="display-4">Student Identity</h3>
        <div class="text-right">
            <button class="btn btn-success" data-toggle="modal" data-target=".report"><i class="fas fa-file-alt"></i> See Report</button>
            <button class="btn btn-primary"><i class="fas fa-crop"></i> Edit Student</button>
            <button class="btn btn-danger" data-toggle="modal" data-target=".alert"><i class="fas fa-asterisk"></i> Delete Student</button>    
        </div>
        <br>
        <table class="table table-bordered table-responsive-md">
            <tbody>
                <tr>
                    <td scope="row">NIS</td>
                    <td><?= $row['nis'] ?></td>
                </tr>
                <tr>
                    <td scope="row">NISN</td>
                    <td><?= $row['nisn'] ?></td>
                </tr>
                <tr>
                    <td scope="row">Name</td>
                    <td><?= $row['nama_siswa'] ?></td>
                </tr>
                <tr>
                    <td scope="row">Class</td>
                    <td><?= $row['kelas'] . $row['rombel'] ?></td>
                </tr>
                <tr>
                    <td scope="row">JK</td>
                    <td><?= $row['jenis_kelamin'] ?></td>
                </tr>
                <tr>
                    <td scope="row">Date Of Birth</td>
                    <td><?= $row['tempat_tanggal_lahir'] ?></td>
                </tr>
                <tr>
                    <td scope="row">Address</td>
                    <td><?= $row['alamat'] ?></td>
                </tr>
                <tr>
                    <td scope="row">Parent</td>
                    <td><?= $row['orang_tua_wali'] ?></td>
                </tr>
                <tr>
                    <td scope="row">Phone Number</td>
                    <td><?= $row['nomor_telepon'] ?></td>
                </tr>
            </tbody>
        </table>
        <!-- Modal Tambah Siswa -->
        <div class="modal fade alert" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLabel"><b>Yakin</b> ingin menghapus data?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <table>
                      <tr>
                          <td>NIS</td>
                          <td>:</td>
                          <td><?= $row['nis'] ?></td>
                      </tr>
                      <tr>
                          <td>NISN</td>
                          <td>:</td>
                          <td><?= $row['nisn'] ?></td>
                      </tr>
                      <tr>
                          <td>Nama</td>
                          <td>:</td>
                          <td><?= $row['nama_siswa'] ?></td>
                      </tr>
                  </table>
              </div>
              <form method="post" enctype="multipart/form-data" action="upload-excel.php">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                </div>
              </form>
            </div>
          </div>
        </div>
        <!--  -->
        <!-- Modal See Report -->
        <div class="modal fade report" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-success" id="exampleModalLabel"><b>Students Report</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <p class="card-text">Tunggakan Administrasi</p>
                  <table class="table table-bordered table-responsive-md table-hover">
                      <thead>
                          <tr>
                              <td>SPP</td>
                              <td>Rp. 0</td>
                          </tr>
                      </thead>
                  </table>
              </div>
              <form method="post" enctype="multipart/form-data" action="upload-excel.php">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="upload" value="Delete" class="btn btn-primary">
                </div>
              </form>
            </div>
          </div>
        </div>
        <!--  -->
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