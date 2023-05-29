<?php
class Base
{
    private $id;
    private $creation_date;
    private $last_update;
    
    // the setting methods
    public function Set_Id($id)
    {
        $this->id = $id;
    }
    public function Set_creation_date($creation_date)
    {
        $this->creation_date = $creation_date;
    }
    public function Set_last_update($last_update)
    {
        $this->last_update = $last_update;
    }

    // the getting methods
    public function Get_Id($id)
    {
        return $this->id;
    }
    public function Get_creation_date($creation_date)
    {
        return $this->creation_date;
    }
    public function Get_last_update($last_update)
    {
        return $this->last_update;
    }
}
?>