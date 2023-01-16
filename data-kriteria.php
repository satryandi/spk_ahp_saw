<?php include './includes/api.php';
include './includes/header.php';
akses_pengguna(array(0,2));
?>
<div class="container-fluid">
<h3 class="m-0 font-weight-bold text-primary"><span class="fas fa-table"></span> Data Kriteria</h3><hr>
<button class="btn btn-primary" onclick="location.href='./tambah-kriteria'"><span class="fas fa-plus-circle"></span> Tambah Kriteria</button>
<table class="table table-striped table-bordered table-sm">
    <tr class="text-center">
        <th>No</th><th>Nama Kriteria</th><th>Atribut</th><th>Pengaturan</th>
    </tr>
    <?php $no=1; foreach (data_kriteria() as $x) {
        echo "<tr>";
        echo "<td class=\"text-center\">$no</td><td>{$x[1]}</td><td>{$x[3]}</td>
        <td class=\"text-center\"><button onclick=\"location.href='./edit-kriteria?id={$x[0]}'\" class=\"btn btn-primary\"><span class=\"fas fa-pen\"></span> Edit</button> <button onclick=\"hapus_kriteria('{$x[0]}')\" class=\"btn btn-danger\"><span class=\"fas fa-trash-alt\"></span> Hapus</button></td>";
        echo '</tr>';
        $no++;
    } ?>
</table>
</div>



<?php include './includes/footer.php';?>