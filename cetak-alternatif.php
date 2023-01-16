<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
    <title>Data Atlernatif</title>
    <meta charset="utf-8">
    <title>Report</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<?php include './includes/api.php'; ?>

<body onload="window.print()">
    <div id="laporan">
    <div id="laporan">
        <table align="center" style="width:900px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
            
        </table>

        <table  align="center">
    <tr>
    <td> <center><img src="img/logo-unity.jpeg" width="50" height="50"></center></td>
        <td>
            <center>
                <font size="5"><b>SPK AHP SAW</b></font> <br>
                <font size="5"><b>PT Talkindo Selaksa Anugrah</b></font> <br>
                <font size="4">Jl.xxxx</font>
            </center>
            
        </td>
    </tr>
    <tr>
        <td colspan="2"><hr></td>
    </tr>
</table>

    <center>
        <font size="5"><b>Data Alternatif</b></font> <br>
    </center>
        <table border="0" align="center" style="width:900px;border:none;">
            <tr>
                <th style="text-align:left"></th>
            </tr>
        </table>

        <table border="0" align="center" style="width:900px;border:none;">
            <tr>
                <th style="text-align:left"></th>
            </tr>
        </table>

        <table class="table table-striped table-bordered table-sm">
    <tr class="text-center">
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No.Telp</th>
    </tr>
    <?php $no=1; foreach (data_alternatif() as $x) {
        echo "<tr>";
        echo "<td class=\"text-center\">$no</td>
        <td>{$x[1]}</td>
        <td>{$x[2]}</td>
        <td>{$x[3]}</td>
        ";
        echo '</tr>';
        $no++;
    } ?>
</table>
    </div>
</body>

</html>