<?php 
    
    session_start();
    require 'config/koneksi.php';

    if (isset($_POST['bayar'])) {
        $tanggal = date('d-m-Y');
        $ambil_id = mysqli_query($con, "SELECT MAX(id_pembayaran) AS angkaMax FROM administrasi_spp WHERE tanggal_pembayaran = '$tanggal'");
        $ia = mysqli_fetch_array($ambil_id);
        $max_num = mysqli_num_rows($ambil_id);
        $max_kode = $ia['angkaMax'];
        $max_angka = substr($max_kode, 9);
        $max_angka++;
        if ($max_angka > 0) {
            if ($max_angka >= 100) {
                $angka_akhir = date('dmY-').$max_angka;
            } elseif($max_angka >= 10){
                $angka_akhir = date('dmY-0').$max_angka;
            } else{
                $angka_akhir = date('dmY-00').$max_angka;
            }
        } else{
            $angka_akhir = date('dmY-001');
        }
        $nis = htmlspecialchars($_POST['nis']);
        $nama = htmlspecialchars($_POST['nama']);
        $ke = mysqli_query($con, "SELECT * FROM tb_siswa WHERE nis = '$nis'");
        $las = mysqli_fetch_array($ke);
        $kelas = $las['kelas'];
        $bulan = htmlspecialchars($_POST['bulan']);
        $spp = htmlspecialchars($_POST['spp']);
        $ad = mysqli_query($con, "SELECT * FROM tb_user WHERE username = '$_SESSION[user]'");
        $min = mysqli_fetch_array($ad);
        $admin = $min['nama_user'];
        if (empty($nama) || empty($nis) || empty($bulan) || empty($spp)) {
            echo "<script>alert('Tidak Boleh Kosong!');</script>";
        } else{
            $ud = mysqli_query($con, "SELECT * FROM administrasi_spp WHERE nis_siswa = '$nis' AND bulan = '$bulan' AND kelas_siswa = '$kelas'");
            if (mysqli_num_rows($ud) == 0) {
                $sql = mysqli_query($con, "INSERT INTO administrasi_spp VALUES ('$angka_akhir','$tanggal','$nama', '$nis', '$kelas', '$bulan','$spp', '$admin')");
                if ($sql) {
                    echo "
                    <script>
                        if(confirm('Berhasil Melakukan Transaksi. Print Bukti Pembayaran?')){
                            document.location.href='spp-print.php?id=$angka_akhir';
                        } else{
                            document.location.href='spp.php';
                        }
                    </script>";
                } else{
                    $gagal = true;
                }   
            } else{
                $sudahdibayarkan = true;
            }
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
        $backto = 'dashboard.php';
        $page = '';
        include '_nav.php';
    ?>
    <!-- You Can Play Your Code Here -->
    <!-- ============================================= -->

    <div class="container mt-7">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 p-3 shadow bg-white">
                <?php if (isset($sudahdibayarkan)): ?>
                    <div class="alert alert-warning" role="alert">
                        Pembayaran untuk <?= $nama ?> bulan <?= $bulan ?> sudah dibayarkan!
                    </div>
                <?php endif ?>
                <?php if (isset($gagal)): ?>
                    <div class="alert alert-danger" role="alert">
                        Gagal melakukan transaksi
                    </div>
                <?php endif ?>
                <h3 class="modal-title">Pembayaran SPP</h3>
                <div class="dropdown-divider"></div>
                <form method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nis">NIS</label>
                                <div class="input-group">
                                    <input type="number" id="nis" name="nis" class="form-control" required>
                                    <input type="button" id="cari" name="cari" class="input-group-addon text-white bg-primary" value="Cari">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" id="formNama">
                                <label for="nama">Name</label>
                                <input type="text" id="nama" name="nama" class="form-control" readonly required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bulan">Month</label>
                        <select id="bulan" class="form-control pointer" name="bulan" required>
                            <option value="">Choose ...</option>
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                        </select>
                    </div>
                    <div class="form-group" id="biaya">
                        <label for="spp">Biaya</label>
                        <input type="number" id="spp" name="spp" class="form-control" readonly required>
                    </div>
                    <div class="form-group text-right">
                        <input type="submit" name="bayar" value="Selesai" class="btn btn-primary">
                        <input type="reset" value="Reset" class="btn btn-danger">
                    </div>
                </form>
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
    <script src="custom/js/search/nama.js"></script>
  </body>
</html> 