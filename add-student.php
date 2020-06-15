<?php 
    session_start();
    require 'config/koneksi.php';

    if (!isset($_SESSION['user'])) {
        header('location: login.php');
    }

    if (isset($_POST['tambah'])) {
        $nis = htmlspecialchars($_POST['nis']);
        $nisn = htmlspecialchars($_POST['nisn']);
        $nama = htmlspecialchars($_POST['nama']);
        $tahunmasuk = htmlspecialchars($_POST['tahunmasuk']);
        $tempat_tanggal_lahir = htmlspecialchars($_POST['tempat_tanggal_lahir']);
        $nohp = htmlspecialchars($_POST['nohp']);
        $jk = htmlspecialchars($_POST['jk']);
        $kelas = htmlspecialchars($_POST['kelas']);
        $rombel = htmlspecialchars($_POST['rombel']);
        $alamat = htmlspecialchars($_POST['alamat']);
        $orangtua = htmlspecialchars($_POST['orangtua']);
        $cek = mysqli_query($con, "SELECT * FROM tb_siswa WHERE nis = '$nis' OR nisn = '$nisn'");
        if (mysqli_num_rows($cek) == 0) {
            $sql = mysqli_query($con, "INSERT INTO tb_siswa VALUES ('$nis', '$nisn', '$nama', '$kelas', '$rombel','$tahunmasuk','$jk', '$tempat_tanggal_lahir', '$alamat', '$orangtua', '$nohp')");
            if ($sql) {
                header('location: students.php');
            } else{
                $gagal = true;
            }
        } else{
            $sudahada = true;
        }
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
  </head>

  <body>
    <!-- Navbar -->
    <?php 
        $backto = 'students.php';
        $page = '';
        include '_nav.php';
    ?>
    <!-- You Can Play Your Code Here -->
    <!-- ============================================= -->

    <!--  -->
    <div class="container mt-7 mb-5">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 bg-white shadow p-3">
                <form method="post">
                    <?php if (isset($sudahada)): ?>
                        <div class="alert alert-warning" role="alert">
                            Data sudah ada, tidak perlu ditambah kembali!
                        </div>
                    <?php endif ?>
                    <?php if (isset($gagal)): ?>
                        <div class="alert alert-danger" role="alert">
                            Gagal menambahkan data!
                        </div>    
                    <?php endif ?>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nis">NIS</label>
                            <input type="number" class="form-control" id="nis" placeholder="Eg : 118090299" name="nis" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nisn">NISN</label>
                            <input type="number" class="form-control" id="nisn" placeholder="Eg : 1109385986" name="nisn" required>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="nama">Name</label>
                      <input type="text" class="form-control" id="nama" placeholder="Eg : Abdul Sulaiman" name="nama" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="dateofbirth">Date Of Birth</label>
                              <input type="text" class="form-control" id="dateofbirth" placeholder="Eg : Bogor, 12 Desember 2004" name="tempat_tanggal_lahir" required>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                          <label for="jk">Jenis Kelamin</label>
                          <select id="jk" class="form-control" name="jk" required>
                            <option value="" selected>Choose...</option>
                            <option value="L">Male</option>
                            <option value="P">Female</option>
                          </select>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                              <label for="tahunmasuk">Tahun Masuk</label>
                              <select id="tahunmasuk" name="tahunmasuk" class="form-control">
                                  <option value="">Choose ...</option>
                                  <option value="2015">2015</option>
                                  <option value="2016">2016</option>
                                  <option value="2017">2017</option>
                                  <option value="2018">2018</option>
                              </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                        <label for="nohp">Phone Number</label>
                        <input type="number" class="form-control" id="nohp" placeholder="Eg : 081234567890" name="nohp" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="kelas">Class</label>
                            <select id="kelas" class="form-control" name="kelas" required>
                                <option value="" selected>Choose...</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="rombel">Rombel</label>
                            <select id="rombel" class="form-control" name="rombel">
                                <option value="">Choose...</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                            </select>
                        </div> 
                  </div>
                  <div class="form-group">
                        <label for="alamat">Address</label>
                        <textarea id="alamat" name="alamat" class="form-control" style="resize: none;" placeholder="Eg : Kp. Suka Maju RT. 5/3 Kec. Suka Kaya Kab. Suka Sejahtera Provinsi Suka Sosial - Indonesia" required></textarea>
                  </div>
                  <div class="form-group">
                        <label for="orangtua">Parent</label>
                        <input type="text" name="orangtua" class="form-control" placeholder="Eg : Ahmad Abdul" required>
                  </div>
                  <input class="btn btn-primary" type="submit" name="tambah" value="Submit Form">
                </form>
            </div>
            <div class="col-md-2"></div>
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