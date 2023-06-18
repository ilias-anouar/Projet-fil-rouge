<?php

namespace MyNamespace\Entities\Inscription;

include "Inscription.php";

use MyNamespace\Entities\Inscription\Inscription;

class Measures extends Inscription
{
    private $height;
    private $weight;
    private $neck;
    private $waist;
    private $hip;
    private $Body_Fat;
    private $BMR;
    private $BMI;
    private $Ideal_Weigth;

    // constracture
    public function __construct($height, $weight, $neck, $waist, $hip)
    {
        $this->height = $height;
        $this->weight = $weight;
        $this->neck = $neck;
        $this->waist = $waist;
        $this->hip = $hip;
    }

    // setter methods:
    public function setBody_Fat($Body_Fat)
    {
        $this->Body_Fat = $Body_Fat;
    }
    public function setBMRt($BMR)
    {
        $this->BMR = $BMR;
    }
    public function setBMI($BMI)
    {
        $this->BMI = $BMI;
    }
    public function setIdeal_Weigth($Ideal_Weigth)
    {
        $this->Ideal_Weigth = $Ideal_Weigth;
    }

    // getter methods:
    public function getHeight()
    {
        return $this->height;
    }
    public function getWeight()
    {
        return $this->weight;
    }
    public function getNeck()
    {
        return $this->neck;
    }
    public function getWaist()
    {
        return $this->waist;
    }
    public function getHip()
    {
        return $this->hip;
    }
    public function getBody_Fat()
    {
        return $this->Body_Fat;
    }
    public function getBMR()
    {
        return $this->BMR;
    }
    public function getBMI()
    {
        return $this->BMI;
    }
    public function getIdeal_Weigth()
    {
        return $this->Ideal_Weigth;
    }
}