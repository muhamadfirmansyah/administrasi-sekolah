<?php 

	require 'config/koneksi.php';
	$sql = mysqli_query($con, "SELECT * FROM tb_siswa");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Export Students Data</title>
</head>
<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
</style>
<body>
	<?php 
		$tanggal = date('dmY');
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=data_siswa-$tanggal.xls");
	?>
	<table border="1">
		<tr>
			<td>No</td>
			<td>NIS</td>
			<td>NISN</td>
			<td>Nama</td>
			<td>Kelas</td>
			<td>JK</td>
			<td>Tempat, Tanggal Lahir</td>
			<td>Orang Tua/Wali</td>
			<td>Alamat</td>
			<td>No Telp</td>
		</tr>
		<?php
			$no = 1;
			while ($r = mysqli_fetch_array($sql)) {
		?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $r['nis'] ?></td>
			<td><?= $r['nisn'] ?></td>
			<td><?= $r['nama_siswa'] ?></td>
			<td><?= $r['kelas'] . $r['rombel'] ?></td>
			<td><?= $r['jenis_kelamin'] ?></td>
			<td><?= $r['tempat_tanggal_lahir'] ?></td>
			<td><?= $r['orang_tua_wali'] ?></td>
			<td><?= $r['alamat'] ?></td>
			<td><?= $r['nomor_telepon'] ?></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>