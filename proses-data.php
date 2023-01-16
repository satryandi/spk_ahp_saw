<?php include './includes/api.php';
include './includes/header.php';
akses_pengguna(array(0,2));
?><div class="container-fluid"> <?php
// if (!empty($_POST)) {
if (isset($_POST['proses'])) {
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
?>

<h3 class="m-0 font-weight-bold text-primary"><span class="fas fa-radiation"></span> Proses Data Periode <?= date("d-m-Y", strtotime($periode)) ?></h3><hr>

<?php if (count(data_alternatif_periode($periode)) > 0 & count(data_kriteria()) > 0 & cek_valid_bobot()) {
    ?>

<h6 class="m-0 font-weight-bold text-primary">Data</h6>
<table class="table table-bordered table-sm table-striped small">
    <tr class="text-center">
        <th>Alternatif</th>
        <?php
        foreach (data_kriteria() as $x) echo "<th>{$x[1]} (".number_format($x[2], 4, '.', ',').")</th>";
        ?>
    </tr>
    <?php
    $data = array();
    foreach (data_alternatif_periode($periode) as $x) {
        echo "<tr><td>{$x[5]}</td>";
        foreach (data_kriteria() as $y) {
            $n = nilai_alternatif($x[0], $y[0],$periode);
            echo "<td>$n</td>";
            $data[$y[0]][$x[0]] = $n;
        }
        echo '</tr>';
    }
    ?>
</table><hr>
<h6 class="m-0 font-weight-bold text-primary">Normalisasi</h6>
<table class="table table-bordered table-sm table-striped small">
    <tr class="text-center">
        <th>Alternatif</th>
        <?php
        foreach (data_kriteria() as $x) echo "<th>{$x[1]} (".number_format($x[2], 4, '.', ',').")</th>";
        ?>
    </tr>
    <?php
    $data_normalisasi = array();
    $data_hasil = array();
    foreach (data_alternatif_periode($periode) as $x) {
        echo "<tr>
                <td>{$x[5]}</td>";
        
        foreach (data_kriteria() as $y) {
            if ($y[3]=='Benefit') $n = nilai_alternatif($x[0], $y[0],$periode)/max($data[$y[0]]);
            else $n = min($data[$y[0]])/nilai_alternatif($x[0], $y[0],$periode);
            // else $n = nilai_alternatif($x[0], $y[0])/max($data[$y[0]]);
            echo "<td>".number_format($n, 4, '.', ',')."</td>";
            $data_normalisasi[$y[0]][$x[0]] = $n;
            $data_hasil[$x[0]][$y[0]] = $n*$y[2];
        }
        echo '</tr>';
    }
    ?>
</table><hr>
<?php
$hasil = array();
foreach (array_keys($data_hasil) as $x) {
    $hasil[$x]=array_sum($data_hasil[$x]);
}
arsort($hasil);
?>
<h6 class="m-0 font-weight-bold text-primary">Hasil pada Periode <?= date("d-m-Y", strtotime($periode)) ?></h6>
<div id="tempat-hasil">
    <?php
    
        echo '<script>__nilai = 100;</script>';
    ?>
    <form method="post">
    <table class="table table-bordered table-sm table-striped small">
        <tr class="text-center">
            <th>Ranking</th><th>Nama</th><th>Nilai</th>
        </tr>
        <?php
        $no = 1;
        foreach (array_keys($hasil) as $x) {
            $q = $conn->prepare("SELECT * FROM alternatif WHERE id='$x'");
            $q->execute();
            @$data = $q->fetchAll()[0];
            @$nama = $data[1];
            @$id =  $data[0];
            $nilai = $hasil[$x];
            ?>

            <tr id="baris-<?=$id?>">
                <td><?=$no?></td>
                <td><?=$nama?></td>
                <td><?=number_format($hasil[$x], 4, '.', ',')?></td>
              
            </tr>

        <?php
          $q2 = $conn->prepare("INSERT INTO hasil VALUE ('$x', '$hasil[$x]', '$periode', 0)");
          $q2->execute();
          $no++;
        }
        ?>
    </table>
    <input type="hidden" value="<?= $periode?>" name="periode"  />
    <button class="btn btn-primary" onclick="location.href='./reset-hasil?id=<?= $periode; ?>'"><span class="fas fa-radiation"></span> Hapus Data Hasil</button>
    </form>
</div>

<?php
    } else {
        if (count(data_kriteria()) < 1) echo '<div class="alert alert-dismissable alert-danger"><b>Data kriteria kosong</b>, silahkan hubungi Petugas.</div>';
        if (count(data_alternatif_periode($periode)) < 1) echo '<div class="alert alert-dismissable alert-danger"><b>Data alternatif kosong</b>, silahkan hubungi Petugas.</div>';
        if (!cek_valid_bobot()) echo '<div class="alert alert-dismissable alert-danger"><b>Perbadingan bobot kriteria tidak valid</b>, silahkan hubungi Pakar/Ahli.</div>';
    }
 
} else if (isset($_POST['keputusan'])) {
    $periode = $_POST['periode'];
    $id = $_POST['id_alternatif'];

    $query = $conn->prepare("UPDATE hasil SET status='1' WHERE id_alternatif='$id'");
    $query->execute();

    // echo "<br/>";
    // echo $periode;
    // echo "<br/>";
    // echo $id;
    echo "Mencetak ......";
    
    // header('Location: ./list-nilai-alternatif');
    // header('Location: ./cetak-keputusan-id?id='.$id.'&periode='.$periode.'');
    echo "
        <script>
            setTimeout(function() {
                window.location = './cetak-keputusan-id.php?id=' + $id + '&periode=$periode';
            }, 1000);
        </script>
    ";
    

} else {
    echo '<h3 class="m-0 font-weight-bold text-primary"><span class="fas fa-table"></span> Proses Alternatif</h3><hr>';
    ?> 
     <form method="post" class="mx-auto" style="max-width:400px" autocomplete="off">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="periode">Periode</label>
                <div class="col-sm-8">
                    <!-- <select class="form-control" name="periode" required>
                    <option></option>
                    <?php for ($i = 2020; $i <= 2023; $i++) : ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php endfor; ?>
                    </select> -->
                    <input type="date" name="periode" id="periode" class="form-control datepicker" required="on">
                </div>
                <button class="col-sm-2 btn btn-primary" name="proses" type="submit">Pilih</button>
            </div>
        </form>
    <?php
}
?> </div> <?php
include './includes/footer.php';?>