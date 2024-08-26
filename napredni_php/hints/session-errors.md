#### Kod za postavljanje Error Messages
```php
$form = new Validator($rules, $_POST);
if ($form->notValid()){
    Session::flash('errors', $form->errors());
    goBack();
}
```

#### Kod za prikaz Error Messages
```php
$errors = Session::get('errors');

require base_path('views/rentals/create.view.php');
```

```HTML
    <div class="col-md-6">
        <label for="movie" class="form-label ps-1">Film</label>
        <select class="form-select <?= isset($errors['movie']) ? 'is-invalid' : '' ?>" name="movie" id="movie">
            <option selected>Odaberite Film</option>
            <?php foreach ($movies as $movie): ?>
                <option value="<?= $movie['id'] ?>"><?= $movie['godina'] ?> - <?= $movie['naslov'] ?></option>
            <?php endforeach ?>
        </select>
        <span class="invalid-feedback"><?= $errors['movie'] ?? '' ?></span>
    </div>
```
```HTML
    <div class="col-md-6">
        <label for="datum_posudbe" class="form-label">Datum Posudbe</label>
        <input type="text" class="form-control <?= isset($errors['datum_posudbe']) ? 'is-invalid' : '' ?>" id="datum_posudbe" name="datum_posudbe" value="<?= $rental['datum_posudbe'] ?>">
        <span class="invalid-feedback"><?= $errors['datum_posudbe'] ?? '' ?></span>
    </div>
```