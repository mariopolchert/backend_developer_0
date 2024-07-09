<?php

// declare(strict_types=1);

class Car {

    private string $make;
    private string $model;
    private string $fuel;
    private int $weight;

    private function belongsTo()
    {
        
    }

    public function getFullName()
    {
        return "$this->make - $this->model";
    }


    // getter metoda - vraca vrijednost privatnog svojstva izvan klase
    public function getMake()
    {
        return $this->make;
    }

    // setter metoda - slazi za postavljnje vrijednosti privatnog svojstva izvan klase
    public function setMake(string $make)
    {
        $this->make = $make;
        return $this;
    }
    
    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $var)
    {
        $this->model = $var;
        return $this;
    }
    
    public function getWeight(): int
    {
        return $this->weight;
    }

    public function setWeight(int $weight)
    {
        $this->weight = $weight;
        return $this;
    }

    public function getFuel(): string
    {
        return $this->fuel;
    }

    public function setFuel(string $fuel): self
    {
        $this->fuel = $fuel;
        return $this;
    }

    public function toArray()
    {
        return [
            'make' => $this->make,
            'model' => $this->model,
            'fuel' => $this->fuel,
            'weight' => $this->weight,
        ];
    }
}

$tesla = new Car();

$tesla
    ->setMake('Tesla')
    ->setModel('Model S')
    ->setWeight(2300)
    ->setFuel('Electric');

echo $tesla->getFullName();
