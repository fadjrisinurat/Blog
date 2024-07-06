<?php
    include "header.php";

    require_once("koneksidb.php");
    $action = isset($_GET['action']) ? $_GET['action'] : '' ;
    $article = [
        'id' => '',
        'judul' => '',
        'deskripsi' => '',
        'isi' => '',
        'tanggal_publikasi' => '',
        'penulis' => '',
        'gambar' => '' // Tambahkan kolom gambar
    ];

    if ($action == 'edit') {
        $id = $_GET['id'];
        $sql = "SELECT artikel.id, artikel.judul, artikel.deskripsi, artikel.isi, artikel.tanggal_publikasi, artikel.penulis, artikel.gambar FROM artikel WHERE id= ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $article = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];
        $isi = $_POST['isi'];
        $tglpublish = $_POST['tglpublish'];
        $penulis = $_POST['penulis'];
        $gambar = $_FILES['gambar']['name'];

        // Upload gambar
        if ($gambar) {
            $target_dir = "./uploads/";
            $target_file = $target_dir . basename($gambar);
            move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file);
        } else {
            $gambar = $_POST['existing_gambar'];
        }

        if (!empty($id)) {
            $sql = "UPDATE artikel SET judul = ?, deskripsi = ?, isi = ?, tanggal_publikasi = ?, penulis = ?, gambar = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$judul, $deskripsi, $isi, $tglpublish, $penulis, $gambar, $id]);
        } else {
            $sql = "INSERT INTO artikel (judul, deskripsi, isi, tanggal_publikasi, penulis, gambar) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if ($stmt->execute([$judul, $deskripsi, $isi, $tglpublish, $penulis, $gambar])) {
                echo <<<HTML
                <div class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">Artikel berhasil disimpan</div>
                        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
                HTML;
            } else {
                echo "Terjadi kesalahan: " . implode(" ", $stmt->errorInfo());
            }
        }
    }

    $penulis_sql = "SELECT id, nama FROM penulis";
    $penulis_stmt = $conn->query($penulis_sql);
    $penulis_list = $penulis_stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
<form method="POST" action="input_data.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $article['id'] ?>">
        <input type="hidden" name="existing_gambar" value="<?php echo $article['gambar'] ?>">
        
        <div class="form-group">
            <label for="judul">Judul:</label>
            <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $article['judul'] ?>">
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi:</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi"><?php echo $article['deskripsi'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="isi">Isi:</label>
            <textarea class="form-control" id="isi" name="isi" ><?php echo $article['isi'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="tglpublish">Tgl Publish:</label>
            <input type="date" class="form-control" id="tglpublish" name="tglpublish" value="<?php echo $article['tanggal_publikasi'] ?>">
        </div>
        <div class="form-group">
            <label for="penulis">Penulis</label>
            <select class="form-control" id="penulis" name="penulis">
                <?php foreach ($penulis_list as $penulis) { ?>
                    <option value="<?php echo $penulis['id'] ?>" <?php echo $penulis['id'] == $article['penulis'] ? 'selected' : '' ?>>
                        <?php echo $penulis['nama'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar:</label>
            <?php if ($article['gambar']) { ?>
                <img src="uploads/<?php echo $article['gambar'] ?>" alt="Gambar Artikel" width="100" class="mt-2"><br>
            <?php } ?>
            <input type="file" class="form-control mt-2" id="gambar" name="gambar">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    <br>
    <a href="data.php"><button class="btn btn-secondary">Lihat Data</button></a>
</div>
<?php
    include "footer.php";
?>