<?php include_once base_path('views/partials/header.php'); ?>

<main class="container my-3 d-flex flex-column flex-grow-1 vh-100">
    <div class="title flex-between">
        <h1>Uredi cijenu za <?= $price['tip_filma'] ?></h1>
    </div>

    <hr>

    <form class="row g-3 mt-3" method="POST" action="/prices">
        <input type="hidden" name="id" value="<?= $price['id'] ?>">
        <input type="hidden" name="_method" value="PATCH">
        <div class="col-md-4">
            <label for="tip_filma" class="form-label">Tip Filma</label>
            <input type="text" class="form-control <?= isset($errors['tip_filma']) ? 'is-invalid' : '' ?>" id="tip_filma" name="tip_filma" value="<?= $price['tip_filma']?>">
            <div class="invalid-feedback"><?= $errors['tip_filma'] ?? '' ?></div>
        </div>
        <div class="col-md-4">
            <label for="cijena" class="form-label">Cijena</label>
            <input type="number" step="0.01" class="form-control <?= isset($errors['cijena']) ? 'is-invalid' : '' ?>" id="cijena" name="cijena" value="<?= $price['cijena']?>">
            <div class="invalid-feedback"><?= $errors['cijena'] ?? '' ?></div>
        </div>
        <div class="col-md-4">
            <label for="zakasnina_po_danu" class="form-label">Zakasnina</label>
            <input type="number" step="0.01" class="form-control <?= isset($errors['zakasnina_po_danu']) ? 'is-invalid' : '' ?>" id="zakasnina_po_danu" name="zakasnina_po_danu" value="<?= $price['zakasnina_po_danu']?>">
            <div class="invalid-feedback"><?= $errors['zakasnina_po_danu'] ?? '' ?></div>
        </div>
        <div class="col-12 d-flex mt-4 justify-content-between">
            <a href="/prices" class="btn btn-primary mb-3">Povratak</a>
            <button type="submit" class="btn btn-success mb-3">Spremi</a>
        </div>
    </form>
</main>

<?php include_once base_path('views/partials/footer.php'); ?>