<?php

include_once 'Car.php';

class InternalCombustionCar extends Car
{

    public int $zapremina;
    public string $tipGoriva;
    public string $mjenjac;

    public function __construct($zapremina, $tipGoriva, $mjenjac)
    {
        $this->zapremina = $zapremina;
        $this->tipGoriva = $tipGoriva;
        $this->mjenjac = $mjenjac;

        parent::__construct('VW', 'Golf', 'Electric', 2300);
    }

}

$electricCar = new ElectricCar(2000, 'benzin', '5 brzina');

dd($electricCar);