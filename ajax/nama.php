<?php 
	require '../config/koneksi.php';
	$nis = $_GET['nis'];
	$sql = mysqli_query($con, "SELECT * FROM tb_siswa WHERE nis = '$nis'");
?>
<?php if (mysqli_num_rows($sql) > 0) {
	$row = mysqli_fetch_array($sql);
?>
	<label for="nama">Name</label>
	<input type="text" id="nama" name="nama" class="form-control is-valid" value="<?= $row['nama_siswa'] ?>" readonly required>
<?php } else{ ?>
	<label for="nama">Name</label>
	<input type="text" id="nama" name="nama" class="form-control is-invalid" value="" placeholder="Siswa Tidak Ditemukan" readonly required>
	  <div class="invalid-feedback">
	    Please provide a valid NIS.
	  </div>
<?php } ?>