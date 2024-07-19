<?php

use Core\Database;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $clanIme = $_POST['ime'];
    $clanPrezime = $_POST['prezime'];
    $clanAdresa = $_POST['adresa'];
    $clanTelefon = $_POST['telefon'];
    $clanEmail = $_POST['email'];

    $db = new Database();

    $sql = "SELECT id FROM clanovi WHERE email = :email";
    $count = $db->query($sql, ['email' => $clanEmail]);

    if(!empty($count)){
        die("Korisnik sa emailom $clanEmail vec postoji u nasoj bazi!");
    }

    $sql = "SELECT clanski_broj
            FROM clanovi
            ORDER BY id DESC
            LIMIT 1";
    $clanskiBroj = $db->query($sql);
    $clanskiBroj = str_replace('CLAN','', $clanskiBroj[0]['clanski_broj']);
    $clanskiBroj = intval($clanskiBroj);
    $clanskiBroj = 'CLAN' . ++$clanskiBroj;
    
    $sql = "INSERT INTO clanovi (ime, prezime, adresa, telefon, email, clanski_broj) VALUES (:ime, :prezime, :adresa, :telefon, :email, :clanski_broj)";

    try {
        $success = $db->query($sql, ['ime' => $clanIme, 'prezime' => $clanPrezime, 'adresa' => $clanAdresa, 'telefon' => $clanTelefon, 'email' => $clanEmail, 'clanski_broj' => $clanskiBroj]);
    } catch (\Throwable $th) {
        throw $th;
    }

    redirect('members');
} else {
    dd('Unsupported method!');
}
