<?php
session_start();
include("koneksi.php");
$username = $_POST['username'];
$pass = $_POST['password'];

$queryadmin = mysqli_query($koneksi, "SELECT * FROM tb_petugas WHERE username='$username' AND password='$pass' AND level_user='admin'") or die(mysqli_error($koneksi));

$querypetugas = mysqli_query($koneksi, "SELECT * FROM tb_petugas WHERE username='$username' AND password='$pass' AND level_user='petugas'") or die(mysqli_error($koneksi));

$querysiswa = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE nis='$username' AND password='$pass'") or die(mysqli_error($koneksi));

if (mysqli_num_rows($queryadmin) > 0) { //cek user admin jika ada
    $data = mysqli_fetch_assoc($queryadmin);
    $_SESSION['id_petugas'] = $data['id_petugas'];
    $_SESSION['logged_user'] = true;
    $_SESSION['level_user'] = 'admin';
    echo "<script> alert('berhasil login');window.location='dashboard.php?halaman=utama';</script>";
} elseif (mysqli_num_rows($querypetugas) > 0) { //cek user petugas jika ada
    $data = mysqli_fetch_assoc($querypetugas);
    $_SESSION['id_petugas'] = $data['id_petugas'];
    $_SESSION['logged_user'] = true;
    $_SESSION['username'] = $data['username'];
    $_SESSION['level_user'] = 'petugas';
    echo "<script> alert('berhasil login');window.location='dashboard.php?halaman=utama';</script>";
} elseif (mysqli_num_rows($querysiswa) > 0) { //cek user siswa jika ada
    $data = mysqli_fetch_assoc($querysiswa);
    $_SESSION['nisn'] = $data['nisn'];
    $_SESSION['logged_user'] = true;
    $_SESSION['username'] = $data['nis'];
    $_SESSION['level_user'] = 'siswa';
    echo "<script> alert('berhasil login');window.location='dashboard.php?halaman=utama';</script>";
} else {
    echo "<script> alert('gagal login');window.location='login.php';</script>";
}
