<?php
// include "../../Views/Layout/root.php";
include_once(__ROOT__ . "/Entities/User.php");
class UserManager
{
    private $Connection = Null;

    private function getConnection()
    {
        if (is_null($this->Connection)) {
            $this->Connection = mysqli_connect('localhost', 'root', '', 'ia_data');
            // Vérifier l'ouverture de la connexion avec la base de données
            if (!$this->Connection) {
                $message = 'Erreur de connexion: ' . mysqli_connect_error();
                throw new Exception($message);
            }
        }
        return $this->Connection;
    }


    public function Registration($user)
    {
        $First_Name = $user->getFirst_Name();
        $Last_Name = $user->getLast_Name();
        $Mail = $user->getEmail();
        $Password = $this->generateHashedPassword($user->getPassword());
        $role = $this->setRole();
        // requête SQL
        $sql = "INSERT INTO `users`(`First_name`, `Last_name`, `E_mail`, `Password`, `Role`) VALUES ('$First_Name','$Last_Name','$Mail','$Password','$role')";
        mysqli_query($this->getConnection(), $sql);
    }

    private function setRole()
    {
        $role = false;
        return $role;
    }
    public function generateHashedPassword($password)
    {
        // Generate the hashed password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        // Return the hashed password
        return $hashed_password;
    }

    public function Login($user)
    {
        $Email = $user->getEmail();
        $Password = $user->getPassword();
        // Perform password verification
        $resulte = $this->verifyPassword($Email, $Password);
        if ($resulte) {
            return $resulte;
        } else {
            return false;
        }
    }
    private function verifyPassword($email, $password)
    {
        $sql = "SELECT * FROM `users` WHERE `E_mail` = '$email'";
        $result = mysqli_query($this->getConnection(), $sql);
        $user = mysqli_fetch_assoc($result);
        // Perform password verification using password_verify()
        $verify = password_verify($password, $user['Password']);
        var_dump($verify);
        if ($verify) {
            return $user;
        } else {
            return false;
        }
    }

    public function pages($items, $pagesNum, $itemsPerPage)
    {
        $pages = array();
        $totalItems = count($items);
        for ($i = 0; $i < $pagesNum; $i++) {
            if (($i + 1) * $itemsPerPage <= $totalItems) {
                array_push($pages, array_slice($items, $i * $itemsPerPage, $itemsPerPage));
            } else {
                array_push($pages, array_slice($items, $i * $itemsPerPage));
            }
        }
        return $pages;
    }

    public function rechercherParNom($name)
    {
        $users_data = $this->searchPlansByName($name);
        // echo "<pre>";
        // var_dump($users_data);
        // echo "</pre>";
        // $users = array();
        // foreach ($users_data as $user_data) {
        //     $user = new User();
        //     $user->Set_Id($user_data['Id_User']);
        //     $user->setFirst_name($user_data['First_name']);
        //     $user->setLast_name($user_data['Last_name']);
        //     $user->setEmail($user_data['E_mail']);
        //     array_push($users, $user);
        // }
        return $users_data;
    }
    private function searchPlansByName($name)
    {
        $sql = "SELECT * FROM users LEFT JOIN inscription ON users.Id_User = inscription.Id_User LEFT JOIN plans ON inscription.Id_Plans = plans.Id_Plans WHERE First_name LIKE ? and role !=1";

        $stmt = $this->getConnection()->prepare($sql);
        $search_name = "%$name%";
        $stmt->bind_param("s", $search_name);
        $stmt->execute();
        $query = $stmt->get_result();
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    }
}

?>