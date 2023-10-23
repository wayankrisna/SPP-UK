<?php
session_start();
include "../koneksi.php";

$idpembayaran = $_GET['id_pembayaran'];
$tahun_bayar = $_GET['tahun'];
$tglpembyaran = date("Y-m-d");
// $thunbayar = date("Y");
$pelayan = $_SESSION['id_petugas'];
// var_dump($pelayan);

$query_pembayaran = "UPDATE tb_pembayaran_spp SET id_petugas='$pelayan',tanggal_bayar='$tglpembyaran',tahun_bayar='$tahun_bayar' WHERE id_pembayaran='$idpembayaran'";

$hasilpembayaran = mysqli_query($koneksi, $query_pembayaran);


if (!$hasilpembayaran) {
    die("Gagal Melakukan Transaksi!" . mysqli_error($koneksi));
} else {
    echo "<script>alert('Berhasil Melakukan Transaksi');
        location.href='../dashboard.php?halaman=pembayaran';</script>";
}
