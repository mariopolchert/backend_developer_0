<?php

class Bicikl extends Vehicle implements Driveable
{
   private string $masinica;
   private string $lulaVolana;
   private string $vilica;

   public function drives()
   {
      return 'it rides';
   }

}