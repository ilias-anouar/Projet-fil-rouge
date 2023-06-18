<?php
namespace MyNamespace\Entities\Plan;

include_once "Base.php";

use MyNamespace\Entities\Base\Base;

class Plan extends Base
{
    private $Name;
    private $Description;

    // setters methods
    public function setName($name)
    {
        $this->Name = $name;
    }
    public function setDescription($description)
    {
        $this->Description = $description;
    }
    // getters methods
    public function getName()
    {
        return $this->Name;
    }
    public function getDescription()
    {
        return $this->Description;
    }
    // toString method
    public function __toString()
    {
        return "Name: " . $this->Name . " Description: " . $this->Description;
    }
}
?>