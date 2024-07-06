<?php
include "header.php";

include "koneksidb.php";

$id = $_GET['id'];
$sql = "SELECT * FROM artikel JOIN penulis ON artikel.penulis = penulis.id WHERE artikel.id = $id";
$article = $conn->query($sql)->fetch();
?>
<div class="col-md-6 mx-auto">
    <div class="g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column ">
            <h3 class="mb-2"><?php echo htmlspecialchars($article['judul']); ?></h3>
            <div class="col-auto d-none d-lg-block">
                <img height="600" class="w-100 object-fit-cover"
                    src="./uploads/<?php echo htmlspecialchars($article['gambar']); ?>"
                    alt="<?php echo htmlspecialchars($article['judul']); ?>">
            </div>
            <p class="my-2 text-body-secondary"><?php echo htmlspecialchars($article['tanggal_publikasi']); ?></p>
            <p class="lead mt-2">Penulis :<?php echo htmlspecialchars($article['nama']); ?></p>

            <p class="lead my-3"><?php echo htmlspecialchars($article['deskripsi']); ?></p>
            <p class="lead mt-2"><?php echo htmlspecialchars($article['isi']); ?></p>

            <a href="index.php">Back</a>

        </div>
    </div>
</div>
<?php include "footer.php"; ?>
