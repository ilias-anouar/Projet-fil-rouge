<?php
include "../../Views/Layout/root.php";
include_once(__ROOT__ . "/Entities/Measure.php");
class MeasureManager
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

    public function add($Measures)
    {
        
        // requête SQL
        $sql = "";
        mysqli_query($this->getConnection(), $sql);
    }

  

}