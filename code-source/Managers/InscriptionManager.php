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

}

?>