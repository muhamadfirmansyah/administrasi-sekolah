<?php 
    session_start();
    require 'config/koneksi.php';

    $id = $_GET['id'];
    $kui = mysqli_query($con, "SELECT * FROM administrasi_spp WHERE id_pembayaran = '$id'");
    $tansi = mysqli_fetch_array($kui);

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

  <body onload="window.print()">
    <!-- You Can Play Your Code Here -->
    <!-- ============================================= -->

    <!--  -->
    <div class="p-3 d-inline-block" style="border: 1px solid #000000;">
        <table>
            <tr class="text-center">
                <td colspan="3"><h4 onclick="document.location.href='dashboard.php'" class="pointer">SMP ISLAM AL BAROKAH</h4></td>
            </tr>
            <tr class="text-center">
                <td colspan="3"><small><address>Jalan Raya Puncak No 49 RT 02/01 Kp. Kopo Kab. Bogor</address></small></td>
            </tr>
            <tr class="text-center">
                <td colspan="3">================================</td>
            </tr>
            <tr>
                <td>No. Pembayaran</td>
                <td>:</td>
                <td><?= $tansi['id_pembayaran'] ?></td>
            </tr>
            <tr>
                <td>Tanggal Pembayaran</td>
                <td>:</td>
                <td><?php echo date('d-m-Y') ?></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td><?= $tansi['kelas_siswa'] ?></td>
            </tr>
            <tr>
                <td>NIS</td>
                <td>:</td>
                <td><?= $tansi['nis_siswa'] ?></td>
            </tr>
            <tr>
                <td>Atas Nama</td>
                <td>:</td>
                <td><?= $tansi['nama_siswa'] ?></td>
            </tr>
            <tr class="text-center">
                <td colspan="3">================================</td>
            </tr>
            <tr>
                <td colspan="2">Jenis Pembayaran</td>
                <td class="text-right">Total Biaya</td>
            </tr>            
            <tr>
                <td colspan="2">SPP</td>
                <td class="text-right">Rp. <?= $tansi['biaya_pembayaran'] ?></td>
            </tr>
            <tr class="text-center">
                <td colspan="3">--------------------------------------------------- (+)</td>
            </tr>
            <tr>
                <td colspan="2">Total</td>
                <td class="text-right"><b>Rp. <?= $tansi['biaya_pembayaran'] ?></b></td>
            </tr>
            <tr style="height: 30px;">
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td class="text-right">Tanda Terima</td>
            </tr>
            <tr style="height: 40px;">
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td class="text-right">Petugas</td>
            </tr>
        </table>
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