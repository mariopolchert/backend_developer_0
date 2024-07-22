<?php

use Core\Database;

// dd($_POST);

if (!isset($_POST['id'] ) || !isset($_POST['_method']) || $_POST['_method'] !== 'PATCH') {
    abort();
}
$memberId = $_POST['id'];

$data = [
    'id' => $_POST['id'],
    'ime' => ['required', 'string'],
    'prezime' => $_POST['prezime'],
    'adresa' => $_POST['adresa'],
    'telefon' => $_POST['telefon'],
    'email' => $_POST['email'],
    'clanski_broj' => $_POST['clanski_broj']
];

$db = new Database();

// Validacija
$sql = 'SELECT * from clanovi WHERE id = :id';
$member = $db->query($sql, ['id' => $memberId])->findOrFail();

$sql = "SELECT * from clanovi WHERE email = :email AND id != :id";
$result = $db->query($sql, [
    'email' => $data['email'],
    'id' => $memberId
])->find();

if (!empty($result)) {
    die("Korisinik sa emailom {$data['email']} vec postoji u nasoj bazi.");
}

$sql = "SELECT * from clanovi WHERE clanski_broj = :clanski_broj AND id != :id";
$result = $db->query($sql, [
    'clanski_broj' => $data['clanski_broj'],
    'id' => $memberId
])->find();

if (!empty($result)) {
    die("Korisinik sa clanski_broj {$data['clanski_broj']} vec postoji u nasoj bazi.");
}

dd(exists($db, $data, 'email'));
exists($db, $data, 'email');

// validate($data);

// End Validacija

$sql = "UPDATE clanovi SET ime = :ime, prezime = :prezime, adresa = :adresa, telefon = :telefon, email = :email, clanski_broj = :clanski_broj WHERE id = :id";
$db->query($sql, [
    'ime' => $data['ime'],
    'prezime' => $data['prezime'],
    'adresa' => $data['adresa'],
    'telefon' => $data['telefon'],
    'email' => $data['email'],
    'clanski_broj' => $data['clanski_broj'],
    'id' => $_POST['id']
]);


$pageTitle = "Edit Member";

redirect('members');


function exists($db, $data, $field)
{
    $sql = "SELECT * from clanovi WHERE $field = :val AND id != :id";
    $result = $db->query($sql, [
        'val' => $data[$field],
        'id' => $data['id']
    ])->find();

    return boolval($result);
}

function string(){

}

function required(){

}

function int(){

}

function minimum(string $userInput, int $length)
{
    if(strlen($userInput) < $length){
        die("Field $userInput must be at least $length chars long");
    }
}

function validate(array $data)
{
    $ime = "alex";
    call_user_func('min', $ime);
}