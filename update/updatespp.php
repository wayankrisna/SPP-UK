<?php
include('koneksi.php');
$angkatan = $_GET['angkatan'];
$query = "SELECT * From tb_spp WHERE angkatan='$angkatan'";
$hasil = mysqli_query($koneksi, $query);
while ($data = mysqli_fetch_assoc($hasil)) {
?>
    <section class="main">
        <center>
            <h1>Update SPP</h1>
        </center>


        <form action="update/proses_update_spp.php" method="post">

            <div class="form-group">
                <label for="nama">Angkatan :</label>
                <input type="text" id="angkatan" readonly name="angkatan" class="input" value="<?php echo $data['angkatan']; ?>">
            </div>
            <div class="form-group">
                <label for="nama">Nominal :</label>
                <input type="text" id="nominal" name="nominal" class="input" value="<?php echo $data['nominal']; ?>">
            </div> <br><br>
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