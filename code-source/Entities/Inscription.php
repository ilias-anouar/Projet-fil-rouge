<?php
namespace MyNamespace\Entities\Inscription;

include_once "Plan.php";

use MyNamespace\Entities\Plan\Plan;

// incription class
class Inscription extends Plan
{
    private $date_inscription;

    // setter method
    public function setDateInscription($date_inscription)
    {
        $this->date_inscription = $date_inscription;
    }

    // getter method
    public function getDateInscription()
    {
        return $this->date_inscription;
    }

}
?>