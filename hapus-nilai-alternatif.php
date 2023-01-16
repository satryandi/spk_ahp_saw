<?php include './includes/api.php';
akses_pengguna(array(0,2));
if (!empty($_GET)) {
    @$id = $_GET['id'];
    $q = $conn->prepare("DELETE FROM hasil WHERE id_alternatif='$id'");
    $q->execute();
    $q = $conn->prepare("DELETE FROM nilai_alternatif WHERE alternatif='$id'");
    $q->execute();
    // $q = $conn->prepare("DELETE FROM alternatif WHERE id='$id'");
    // $q->execute();
    header('Location: ./list-nilai-alternatif');
} else header('Location: ./list-nilai-alternatif');