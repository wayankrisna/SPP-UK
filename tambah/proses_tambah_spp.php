<?php
include('../koneksi.php');
$angkatan = $_POST['angkatan'];
$nominal = $_POST['nominal'];

$query = "INSERT INTO tb_spp values('$angkatan','$nominal')";
$hasil = mysqli_query($koneksi, $query);
if (!$hasil) {
    die("Gagal memasukan data spp" . mysqli_error($koneksi));
} else {
    echo "<script>
        alert('Data Berhasil di Tambahkan')
        document.location.href='../dashboard.php?halaman=spp';
        </script>
        ";
}
