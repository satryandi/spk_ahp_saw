<?php
include './includes/api.php';
akses_pengguna(array(0, 2));

if (!empty($_POST)) {
    $pesan_error = array();
    $nama = $_POST['nama'];
    $jkel = $_POST["jkel"];
    $jabatan = $_POST["jabatan"];
    $cabang = $_POST["cabang"];
    if ($nama == '') array_push($pesan_error, 'Nama tidak boleh kosong');

    if (empty($pesan_error)) {
        $q = $conn->prepare("INSERT INTO alternatif VALUE ( NULL, '$nama', '$jkel', '$jabatan', '$cabang' )");
        $q->execute();
        header('Location: ./list-alternatif');
    }
}
include './includes/header.php';
?>
<div class="container-fluid">
    <h3 class="m-0 font-weight-bold text-primary"><span class="fas fa-plus-circle"></span> Tambah Alternatif</h3>
    <hr>
    <form method="post" class="mx-auto" style="max-width:400px" autocomplete="off">

        <label class="mr-sm-2" for="nama">Nama Alternatif</label>
        <input id="nama" name="nama" class="form-control mb-2 mr-sm-2" type="text">

        <label for="jkel">Jenis Kelamin</label>
        <input type="text" name="jkel" id="jkel" class="form-control" required="on">

        <label for="jabatan">Jabatan</label>
        <input type="text" name="jabatan" id="jabatan" class="form-control" required="on">

        <label for="cabang">Cabang</label>
        <input type="text" name="cabang" id="cabang" class="form-control" required="on">

        <br />

        <button class="btn btn-primary" type="submit"><span class="fas fa-plus-circle"></span> Tambah</button>
        <button class="btn btn-danger" type="reset" onclick="location.href='./list-alternatif'"><span class="fas fa-times"></span> Batal</button>
        <?php if (!empty($pesan_error)) {
            echo '<hr><div class="alert alert-dismissable alert-danger"><ul>';
            foreach ($pesan_error as $x) {
                echo '<li>' . $x . '</li>';
            }
            echo '</ul></div>';
        }
        ?>
    </form>
</div>
<?php include './includes/footer.php'; ?>