<?php
include 'koneksidb.php';
$artikels=$conn->query("SELECT * FROM artikel")->fetchAll();
$penuliss=$conn->query("SELECT * FROM penulis")->fetchAll();

include 'header.php';
?>
<div class="container">
  <h2 class="mt-5 mb-2"> Artikel </h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Judul</th>
        <th scope="col">Deskripsi</th>
        <th scope="col">Isi</th>
        <th scope="col">Tgl Publikasi</th>
        <th scope="col">Penulis</th>
        <th scope="col">Gambar</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($artikels as $row) : ?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['judul']; ?></td>
      <td><?php echo $row['deskripsi']; ?></td>
      <td><?php echo $row['isi']; ?></td>
      <td><?php echo $row['tanggal_publikasi']; ?></td>
      <td><?php echo $row['penulis']; ?></td>
      <td><img src="./uploads/<?php echo $row['gambar']; ?>" width="100px"></td>
      <td>
        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
        <a href="hapusdata.php?id=<?php echo $row['id']; ?>&action=hpsartikel" class="btn btn-danger">Hapus</a>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
  </table>

  <h2 class="mt-5 mb-2"> Penulis </h2>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($penuliss as $row) : ?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['nama']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td>
        <a href="editpenulis.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
        <a href="hapusdata.php?id=<?php echo $row['id']; ?>&action=hpspenulis" class="btn btn-danger">Hapus</a>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
  </table>
</div>
<?php
    include "footer.php";
?>