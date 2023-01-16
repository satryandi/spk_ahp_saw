<?php
if (!empty($_POST)) {
    $periode = $_POST['periode'];
?>

<!DOCTYPE html>
<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
	<title>Report</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<?php include './includes/api.php'; ?>
<table  align="center">
    <tr>
    <td> <center><img src="img/logobreadtalk.jpg" width="50" height="50"></center></td>
        <td>
            <center>
                <font size="5"><b>PT TALKINDO SELAKSA ANUGRAH</b></font> <br>
                <font size="4">Jl. Meruya Selatan No. 68, RT.01 / RW.01</font> <br>
                <font size="4">Kembangan, Jakarta Barat, DKI Jakarta, 11650</font> <br>
                <font size="4">Telp. (021) 58902147  </font> <br>
                <!-- <font size="4">Email. ENQUIERES@UNITYHOTELS.COM</font> -->
            </center>
            
        </td>
    </tr>
    <tr>
        <td colspan="2"><hr></td>
    </tr>
</table>

<body onload="window.print()">
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
    </style>
    
	<center>
        <h5>Hasil Peringkat Pemilihan Supplier</h4>
        <h5> Periode <?= date("d M Y", strtotime($periode)) ?> </h5>
        <br>

        
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr class="text-center">
				<th width="10">No</th>
                <th>Nama</th>
                <!-- <th>Alamat</th>
                <th>No.Telp</th> -->
                <th>Ranking</th>
                <th>Nilai</th>
			</tr>
		</thead>
		<tbody>
        <?php $no=1; foreach (data_hasil_periode($periode) as $x) {
        echo "<tr>";
        echo "<td class=\"text-center\">$no</td>
        <td>{$x[5]}</td>

        <td class=\"text-center\">$no</td>
        <td class=\"text-center\">".number_format($x[1], 4, '.', ',')."</td>";
        echo '</tr>';
        $no++;
    } ?>
		</tbody>
	</table>

    <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <td align="right">Jakarta, <?php echo date('d-M-Y') ?></td>
               
            </tr>
            <tr>
                <td align="right">Manajer</td>
            </tr>

            <tr>
                <td><br /><br /><br /><br /></td>
            </tr>
            <tr>
                <td align="right">(.......................................)</td>
            </tr>
            <tr>
                <td align="center"></td>
            </tr>
        </table>

</body>
</html>

<?php
} else {
    include './includes/api.php';
include './includes/header.php';
akses_pengguna(array(0,1));
?><div class="container-fluid"> <?php
    echo '<h3 class="m-0 font-weight-bold text-primary"><span class="fas fa-table"></span> Cetak Laporan Hasil Peringkat Pemilihan Supplier</h3><hr>';
    ?> 
     <form method="post" class="mx-auto" style="max-width:400px" autocomplete="off">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="periode">Pilih Periode</label>
                <div class="col-sm-6">
                    <!-- <select class="form-control" name="periode" required>
                    <option></option>
                    <?php for ($i = 2020; $i <= 2023; $i++) : ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php endfor; ?>
                    </select> -->
                    <input type="date" name="periode" id="periode" class="form-control datepicker" required="on">
                </div>
                <button class="col-sm-2 btn btn-primary" type="submit">Cetak</button>
            </div>
        </form>
<?php
?></div><?php
include './includes/footer.php';   
}
?>

