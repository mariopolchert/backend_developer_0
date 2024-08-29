<?php

use Core\Database;
use Core\Session;
use Core\ResourceInUseException;

if ((!isset($_POST['pid']) && !isset($_POST['kid'])) || !isset($_POST['_method']) || $_POST['_method'] !== 'DELETE') {
    abort();
}

$db = Database::get();

$rental = $db->query('SELECT * from posudba WHERE id = :id', ['id' => $_POST['pid']])->findOrFail();
$copy   = $db->query("SELECT * from kopija WHERE id = :id", ['id' => $_POST['kid']])->findOrFail();

// $rentals = select from posudba_kopija where posudba_id = $_POST['pid']  --> all()


// if (count($rentals) == 1) {
//     samo jedna kopija je u posudbi, oznaci posudbu kao vraceno
// }else{
//     posudba ima jos ne vracenih koopija , samo osvjezi updated_at
// }

try {
    $db->connection()->beginTransaction(); 

    $db->query("DELETE from posudba_kopija WHERE posudba_id = :pid AND kopija_id = :kid", [
        'pid' => $rental['id'],
        'kid' => $copy['id'],
    ]);

    $db->query("UPDATE posudba SET updated_at = :d WHERE id = :pid", [
        'pid' => $rental['id'],
        'd' => date("Y-m-d H:i:s")
    ]);

    $db->query("UPDATE kopija SET dostupan = 1 WHERE id = :kid", ['kid' => $copy['id']]);
} catch (PDOException $e) {
    $db->connection()->rollBack();
    Session::flash('message', [
        'type' => 'danger',
        'message' => 'Something wrong'
    ]);
    goBack();
}

$db->connection()->commit();

Session::flash('message', [
    'type' => 'success',
    'message' => "Uspjesno vracena kopija {$copy['id']}"
]);
goBack();




















$rental = $db->query('SELECT * from posudba WHERE id = :id', ['id' => $_POST['pid']])->findOrFail();
$copy = $db->query('SELECT * from kopija WHERE id = :id', ['id' => $_POST['kid']])->findOrFail();


try {
    $db->connection()->beginTransaction();

    $db->query("DELETE from posudba_kopija WHERE posudba_id = :pid AND kopija_id = :kid", ['pid' => $_POST['pid'], 'kid' => $_POST['kid']]);
    $db->query("DELETE from posudba WHERE id = :id", ['id' => $_POST['pid']]);
    $db->query("UPDATE kopija SET dostupan = 1 WHERE id = :id", ['id' => $copy['id']]);

    $db->connection()->commit();
} catch (ResourceInUseException $e) {
    $db->connection()->rollBack();
    Session::flash('message', [
        'type' => 'danger',
        'message' => "Ne mozete obrisati posudbu {$rental['id']} prije nego su sve kopije vracene."
    ]);
    goBack();
}

Session::flash('message', [
    'type' => 'success',
    'message' => "Uspjesno obrisana posudba {$rental['id']}."
]);

redirect('rentals');
