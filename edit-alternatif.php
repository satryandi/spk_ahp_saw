<?php
include './includes/api.php';
akses_pengguna(array(0, 2));
if (!empty($_POST)) {
    $pesan_error = array();
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jkel = $_POST["jkel"];
    $jabatan = $_POST["jabatan"];
    $cabang = $_POST["cabang"];
    if ($nama == '') array_push($pesan_error, 'Nama tidak boleh kosong');

    if (empty($pesan_error)) {
        $q = $conn->prepare("UPDATE alternatif SET nama = '$nama', jkel = '$jkel', jabatan = '$jabatan', cabang = '$cabang' WHERE id='$id'");
        $q->execute();
        ob_clean();
        header('Location: ./list-alternatif');
    }
} else if (!empty($_GET)) {
    @$id = $_GET['id'];
    $q = $conn->prepare("SELECT * FROM alternatif WHERE id='$id'");
    $q->execute();
    @$data = $q->fetchAll()[0];
    if ($data) {
        $id = $data[0];
        $nama = $data[1];
        $jkel = $data[2];
        $jabatan = $data[3];
        $cabang = $data[4];
    } else header('Location: ./list-alternatif');
} else header('Location: ./list-alternatif');

include 'includes/header.php';
?>
<div class="container-fluid">
    <h3 class="m-0 font-weight-bold text-primary"><span class="fas fa-pen"></span> Edit Alternatif</h3>
    <hr>
    <form method="post" class="mx-auto" style="max-width:400px" autocomplete="off">
        <input type="hidden" name="id" value="<?= $id ?>">
        <label class="mr-sm-2" for="nama">Nama Alternatif</label>
        <input id="nama" name="nama" class="form-control mb-2 mr-sm-2" type="text" value="<?= $nama ?>">

        <label for="jkel">Jenis Kelamin</label>
        <input type="text" name="jkel" id="jkel" class="form-control" required="on" value="<?php echo $jkel; ?>">

        <label for="jabatan">Jabatan</label>
        <input type="text" name="jabatan" id="jabatan" class="form-control" required="on" value="<?php echo $jabatan; ?>">

        <label for="cabang">Cabang</label>
        <input type="text" name="cabang" id="cabang" class="form-control" required="on" value="<?php echo $cabang; ?>">

        <br />
        <button class="btn btn-primary" type="submit"><span class="fas fa-save"></span> Simpan</button>
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