<?php
require_once 'koneksidb.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];


if ($id) {
    $conn->query("UPDATE penulis SET id = '$id', nama =  '$nama', email ='$email' WHERE id = $id");
}

header("Location: index.php");
?>