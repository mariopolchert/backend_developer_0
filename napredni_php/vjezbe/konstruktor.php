<?php

include "Car.php";

function dd($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    die();
}


class Vlasnik {

    private string $ime;
    private string $prezime;
    private int $godine;
    private string $spol;
    // nullable string -> ovaj property moze biti ili sring ili NULL
    private ?string $adresa;
    private ?Car $car;

    // dodavanje jednod objekta unutar druge klase naziva se Dependency injection
    public function __construct(?Car $car, string $ime, string $prezime, int $godine, string $spol, ?string $adresa)
    {
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->godine = $godine;
        $this->spol = $spol;
        $this->adresa = $adresa;
        $this->car = $car;
    }

    public function posjeduje()
    {
        return $this->car;
    }
}

$car = new Car();
$car
    ->setMake('Tesla')
    ->setModel('Model S')
    ->setWeight(2300)
    ->setFuel('Electric');

$tena = new Vlasnik($car, 'Tena', 'Fiskus', 31, 'Zensko', null);

$tena->posjeduje();
dd($tena);