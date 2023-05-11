<?php 
class Project
{
    private $Id;
    private $name;
    private $description;

    public function SetId($Id)
    {
        $this->Id = $Id;
    }

    public function GetId()
    {
        return $this->Id;
    }

    public function SetName($name)
    {
        $this->name = $name;
    }

    public function GetName()
    {
        return $this->name;
    }

    public function SetDescription($Description)
    {
        $this->description = $Description;
    }

    public function GetDescription()
    {
        return $this->description;
    }
}

?>