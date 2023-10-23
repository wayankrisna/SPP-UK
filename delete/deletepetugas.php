<?php

include('../koneksi.php');

$id = $_GET['id_petugas'];

$query = "DELETE FROM tb_petugas WHERE id_petugas ='$id'";

$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
    die("Gagal Menghapus Data Petugas ! " . mysqli_error($koneksi));
} else {
    echo "<script>
        alert('Data Berhasil Di delete')
        document.location.href='../dashboard.php?halaman=petugas';
        </script>
        ";
}
