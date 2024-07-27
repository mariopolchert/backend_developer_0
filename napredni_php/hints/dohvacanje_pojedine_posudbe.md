#### Primjer koda za kreiranje GET ili POST parametara za dohvacanje pojedine posudjene kopije

```php
if (!isset($_GET['pid']) || !isset($_GET['kid'])) {
    abort();
}
```

```HTML
    <a href="/rentals/edit?pid=<?= $rental['id'] ?>&kid=<?= $rental['kopija_id'] ?>">
```
```HTML
    <form action="/rentals/destroy" method="POST" class="d-inline">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="pid" value="<?= $rental['id'] ?>">
        <input type="hidden" name="kid" value="<?= $rental['kopija_id'] ?>">
        <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Obrisi posudbu"><i class="bi bi-trash"></i></button>
    </form>
```