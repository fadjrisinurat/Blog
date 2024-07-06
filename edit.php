<?php
require_once "koneksidb.php";

$id = $_GET['id'];

include "header.php";

$artikel = $conn->query("SELECT * FROM artikel WHERE id = $id")->fetch();


?>
<div class="col-lg-8 mx-auto">
    <h1>Edit Artikel</h1>
    <form  action="update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($artikel['id']); ?>">
        <div>
            <label for="title">Judul:</label> <br>
            <input class="form-control" type="text" id="title" name="judul" value="<?php echo htmlspecialchars($artikel['judul']); ?>" required>
        </div>
        <div>
            <label for="description">Deskripsi:</label> <br>
            <textarea class="form-control" id="description" name="deskripsi" required><?php echo htmlspecialchars($artikel['deskripsi']); ?></textarea>
        </div>
        <div>
            <label for="Isi">Isi:</label> <br>
            <textarea class="form-control" id="Isi" name="isi" required><?php echo htmlspecialchars($artikel['isi']); ?></textarea>
        </div>
        <div>
            <label for="publication_date">Tanggal Publikasi:</label> <br>
            <input class="form-control" type="date" id="publication_date" name="tanggal_publikasi" value="<?php echo htmlspecialchars($artikel['tanggal_publikasi']); ?>" required>
        </div>
        <div>
            <label for="author">Penulis:</label> <br>
            <select name="penulis" id="author" required>
                <?php 
                    $penulis = $conn->query("SELECT * from penulis")->fetchAll();
                    foreach ($penulis as $pen) { ?>
                        <option value="<?php echo $pen['id'] ?>" <?php echo $pen['id'] == $artikel['penulis'] ? 'selected' : '' ?>>
                            <?php echo $pen['nama'] ?>
                        </option>
                    <?php } ?>
            </select>
        </div>
        
        <div>
            <label for="gambar">Gambar:</label> <br>
            <input type="file" class="form-control-file mt-2" id="gambar" name="gambar">
            <img src="uploads/<?php echo $artikel['gambar']; ?>" alt="gambar" style="width: 200px;">
        </div>
        <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
    </form>
</div>
<?php 
include "footer.php";
?>