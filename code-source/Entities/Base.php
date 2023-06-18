<?php
namespace MyNamespace\Entities\Base;

class Base
{
    private $id;
    // the setting methods
    public function Set_Id($id)
    {
        $this->id = $id;
    }

    // the getting methods
    public function Get_Id()
    {
        return $this->id;
    }

}
?>