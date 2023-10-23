<?php
if (!@$_SESSION['level_user']) {
    echo "<script>alert('Anda Belum Login');location.href='./login.php'</script>";
}
include 'koneksi.php';
?>
<section class="main">
    <center>
        <h1>Tambah Petugas</h1>
    </center>


    <form action="tambah/proses_tambah_petugas.php" method="post">

        <div class="form-group">
            <label for="nama">Nama Petugas :</label>
            <input type="text" id="nama" name="nama_petugas" class="input">
        </div>

        <div class="form-group">
            <label for="level_user">Level Petugas : </label>
            <select id="level_user" name="level_user" class="input">
                <option value="admin">admin</option>
                <option value="petugas">petugas</option>
            </select>
        </div>

        <div class="form-group">
            <label for="username">Username :</label>
            <input type="text" id="username" name="username" class="input">
        </div>
        <div class="form-group" style="margin-bottom: 30px;">
            <label for="password">Password :</label>
            <input type="password" id="password" name="password" class="input">
        </div>
        <br><br>
        <div class="btn">
            <input type="submit" value="Simpan" class="tombol simpan">
            <input type="reset" value="Batal" class="tombol reset">
        </div>

    </form>

</section>
</div>