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

    public function getChartData()
    {
        $sql = "SELECT plans.Plan_name, COUNT(inscription.Id_Inscription) AS num_inscriptions
        FROM plans
        LEFT JOIN inscription ON plans.Id_Plans = inscription.Id_Plans
        GROUP BY plans.Id_Plans";
        $result = mysqli_query($this->getConnection(), $sql);

        $data = [];
        $labels = [];

        // Process the query result
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $labels[] = $row["Plan_name"];
                $data[] = (int) $row["num_inscriptions"];
            }
        }

        // Prepare the response as JSON
        $response = [
            'labels' => $labels,
            'data' => $data,
        ];

        return $response;
    }


    public function getPlanData()
    {
        $totalSql = "SELECT COUNT(*) AS total_inscriptions FROM inscription";
        $totalResult = mysqli_query($this->getConnection(), $totalSql);
        $totalRow = mysqli_fetch_assoc($totalResult);
        $totalInscriptions = $totalRow['total_inscriptions'];

        $sql = "SELECT plans.Plan_name, COUNT(inscription.Id_Inscription) AS num_inscriptions
            FROM plans
            LEFT JOIN inscription ON plans.Id_Plans = inscription.Id_Plans
            GROUP BY plans.Id_Plans
            ORDER BY num_inscriptions DESC";
        $result = mysqli_query($this->getConnection(), $sql);

        $data = [];

        // Process the query result
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $percentage = ($row["num_inscriptions"] / $totalInscriptions) * 100;

                $data[] = [
                    'Plan_name' => $row['Plan_name'],
                    'num_inscriptions' => (int) $row['num_inscriptions'],
                    'percentage' => round($percentage, 2),
                    'totalInscriptions' => $totalInscriptions
                ];
            }
        }

        return $data;
    }


}


?>