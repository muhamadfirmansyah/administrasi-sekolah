<?php 
	require '../config/koneksi.php';
	$nis = $_GET['nis'];
	$siswa = mysqli_query($con, "SELECT * FROM tb_siswa WHERE nis = '$nis'");
	
	if (mysqli_num_rows($siswa) > 0){
		$row = mysqli_fetch_array($siswa);
		$tahun = $row['angkatan'];
		$biaya = mysqli_query($con, "SELECT jenis_administrasi.administrasi, administrasi.tahun, administrasi.biaya FROM administrasi, jenis_administrasi WHERE administrasi.id_administrasi = jenis_administrasi.id_administrasi AND administrasi.tahun = '$tahun'");
		$rowbiaya = mysqli_fetch_array($biaya);
		$biayaspp = $rowbiaya['biaya'];
?>
	<label for="spp">Biaya</label>
	<input type="number" id="spp" name="spp" value="<?= $biayaspp ?>" class="form-control" readonly required>
<?php } else{ ?>
	<label for="spp">Biaya</label>
	<input type="number" id="spp" name="spp" value="" class="form-control is-invalid" placeholder="Tidak Ditemukan" readonly required>
	  <div class="invalid-feedback">
	    Please provide a valid NIS.
	  </div>
<?php } ?>


<!-- $sql = mysqli_query($con, "SELECT jenis_administrasi.administrasi, administrasi.tahun, administrasi.biaya FROM administrasi, jenis_administrasi WHERE administrasi.id_administrasi = jenis_administrasi.id_administrasi");
$row = mysqli_fetch_array($sql); -->