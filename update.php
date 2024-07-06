<?php
require_once 'koneksidb.php';

$id = $_POST['id'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$isi = $_POST['isi'];
$taggal_publikasi = $_POST['tanggal_publikasi'];
$penulis = $_POST['penulis'];

$gambar = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];
$path = "uploads/" . $gambar;

if ($gambar) {
    move_uploaded_file($tmp, $path);
    $conn->query("UPDATE artikel SET judul = '$judul', deskripsi = '$deskripsi', isi = '$isi', tanggal_publikasi = '$taggal_publikasi', penulis = '$penulis', gambar = '$gambar' WHERE id = $id");
} else {
    $conn->query("UPDATE artikel SET judul = '$judul', deskripsi = '$deskripsi', isi = '$isi', tanggal_publikasi = '$taggal_publikasi', penulis = '$penulis' WHERE id = $id");
}

header("Location: index.php");
?>