<?php
require "koneksidb.php";

$sql = "SELECT artikel.id, artikel.judul, artikel.deskripsi, artikel.isi, artikel.tanggal_publikasi, gambar, penulis.nama 
        FROM artikel 
        JOIN penulis ON penulis.id = artikel.penulis
        ORDER BY artikel.tanggal_publikasi DESC"; 
$result = $conn->query($sql);


$articles = $result->fetchAll(PDO::FETCH_ASSOC);
$featuredArticle = array_shift($articles);
?>

<main class="container">
    <div class="row p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
            <div class="col-lg-6">
                <img src="./uploads/<?= $featuredArticle["gambar"] ?>" height="600" class="w-100 object-fit-cover rounded-3" style="filter: brightness(90%);" alt="<?= $featuredArticle["judul"] ?>">
            </div>
            <div class="col-lg-6">
                <p class="lead my-3"><?php echo $featuredArticle["judul"] ?></p>
                <p class="lead my-3">Penulis :<?php echo  $featuredArticle["nama"] ?></p>
                <p class="lead my-3">Date : <?php echo $featuredArticle["tanggal_publikasi"] ?></p>
                <p class="lead my-3">Deskripsi : <?php echo $featuredArticle["isi"] ?></p>
                <a href="read.php?id=<?php echo $featuredArticle['id']; ?>" class="icon-link gap-1 icon-link-hover stretched-link">
                        Continue reading
                        <svg class="bi"><use xlink:href="#chevron-right"/></svg>
                    </a>
            </div>
    </div>
  
    <div class="row">
        <div class="col-6"><h5><strong>Recommended for you</strong></h5></div>
        <div class="col-6"></div>
    </div>

    <div class="row mb-2">
        <?php
        if ($articles) {
        foreach ($articles as $article) {
        ?>
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 class="mb-2"><?php echo htmlspecialchars($article['judul']); ?></h3>
                    <div class="col-auto d-none d-lg-block">
                        <img height="300" class="w-100 object-fit-cover" src="./uploads/<?php echo htmlspecialchars($article['gambar']); ?>" alt="<?php echo htmlspecialchars($article['judul']); ?>">
                    </div>
                    <p class="lead mt-2"><?php echo htmlspecialchars($article['deskripsi']); ?></p>
                    <p class="my-2 text-body-secondary"><?php echo htmlspecialchars($article['tanggal_publikasi']); ?></p>
                    <a href="read.php?id=<?php echo $article['id']; ?>" class="icon-link gap-1 icon-link-hover stretched-link">
                        Continue reading
                        <svg class="bi"><use xlink:href="#chevron-right"/></svg>
                    </a>
                </div>
            </div>
        </div>
        <?php
        }
      }
        ?>
    </div>
</main>

