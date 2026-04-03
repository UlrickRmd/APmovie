<?php require("header.php"); ?>
<?php require("fonctions.php"); ?>

<?php 
if (isset($_GET['id']) && !empty($_GET['id'])) { 
    $id = $_GET['id'];
    $acteur = detailActeur($id);
    $films = filmsActeur($id);
} else {
    echo "Aucun acteur sélectionné";
    exit;
}
?>

<div class="container mt-5">

    <div class="row">
        <!-- Image -->
        <div class="col-md-4">
            <img src="https://image.tmdb.org/t/p/w500/<?=$acteur['profile_path'];?>" class="img-fluid">
        </div>

        <!-- Infos -->
        <div class="col-md-8">
            <div class="card p-3 shadow-sm text-center">
                <h2><?= $acteur['name']; ?></h2>

                <div class="bg-primary text-white p-2 mt-3">
                    Biographie
                </div>

                <p class="mt-3">
                    <?= $acteur['biography'] ? $acteur['biography'] : "Biographie non disponible"; ?>
                </p>
            </div>
        </div>
    </div>

    <!-- Films -->
    <div class="mt-5 p-4 bg-light">
        <h4 class="text-primary mb-4">Principaux films</h4>

        <div class="row">
            <?php foreach ($films as $film) { ?>
                <div class="col-md-3 text-center mb-4">

                    <?php if ($film['poster_path']) { ?>
                        <img src="https://image.tmdb.org/t/p/w300/<?=$film['poster_path'];?>" class="img-fluid mb-2">
                    <?php } ?>

                    <h6><?= $film['title']; ?></h6>

                    <a href="detail.php?id=<?=$film['id']?>" class="btn btn-primary btn-sm">View</a>

                </div>
            <?php } ?>
        </div>
    </div>

</div>

<?php require("footer.php"); ?>