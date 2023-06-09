<?php

class Manager
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

    // plans number
    public function getPlansNumber()
    {
        $query = "SELECT COUNT(*) FROM plans";
        $result = mysqli_query($this->getConnection(), $query);
        if (!$result) {
            $message = 'Erreur de requête: ' . mysqli_error($this->getConnection());
            throw new Exception($message);
        }
        $row = mysqli_fetch_row($result);
        return $row[0];
    }

    // users number not admin
    public function getUsersNumber()
    {
        $sql = "SELECT COUNT(*) as nbUsers FROM users WHERE role != 1";
        $result = mysqli_query($this->getConnection(), $sql);
        if (!$result) {
            $message = 'Erreur de requête: ' . mysqli_error($this->getConnection());
            throw new Exception($message);
        }
        $row = mysqli_fetch_assoc($result);
        return $row['nbUsers'];
    }

    public function getMembersNumber()
    {
        $sql = "SELECT COUNT(*) as nbMember FROM `inscription`";
        $result = mysqli_query($this->getConnection(), $sql);
        if (!$result) {
            $message = 'Erreur de requête: ' . mysqli_error($this->getConnection());
            throw new Exception($message);
        }
        $row = mysqli_fetch_assoc($result);
        return $row['nbMember'];
    }
}


?>