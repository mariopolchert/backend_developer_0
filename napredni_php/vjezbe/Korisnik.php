<?php

// OOP -> Object Oriented Programming

function dd($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    die();
}

class Korisnik {

    public $ime;
    private $godine;
    public $spol;
    protected $adresa;

    public function posudjujeFilm(){
        echo 'Film Posudjen';
    }
    
    private function seUclanjuje(){
        echo 'Korisnik je uclanjen';
    }
}

$tena = new Korisnik();
$tena->ime = 'Tena';
$tena->spol = 'Zensko';
$tena->posudjujeFilm();

$korisnik = new Korisnik();
$korisnik->ime = 'Arijan';
$korisnik->spol = 'Musko';
$korisnik->posudjujeFilm();


dd($korisnik);