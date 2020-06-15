<!-- import excel ke mysql -->
<!-- www.malasngoding.com -->

<?php 
// menghubungkan dengan koneksi
include 'config/koneksi.php';
// menghubungkan dengan library excel reader
include "custom/php/excel_reader2.php";
?>

<?php
// upload file xls
$target = basename($_FILES['filesiswa']['name']) ;
move_uploaded_file($_FILES['filesiswa']['tmp_name'], $target);
die();

// beri permisi agar file xls dapat di baca
chmod($_FILES['filesiswa']['name'],0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['filesiswa']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);

// jumlah default data yang berhasil di import
for ($i = 2; $i <= $jumlah_baris; $i++) {
	$nis = $data->val($i, 2);
	$nisn = $data->val($i, 3);
	$nama = $data->val($i, 4);
	$kelas = $data->val($i, 5);
	$rombel = $data->val($i, 6);
	$tahun = $data->val($i, 7);
	$jk = $data->val($i, 8);
	$ttd = $data->val($i, 9);
	$alamat = $data->val($i, 10);
	$orangtua = $data->val($i, 11);
	$nomor_telepon = $data->val($i, 12);
	$berhasil = 0;
	if($nis != "" && $nisn != "" && $nama != "" && $kelas != "" && $rombel != "" && $tahun != "" && $jk != "" && $ttd != "" && $alamat != "" && $orangtua != "" && $nomor_telepon != ""){
		mysqli_query($con, "INSERT INTO tb_siswa VALUES ('$nis', '$nisn', '$nama', '$kelas', '$rombel', '$tahun', '$jk', '$ttd', '$alamat', '$orangtua', '$nomor_telepon')");
			$berhasil++;
	} else{
		$berhasil = 0;
	}
}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['filesiswa']['name']);

// alihkan halaman ke index.php
header("location:students.php?berhasil=$berhasil");
?>