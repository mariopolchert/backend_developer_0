#### Kod za postavljanje Flash Messages
```php
    Session::flash('message', [
        'type' => 'danger',
        'message' => "Odabrani film trenutno nije dostupan"
    ]);
    goBack();
```
```php
    Session::flash('message', [
        'type' => 'success',
        'message' => "Uspjesno uredjena posudba."
    ]);
    redirect('/rentals');
```

#### Kod za prikaz Flash Messages
```php
$message = Session::get('message');

require base_path('views/rentals/create.view.php');
```


```HTML
<?php if (!empty($message)): ?>
    <div class="alert alert-<?= $message['type'] ?> alert-dismissible fade show" role="alert">
        <?= $message['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
```