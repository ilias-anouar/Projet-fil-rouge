<?php
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
        for ($i = 0; $i < $pagesNum; $i++) {
            array_push($pages, array_slice($items, $i * $itemsPerPage, ($i + 1) * $itemsPerPage));
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

    public function RechercherTous($sql)
    {
        // $sql = 'SELECT Id, name, description FROM projects';
        $query = mysqli_query($this->getConnection(), $sql);
        $projects_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $projects = array();
        foreach ($projects_data as $project_data) {
            $project = new Project();
            $project->setId($project_data['Id']);
            $project->setName($project_data['name']);
            $project->setDescription($project_data['description']);
            array_push($projects, $project);
        }
        return $projects;
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
}
?>