<?php
if (!empty($_GET)) {
    @$id = $_GET['id'];
    @$periode = $_GET['periode'];
}
?>
<!DOCTYPE html>
<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
    <title>Hasil Keputusan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<?php include './includes/api.php';
$res = data_keputusan_id($id, $periode);

?>
<table align="center">
    <tr>
        <td>
            <center><img src="img/logobreadtalk.jpg" width="50" height="50"></center>
        </td>
        <td>
            <center>
                <font size="5"><b>Koperasi Simpan Pinjam Surya Kencana</b></font> <br>
                <font size="4">Jl. H. Muchtar Raya No. 14, RW.08</font> <br>
                <font size="4">Joglo, Kembangan, Jakarta Barat, DKI Jakarta, 11640</font> <br>
                <font size="4">Telp. (021) 58907112</font> <br>
                <!-- <font size="4">Email. ENQUIERES@UNITYHOTELS.COM</font> -->
            </center>

        </td>
    </tr>
    <tr>
        <td colspan="2">
            <hr>
        </td>
    </tr>
</table>

<body onload="window.print()">
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>

    <center>
        <h4><b>Surat Hasil Keputusan</b></h4>
        <br>
    </center>
    <br>
    <br>

    <h5>Berdasarkan perhitungan penilaian alternatif
        menetapkan bahwa :</h5>
    <br>

    <h5>Nama &nbsp;&nbsp; : <?= $res[5] ?></h5>
    <h5>Jenis kelamin &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : <?= $res[6] ?></h5>
    <h5>Jabatan &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : <?= $res[7] ?></h5>
    <h5>Cabang &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: <?= $res[8] ?></h5>
    <h5>Nilai &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; : <?= number_format($res[1], 4, '.', ',') ?></h5>

    <br>
    <h5> Pada tanggal <?= date("d M Y", strtotime($periode)) ?> terpilih sebagai karyawan pada divisi peminjaman <b>TERBAIK</b> pada Koperasi Simpan Pinjam Surya Kencana</h5>
    <br>
    <br>


    <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
        <tr>
            <td align="right">Jakarta, <?php echo date('d-M-Y') ?></td>

        </tr>
        <tr>
            <td align="right"></td>
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