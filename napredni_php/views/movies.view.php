<?php include_once 'partials/header.php' ?>

<main class="container my-3 d-flex flex-column flex-grow-1">
    <h1>Filmovi</h1>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Naslov</th>
                <th>Godina</th>
                <th>Zanr</th>
                <th>Tip</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($movies as $movie): ?>
                <tr>
                    <td><?= $movie['id'] ?></td>
                    <td><?= $movie['naslov'] ?></td>
                    <td><?= $movie['godina'] ?></td>
                    <td><?= $movie['zanr'] ?></td>
                    <td><?= $movie['tip_filma'] ?></td>
                    <td class="table-action-col">
                        <a href="#" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Uredi Film"><i class="bi bi-pencil"></i></a>
                        <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Obrisi Film"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>

<?php include_once 'partials/footer.php' ?>