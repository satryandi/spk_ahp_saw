<?php include './includes/api.php';
include './includes/header.php';
akses_pengguna(array(0, 2)); ?>
<div class="container-fluid">
    <h3 class="m-0 font-weight-bold text-primary"><span class="fas fa-users-cog"></span> Daftar Alternatif</h3>
    <hr>
    <button class="btn btn-primary" onclick="location.href='./tambah-alternatif'"><span class="fas fa-plus-circle"></span> Tambah Alternatif</button>
    <br />
    <br />

    <table class="table table-striped table-bordered table-sm">
        <tr class="text-center">
            <th>No</th>
            <th>Nama Karyawan</th>
            <th>Jenis Kelamin</th>
            <th>Jabatan</th>
            <th>Cabang</th>
            <th></th>
        </tr>
        <?php $no = 1;
        foreach (data_alternatif() as $x) {
            echo "<tr>";
            echo "<td class=\"text-center\">$no</td>
        <td>{$x['nama']}</td>
        <td>{$x['jkel']}</td>
        <td>{$x['jabatan']}</td>
        <td>{$x['cabang']}</td>
        
        <td class=\"text-center\"><button onclick=\"location.href='./edit-alternatif?id={$x[0]}'\" class=\"btn btn-primary\"><span class=\"fas fa-pen\"></span> Edit</button>
        <button onclick=\"hapus_alternatif('{$x[0]}')\" class=\"btn btn-danger\"><span class=\"fas fa-trash-alt\"></span> Hapus</button></td>";
            echo '</tr>';
            $no++;
        } ?>
    </table>
</div>
<?php include './includes/footer.php'; ?>