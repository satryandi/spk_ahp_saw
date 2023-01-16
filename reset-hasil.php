<?php
include './includes/api.php';
$id  = $_GET['id_alternatif'];
$periode = $_GET['periode'];
echo $id;
echo $periode;
echo 'periode';
echo console.log('testing')
$q = $conn->prepare("DELETE FROM hasil where periode='$periode' AND id_alternatif='$id'"); //hapus
$q->execute();

header("Location: ./index.php");


//AND id_alternatif='$id'
?>