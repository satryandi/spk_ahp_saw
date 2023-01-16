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
                <font size="4">Jl. Meruya Selatan No. 68, RT.01 / RW.01 </font> <br>
                <font size="4">Kembangan, Jakarta Barat, DKI Jakarta, 11650</font> <br>
                <font size="4">Telp. (021) 58902147 </font> <br>
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
        <h5>Laporan Penilaian Alternatif</h4>
        <h5> Periode <?= date("d M Y", strtotime($periode)) ?> </h5>
        <br>
	</center>

       
	<table class="table table-bordered table-sm table-striped small">
    <tr class="text-center">
        <th>No</th><th>Nama</th>
        <?php
        foreach (data_kriteria() as $x) echo "<th>{$x[1]}</th>";
        ?>
    </tr>
    <?php $no = 1;
    foreach (data_alternatif_periode($periode) as $x) {
        echo "<tr><td class=\"text-center\">$no</td><td>{$x[5]}</td>";
        foreach (data_kriteria() as $y) {
            $n = nilai_alternatif($x[0], $y[0],$periode);
            echo "<td>$n</td>";
        }
        
        $no++;
        
    }
    ?>
</table>

    <table align="left" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <td align="left"> <font size="3"><b>KETERANGAN:</b></td>
            </tr>        
            <tr>
                <td align="left">Untuk kriteria harga dan waktu pengiriman didapat dari invoice atau nota.</td>
            </tr>
            <tr>
                <td align="left">Sedangkan untuk kualitas produk, ketersediaan barang, dan kualitas pelayanan, menggunakan penilaian dibawah: </td>
            </tr>
            <tr>
                <td align="left">1 - Sangat Buruk </td>
            </tr>
            <tr>
                <td align="left">2 - Buruk </td>
            </tr>
            <tr>
                <td align="left">3 - Cukup </td>
            </tr>
            <tr>
                <td align="left">4 - Baik </td>
            </tr>
            <tr>
                <td align="left">5 - Sangat Baik </td>
            </tr>
                <td align="left"></td>
            </tr>
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
    echo '<h3 class="m-0 font-weight-bold text-primary"><span class="fas fa-table"></span> Cetak Laporan Penilaian Alternatif</h3><hr>';
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

