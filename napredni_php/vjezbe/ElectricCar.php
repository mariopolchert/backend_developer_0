<?php

include_once 'Car.php';

class ElectricCar extends Car
{

    public int $kilowati;
    public string $tipBaterije;
    public string $punjac;

    public function __construct($kilowati, $tipBaterije, $punjac)
    {
        $this->kilowati = $kilowati;
        $this->tipBaterije = $tipBaterije;
        $this->punjac = $punjac;

        parent::__construct('Tesla', 'Model S', 'Electric', 2300);
    }

}

$electricCar = new ElectricCar(95, 'NMC', 'CCS');

dd($electricCar);