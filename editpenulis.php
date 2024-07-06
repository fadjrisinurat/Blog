<?php
require_once "koneksidb.php";

$id = $_GET['id'];

include "header.php";

$artikel = $conn->query("SELECT * FROM penulis WHERE id = $id")->fetch();
?>

<div class="col-lg-8 mx-auto">
    <h1>Edit Penulis</h1>
    <form action="updatepenulis.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($artikel['id']); ?>">
        <div>
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($artikel['id']); ?>">

            <div>
                <label for="nama">Nama:</label> <br>
                <textarea class="form-control" id="description" name="nama"
                    required><?php echo htmlspecialchars($artikel['nama']); ?></textarea>
            </div>
            <div>
                <label for="email">Email:</label> <br>
                <textarea class="form-control" id="email" name="email"
                    required><?php echo htmlspecialchars($artikel['email']); ?></textarea>
            </div>
            <button class="btn btn-primary" type="submit">Simpan Perubahan</button>

            <?php
            include "footer.php";
            ?>