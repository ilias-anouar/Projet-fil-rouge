<?php
use MyNamespace\Entities\Plan\Plan;
include_once(__ROOT__ . "/Entities/Plan.php");

class PlanManager
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
        $plans_data = $this->searchPlansByName($name);
        $plans = array();
        foreach ($plans_data as $plan_data) {
            $plan = new Plan();
            $plan->Set_Id($plan_data['Id_Plans']);
            $plan->setName($plan_data['Plan_name']);
            $plan->setDescription($plan_data['Description']);
            array_push($plans, $plan);
        }
        return $plans;
    }
    private function searchPlansByName($name)
    {
        $sql = "SELECT * FROM `plans` WHERE Plan_name LIKE ?";
        $stmt = $this->getConnection()->prepare($sql);
        $search_name = "%$name%";
        $stmt->bind_param("s", $search_name);
        $stmt->execute();
        $query = $stmt->get_result();
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    }

    // add plan
    public function addPlan($plan)
    {
        $sql = "INSERT INTO `plans` (`Plan_name`, `Description`) VALUES (?, ?)";
        $name = $plan->getName();
        $Description = $plan->getDescription();
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bind_param("ss", $name, $Description);
        $stmt->execute();
        $stmt->close();
    }

    // delete plan
    public function deletePlan($id)
    {
        $sql = "DELETE FROM `plans` WHERE Id_Plans = ?";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
    // edit plan
    public function editPlan($plan)
    {
        $sql = "UPDATE `plans` SET `Plan_name` = ?, `Description` = ? WHERE Id_Plans = ?";
        $name = $plan->getName();
        $Description = $plan->getDescription();
        $id = $plan->Get_Id();
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bind_param("ssi", $name, $Description, $id);
        $stmt->execute();
        $stmt->close();
    }

    // get plan by id
    public function getPlanById($id)
    {
        $sql = "SELECT * FROM `plans` WHERE Id_Plans = ?";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $data = mysqli_fetch_assoc($result);
        $plan = new Plan();
        $plan->set_Id($data['Id_Plans']);
        $plan->setName($data['Plan_name']);
        $plan->setDescription($data['Description']);
        return $plan;
    }

}
?>