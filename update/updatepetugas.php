<?php
include('koneksi.php');
$id = $_GET['id_petugas'];
$query = "SELECT * From tb_petugas WHERE id_petugas='$id'";
$hasil = mysqli_query($koneksi, $query);
while ($data = mysqli_fetch_assoc($hasil)) {
?>

    <section class="main">
        <center>
            <h1>Update Petugas</h1>
        </center>


        <form action="update/proses_update_petugas.php" method="post">

            <input type="hidden" id="id_petugas" name="id_petugas" value="<?php echo $data['id_petugas']; ?>">

            <div class="form-group">
                <label for="nama">Nama Petugas :</label>
                <input type="text" id="nama" name="nama_petugas" class="input" value="<?php echo $data['nama_petugas']; ?>">
            </div>

            <div class=" form-group">
                <label for="level_user">Level Petugas : </label>
                <select id="level_user" name="level_user" class="input" value="<?php echo $data['level_user']; ?>">
                    <option value=" admin">admin</option>
                    <option value="petugas">petugas</option>
                </select>
            </div>

            <div class="form-group">
                <label for="username">Username :</label>
                <div class="new-kelas"> <input type="text" id="username" name="username" class="input" value="<?php echo $data['username']; ?>">
                </div>
            </div>
            <div class=" form-group" style="margin-bottom: 30px;">
                <label for="password">Password :</label>
                <input type="password" id="password" name="password" class="input" value="<?php echo $data['password']; ?>">
            </div>
            <div class="btn">
                <input type="submit" value="Simpan" class="tombol simpan">
                <input type="reset" value="Batal" class="tombol reset">
            </div>


        </form>

    </section>
    </div>
<?php
}
?>