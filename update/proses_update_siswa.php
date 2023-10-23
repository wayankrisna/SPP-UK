<?php
session_start();
include "../koneksi.php";


$nisn = $_POST['nisn'];
$nis = $_POST['nis'];
$nama_siswa = $_POST['siswa'];
$kelas = $_POST['kelas'];
$pass = 'tes1234';
$angkatan = $_POST['angkatan'];
$nmrtlp = $_POST['nmrtlp'];
$nominal = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT nominal FROM tb_spp WHERE angkatan='$angkatan'"));
$hasil_nominal = $nominal['nominal'];

$query_siswa = "UPDATE tb_siswa SET nisn='$nisn', nis='$nis', nama_siswa='$nama_siswa', id_kelas='$kelas', angkatan='$angkatan', password='$pass', nomor_telepon='$nmrtlp', nominal='$hasil_nominal' WHERE nisn='$nisn'";

$hasilsiswa = mysqli_query($koneksi, $query_siswa);

if (!$hasilsiswa) {
    die("Gagal Menambahkan Data" . mysqli_error($koneksi));
} else {
    echo "<script>alert('Data Berhasil Di Update');
    location.href='../dashboard.php?halaman=siswa';</script>";
}
