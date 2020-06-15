<?php 
	session_start();
	
	include 'config/koneksi.php';

	if (!isset($_SESSION['user'])) {
		header('location: login.php');
	}




	$jumlahDataPerHalaman = 10;
	$jumlahData = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_siswa"));
	$jumlahHalaman = ceil($jumlahData/ $jumlahDataPerHalaman);
	$halamanAktif = ( isset($_GET['page'])) ? $_GET['page'] : 1;
	$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
	$sql = mysqli_query($con, "SELECT * FROM tb_siswa LIMIT $awalData, $jumlahDataPerHalaman");

	if (isset($_GET['kelas'])) {
		$kelas = $_GET['kelas'];
		if ($kelas == '7'|| $kelas == '8' || $kelas == '9') {
			$jumlahData = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_siswa WHERE kelas = '$kelas'"));
			$jumlahHalaman = ceil($jumlahData/ $jumlahDataPerHalaman);
			$halamanAktif = ( isset($_GET['page'])) ? $_GET['page'] : 1;
			$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
			$sql = mysqli_query($con, "SELECT * FROM tb_siswa WHERE kelas = '$kelas' ORDER BY kelas, rombel ASC LIMIT $awalData, $jumlahDataPerHalaman");
		} else{
			$sql = mysqli_query($con, "SELECT * FROM tb_siswa LIMIT $awalData, $jumlahDataPerHalaman");
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

  	<!-- NAVBAR -->
  	<?php
  		$page = 'students';
  		$backto = 'dashboard.php';
  		include '_nav.php'
  	?>
    <!-- You Can Play Your Code Here -->
    <!-- ============================================= -->
    <div class="container mt-7 shadow p-4">
	<?php if (isset($berhasil)): ?>
		<div class="alert alert-info" role="alert">
			<?= $berhasil ?> data berhasil ditambahkan!
		</div>
	<?php endif ?>
	  <h1 class="display-4">Students List</h1>
	  <div class="row">
	  	<div class="col-md-4">
		  	<div class="form-group">
		      <div class="input-group">
		        <input type="text" class="form-control light-table-filter" id="inlineFormInputGroupUsername" placeholder="Search ..." data-table="order-table">
		        <div class="input-group-addon"><i class="fas fa-search"></i></div>
		      </div>
	      	</div>
	  	</div>
	  	<div class="col-md-4">
	  		<div class="input-group">
	  			<button type="button" onclick="document.location.href='add-student.php'" class="btn btn-primary mr-1"><i class="fas fa-user-plus"></i> Tambah Siswa</button>
	  			<div class="dropdown">
				  <button class="btn btn-success dropdown-toggle mr-1" type="button" id="aksiExcel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <i class="fas fa-file-excel"></i> Aksi
				  </button>
				  <div class="dropdown-menu" aria-labelledby="aksiExcel">
				    <a class="dropdown-item
				    <a class="dropdown-item" href="" data-toggle="modal" data-target=".download"><i class="fas fa-download"></i> Import Dari Excel</a>
				    <a class="dropdown-item" href="" data-toggle="modal" data-target=".update"><i class="fas fa-clock"></i> Update Dengan Excel</a>
				  </div>
				</div>
	  			<!-- Modal Tambah Siswa -->
				<div class="modal fade download" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <form method="post" enctype="multipart/form-data" action="upload-excel.php">
					      	<div class="modal-body">
							<div class="form-group">
								<label for="filexl">Silahkan masukan file :</label>
								<input type="file" name="filesiswa" class="form-control-file" id="filexl">
							</div>
							<table class="table table-bordered table-responsive">
								<thead>
									<tr>
										<td class="align-middle text-center">NIS</td>
										<td class="align-middle text-center">NISN</td>
										<td class="align-middle text-center">Nama</td>
										<td class="align-middle text-center">Kelas</td>
										<td class="align-middle text-center">Rombel</td>
										<td class="align-middle text-center">Tahun Masuk</td>
										<td class="align-middle text-center">JK</td>
										<td class="align-middle text-center">Tempat, Tanggal Lahir</td>
										<td class="align-middle text-center">Alamat</td>
										<td class="align-middle text-center">Orantua/Wali</td>
										<td class="align-middle text-center">No Telp</td>
									</tr>
								</thead>
							</table>
							<a href="download/template_tambah_siswa.xls" class="btn btn-info text-right mb-3"><i class="fas fa-download"></i> Download Template</a>
							<p class="text-info"><b>Pastikan</b> file yang anda masukan telah benar dan sesuai dengan urutan data!</p>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					        <input type="submit" name="upload" value="Upload" class="btn btn-primary">
					      </div>
				      </form>
				    </div>
				  </div>
				</div>
	  			<!--  -->
	  			<!-- Modal Tambah Siswa -->
				<div class="modal fade update" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Update Dengan Excel</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <form method="post" enctype="multipart/form-data" action="upload-excel.php">
					      	<div class="modal-body">
							<div class="form-group">
								<label for="filexl">Silahkan masukan file :</label>
								<input type="file" name="filesiswa" class="form-control-file" id="filexl">
							</div>
							<a href="download/template_tambah_siswa.xls" class="btn btn-info text-right mb-3"><i class="fas fa-download"></i> Download Template</a>
							<table class="table table-bordered table-responsive">
								<thead>
									<tr>
										<td class="align-middle text-center">NIS</td>
										<td class="align-middle text-center">NISN</td>
										<td class="align-middle text-center">Nama</td>
										<td class="align-middle text-center">Kelas</td>
										<td class="align-middle text-center">Rombel</td>
										<td class="align-middle text-center">Tahun Masuk</td>
										<td class="align-middle text-center">JK</td>
										<td class="align-middle text-center">Tempat, Tanggal Lahir</td>
										<td class="align-middle text-center">Alamat</td>
										<td class="align-middle text-center">Orantua/Wali</td>
										<td class="align-middle text-center">No Telp</td>
									</tr>
								</thead>
							</table>
							<p class="text-info"><b>Pastikan</b> file yang anda masukan telah benar dan sesuai dengan urutan data!</p>
							<p class="text-danger"><b>Jangan mengubah NIS!</b> Jika ingin mengubah NIS silahkan secara manual!</p>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					        <input type="submit" name="upload" value="Upload" class="btn btn-primary">
					      </div>
				      </form>
				    </div>
				  </div>
				</div>
	  			<!--  -->
	  			
				<div class="dropdown">
				  <button class="btn btn-warning dropdown-toggle mr-1" type="button" id="baseclass" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <i class="fas fa-list-alt"></i> Kelas
				  </button>
				  <div class="dropdown-menu" aria-labelledby="baseclass">
				    <a class="dropdown-item" onclick="document.location.href='?kelas=7&page=1'">7</a>
				    <a class="dropdown-item" onclick="document.location.href='?kelas=8&page=1'">8</a>
				    <a class="dropdown-item" onclick="document.location.href='?kelas=9&page=1'">9</a>
				    <a class="dropdown-item" onclick="document.location.href='?kelas=default&page=1'">Semua</a>
				  </div>
				</div>
			</div>
	  	</div>
	  </div>
		<nav aria-label="Page navigation">
		  <ul class="pagination">
		    <li class="page-item">
		      <a class="page-link" href="#" aria-label="Previous">
		        <span aria-hidden="true">&laquo;</span>
		        <span class="sr-only">Previous</span>
		      </a>
		    </li>
		    <?php for ($i = 1; $i <= $jumlahHalaman; $i++) { ?>
		    	<li class="page-item"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
		    <?php } ?>
		    <li class="page-item">
		      <a class="page-link" href="#" aria-label="Next">
		        <span aria-hidden="true">&raquo;</span>
		        <span class="sr-only">Next</span>
		      </a>
		    </li>
		  </ul>
		</nav>
	  <table class="table table-bordered table-hover table-responsive-md order-table text-center">
	  	<thead>
	  		<tr>
	  			<td>No</td>
	  			<td>NIS</td>
	  			<td>NISN</td>
	  			<td>Name</td>
	  			<td>Class</td>
	  			<td>JK</td>
	  			<td>Date Of Birth</td>
	  			<td>Parent</td>
	  		</tr>
	  	</thead>
	  	<tbody>
	  		<?php
	  			$no = 1;
	  			while ($row = mysqli_fetch_array($sql)) :
	  		?>
	  		<tr onclick="document.location.href='detail.php?nis=<?= $row['nis'] ?>'" class="pointer">
	  			<td><?= $no++ ?></td>
	  			<td><font class="d-none">nis</font> <?= $row['nis'] ?></td>
	  			<td><font class="d-none">nisn</font> <?= $row['nisn'] ?></td>
	  			<td><font class="d-none">Nama</font> <?= $row['nama_siswa'] ?></td>
	  			<td><font class="d-none">Kelas</font> <?= $row['kelas'] . $row['rombel'] ?></td>
	  			<td><font class="d-none">jk</font> <?= $row['jenis_kelamin'] ?></td>
	  			<td><font class="d-none">ttl</font> <?= $row['tempat_tanggal_lahir'] ?></td>
	  			<td><font class="d-none">orangtua</font> <?= $row['orang_tua_wali'] ?></td>
	  		</tr>
	  		<?php endwhile; ?>
	  	</tbody>
	  </table>
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
    <script src="custom/js/xl-students.js"></script>
  </body>
</html> 