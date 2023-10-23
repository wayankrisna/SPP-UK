<?php


switch (@$_GET['halaman']) {
    case "utama":
        include "view/utama.php";
        break;
    case "laporan":
        include "view/laporanpembayaran.php";
        break;
    case "riwayat":
        include "view/riwayatpembayaran.php";
        break;
    case "spp":
        include "view/viewspp.php";
        break;
    case "spp-update":
        include "update/updatespp.php";
        break;
    case "spp-tambah":
        include "tambah/tambah_spp.php";
        break;
    case "kelas":
        include "view/viewkelas.php";
        break;
    case "kelas-tambah":
        include "tambah/tambah_kelas.php";
        break;
    case "kelas-update":
        include "update/updatekelas.php";
        break;
    case "pembayaran":
        include "update/pembayaran.php";
        break;
    case "petugas":
        include "view/viewpetugas.php";
        break;
    case "petugas-tambah":
        include "tambah/tambah_petugas.php";
        break;
    case "petugas-update":
        include "update/updatepetugas.php";
        break;
    case "siswa":
        include "view/viewsiswa.php";
        break;
    case "siswa-tambah":
        include "tambah/tambah_siswa.php";
        break;
    case "siswa-update":
        include "update/updatesiswa.php";
        break;
    case "pembayaran":
        include "update/pembayaran.php";
        break;
}
