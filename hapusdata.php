<?php
include 'koneksidb.php';

if (!isset($_GET['id']) || !isset($_GET["action"])){
    header('Location: index.php');
}

$id = $_GET['id'];
$action = $_GET["action"];

if ($action == "hpsartikel") {
    $sql = "DELETE FROM artikel WHERE id = $id";
    $result = $conn->query($sql);
    if ($result) {
        header('Location: ./data.php');
    } else {
        echo "Data gagal dihapus";
    }
    header('Location: ./data.php');
} else if ($action == "hpspenulis") {
    $sql = "DELETE FROM penulis WHERE id = $id";
    $result = $conn->query($sql);
    if ($result) {
      header('Location: ./data.php');
    } else {
        echo "Data gagal dihapus";
    }
    header('Location: ./data.php');
} 
