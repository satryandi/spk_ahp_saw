<?php include './includes/api.php';
include './includes/header.php';
akses_pengguna(array(0));

if (!empty($_POST)) {
    $pesan_error = array();
    $periode = $_POST['periode'];
    if ($periode=='') array_push($pesan_error, 'Periode tidak boleh kosong');
    if (!empty($pesan_error)) {
        echo '<hr><div class="alert alert-dismissable alert-danger"><ul>';
        foreach ($pesan_error as $x) {
            echo '<li>'.$x.'</li>';
        }
        echo '</ul></div>';
    }
    
    echo '<h5><span class="fas fa-table"></span> Proses Alternatif</h5><hr>';
    if (count(data_alternatif_periode($periode)) > 0 & count(data_kriteria()) > 0 & cek_valid_bobot()) {
    ?>
    
    <table class="table table-bordered table-sm table-striped small">
        <tr class="text-center">
            <th>No</th><th>Alternatif</th>
            <?php
            foreach (data_kriteria() as $x) echo "<th>{$x[1]}</th>";
            ?>
        </tr>
        <?php $no = 1;
        foreach (data_alternatif_periode($periode) as $x) {
            echo "<tr><td class=\"text-center\">$no</td><td>{$x[5]}</td>";
            foreach (data_kriteria() as $y) {
                $n = nilai_alternatif($x[0], $y[0]);
                echo "<td>$n</td>";
            }
            echo '</tr>';
            $no++;
        }
        ?>
    </table>
    <button class="btn btn-primary" onclick="location.href='./proses-data'"><span class="fas fa-radiation"></span> Proses Data</button>
    <?php
    } else {
        if (count(data_kriteria()) < 1) echo '<div class="alert alert-dismissable alert-danger"><b>Data kriteria kosong</b>, silahkan hubungi Petugas.</div>';
        if (count(data_alternatif()) < 1) echo '<div class="alert alert-dismissable alert-danger"><b>Data alternatif kosong</b>, silahkan hubungi Petugas.</div>';
        if (!cek_valid_bobot()) echo '<div class="alert alert-dismissable alert-danger"><b>Perbadingan bobot kriteria tidak valid</b>, silahkan hubungi Pakar/Ahli.</div>';
    }
} else {
    echo '<h5><span class="fas fa-table"></span> Proses Alternatif</h5><hr>';
?> 
 <form method="post" class="mx-auto" style="max-width:400px" autocomplete="off">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="periode">Periode</label>
            <div class="col-sm-8">
                <select class="form-control" name="periode" required>
                <option></option>
                <?php for ($i = 2020; $i <= 2023; $i++) : ?>
                    <option value="<?= $i ?>"><?= $i ?></option>
                <?php endfor; ?>
                </select>
            </div>
            <button class="col-sm-2 btn btn-primary" type="submit">Pilih</button>
        </div>
    </form>
<?php
}


include './includes/footer.php';?>