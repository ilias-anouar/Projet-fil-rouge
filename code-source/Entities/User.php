<?php
include "Base.php";
class User extends Base
{
    private $first_name;
    private $last_name;
    private $email;
    private $password;

    // setting methods:
    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;
    }
    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }

    // getting methods:

    public function getFirst_name()
    {
        return $this->first_name;
    }
    public function getLast_name()
    {
        return $this->last_name;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }
}

?>