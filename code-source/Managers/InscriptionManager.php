<?php
// include "../../Views/Layout/root.php";
include_once(__ROOT__ . "/Entities/Inscription.php");

class InscriptionManager
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

    // add inscription
    public function addInscription($planId, $userId)
    {
        $inscriptionDate = date('Y-m-d');
        $sql = "INSERT INTO inscription (Inscription_Date, Id_Plans, Id_User) VALUES (?, ?, ?)";
        $stmt = $this->getConnection()->prepare($sql);
        // $stmt->bind_param("sii", $inscriptionDate, $planId, $userId);
        echo "<per>";
        var_dump($stmt);
        echo "</per>";
        echo "<per>";
        var_dump($stmt->bind_param("sii", $inscriptionDate, $planId, $userId));
        echo "</per>";
        echo "<per>";
        var_dump($userId);
        echo "</per>";
        echo "<per>";
        var_dump($stmt->execute());
        echo "</per>";
        $stmt->execute();
        $stmt->close();
        $id_sql = "SELECT Id_Inscription FROM inscription WHERE Id_User = ?";
        $stmt = $this->getConnection()->prepare($id_sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $query = $stmt->get_result();
        $Id_Inscription = mysqli_fetch_assoc($query);
        return $Id_Inscription;
    }

    public function AllInscriptedUserByName($name)
    {
        $sql = "SELECT * FROM users JOIN inscription ON users.Id_User = inscription.Id_User LEFT JOIN plans ON inscription.Id_Plans = plans.Id_Plans WHERE First_name LIKE ? and role !=1";

        $stmt = $this->getConnection()->prepare($sql);
        $search_name = "%$name%";
        $stmt->bind_param("s", $search_name);
        $stmt->execute();
        $query = $stmt->get_result();
        $users_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $users_data;
    }

    public function CreatPages($items, $pagesNum, $itemsPerPage)
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

    public function checkUserInscription($userId)
    {
        $sql = "SELECT COUNT(*) as inscriptionCount FROM inscription WHERE Id_User = ?";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->bind_result($inscriptionCount);
        $stmt->fetch();
        $stmt->close();
        return $inscriptionCount > 0;
    }

    public function checkMeasuresExist($inscriptionId)
    {
        $connection = $this->getConnection();

        $sql = "SELECT COUNT(*) as measureCount FROM Measures WHERE Id_Inscription = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $inscriptionId);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $measureCount = $row['measureCount'];

        $stmt->close();

        return $measureCount > 0;
    }


}

?>