<?php

use Core\Database;

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    dd('Unsupported method!');
}
    
$data = [
    'ime' => $_POST['ime'],
    'prezime' => $_POST['prezime'],
    'adresa' => $_POST['adresa'],
    'telefon' => $_POST['telefon'],
    'email' => $_POST['email'],
];

//TODO: validate the data

$db = new Database();

$sql = "SELECT id FROM clanovi WHERE email = :email";
$count = $db->query($sql, ['email' => $data['email']])->find();

if(!empty($count)){
    die("Korisnik sa emailom {$data['email']} vec postoji u nasoj bazi!");
}

// Genereate next clanski_broj
$sql = "SELECT clanski_broj FROM clanovi ORDER BY id DESC LIMIT 1";
$clanskiBroj = $db->query($sql)->find();
$clanskiBroj = str_replace('CLAN','', $clanskiBroj['clanski_broj']);
$clanskiBroj = intval($clanskiBroj);
$clanskiBroj = 'CLAN' . ++$clanskiBroj;

$sql = "INSERT INTO clanovi (ime, prezime, adresa, telefon, email, clanski_broj) VALUES (:ime, :prezime, :adresa, :telefon, :email, :clanski_broj)";
$db->query($sql, [
    'ime' => $data['ime'],
    'prezime' => $data['prezime'],
    'adresa' => $data['adresa'],
    'telefon' => $data['telefon'],
    'email' => $data['email'],
    'clanski_broj' => $clanskiBroj
]);

redirect('members');
