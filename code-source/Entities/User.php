<?php
namespace MyNamespace\Entities\User;

include_once "Base.php";

use MyNamespace\Entities\Base\Base;
class User extends Base
{
    private $first_name;
    private $last_name;
    private $email;
    private $password;
    private $role;

    private $gender;

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
    public function setRole($role)
    {
        $this->role = $role;
    }
    public function setGender($gender)
    {
        $this->gender = $gender;
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
    public function getRole()
    {
        return $this->role;
    }
    public function getGender()
    {
        return $this->gender;
    }
}

?>