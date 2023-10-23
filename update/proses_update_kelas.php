<?php
include('../koneksi.php');
$id_kelas = $_POST['id_kelas'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];

$query = "UPDATE tb_kelas SET kelas='$kelas', jurusan='$jurusan' WHERE id_kelas='$id_kelas'";

$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
    die("Gagal Update Data Kelas ! " . mysqli_error($koneksi));
} else {
    echo "<script>
        alert('Data Berhasil di Update')
        document.location.href='../dashboard.php?halaman=kelas';
        </script>
        ";
}
