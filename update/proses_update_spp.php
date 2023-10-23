<?php
include('../koneksi.php');
$angkatan = $_POST['angkatan'];
$nominal = $_POST['nominal'];

$query = "UPDATE tb_spp set nominal='$nominal' WHERE angkatan='$angkatan'";

include('koneksi.php');
$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
    die("Gagal Update Data SPP ! " . mysqli_error($koneksi));
} else {
    echo "<script>
        alert('Data Berhasil di Update')
        document.location.href='../dashboard.php?halaman=spp';
        </script>
        ";
}
