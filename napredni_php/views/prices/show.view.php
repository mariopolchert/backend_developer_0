<?php include_once base_path('views/partials/header.php'); ?>

<main class="container my-3 d-flex flex-column flex-grow-1 vh-100">
    <div class="title flex-between">
        <h1>Cijena za <?= $price['tip_filma'] ?></h1>
    </div>

    <hr>

    <form class="row g-3 mt-3">
        <div class="col-md-4">
            <label for="tip_filma" class="form-label">Tip Filma</label>
            <input type="text" class="form-control" id="tip_filma" name="tip_filma" value="<?= $price['tip_filma']?>" disabled>
        </div>
        <div class="col-md-4">
            <label for="cijena" class="form-label">Cijena</label>
            <input type="number" step="0.01" class="form-control" id="cijena" name="cijena" value="<?= $price['cijena']?>" disabled>
        </div>
        <div class="col-md-4">
            <label for="zakasnina" class="form-label">Zakasnina</label>
            <input type="number" step="0.01" class="form-control" id="zakasnina" name="zakasnina" value="<?= $price['zakasnina_po_danu']?>" disabled>
        </div>
        <div class="col-12 d-flex mt-4 justify-content-between">
            <a href="/prices" class="btn btn-primary mb-3">Povratak</a>
            <a href="/prices/edit?id=<?= $price['id'] ?>" class="btn btn-success mb-3">Uredi</a>
        </div>
    </form>

</main>

<?php include_once base_path('views/partials/footer.php'); ?>