<?php
include "../../Views/Layout/root.php";
include_once(__ROOT__ . "/Entities/User.php");
class UserManager
{
    private $Connection = Null;

    private function getConnection()
    {
        if (is_null($this->Connection)) {
            $this->Connection = mysqli_connect('localhost', 'root', '', 'gestionprojects');
            // Vérifier l'ouverture de la connexion avec la base de données
            if (!$this->Connection) {
                $message = 'Erreur de connexion: ' . mysqli_connect_error();
                throw new Exception($message);
            }
        }
        return $this->Connection;
    }

    public function add($user)
    {
        $Name = $user->getName();
        $Mail = $user->getEmail();
        $Password = $this->generateHashedPassword($user->getPassword());
        // requête SQL
        $sql = "INSERT INTO `projects`(`name`, `description`) VALUES ('$Name','$Mail')";
        mysqli_query($this->getConnection(), $sql);
    }
    private function generateHashedPassword($password)
    {
        // Generate the hashed password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Return the hashed password
        return $hashed_password;
    }
}

?>