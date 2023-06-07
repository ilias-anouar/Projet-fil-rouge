<?php

require_once(__ROOT__ . '/Entity/Project.php');
class GestionProjects
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

    public function pages($items, $pagesNum, $itemsPerPage)
    {
        $pages = array();
        for ($i = 0; $i < $pagesNum; $i++) {
            array_push($pages, array_slice($items, $i * $itemsPerPage, ($i + 1) * $itemsPerPage));
        }
        return $pages;
    }

    public function Page_num()
    {
        $pagesNum = 0;
        $page = 'SELECT * FROM projects';
        $Projects_lentgh = mysqli_query($this->getConnection(), $page)->num_rows;
        if (($Projects_lentgh % 6) == 0) {
            $pagesNum = $Projects_lentgh / 6;
        } else {
            $pagesNum = ceil($Projects_lentgh / 6);
        }
        return $pagesNum;
    }

    public function Ajouter($project)
    {
        $Name = $project->getName();
        $Description = $project->getDescription();
        // requête SQL
        $sql = "INSERT INTO `projects`(`name`, `description`) VALUES ('$Name','$Description')";
        mysqli_query($this->getConnection(), $sql);
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

    public function RechercherParId($id)
    {
        $sql = "SELECT * FROM projects WHERE Id= $id";
        $result = mysqli_query($this->getConnection(), $sql);
        // Récupère une ligne de résultat sous forme de tableau associatif
        $project_data = mysqli_fetch_assoc($result);
        $project = new Project();
        $project->setId($project_data['Id']);
        $project->setName($project_data['name']);
        $project->setDescription($project_data['description']);
        return $project;
    }

    public function rechercherParNom($name)
    {
        $projects_data = $this->searchProjectsByName($name);
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
    private function searchProjectsByName($name)
    {
        $sql = "SELECT * FROM projects WHERE name LIKE ?";
        $stmt = $this->getConnection()->prepare($sql);
        $search_name = "%$name%";
        $stmt->bind_param("s", $search_name);
        $stmt->execute();
        $query = $stmt->get_result();
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    }

    public function Supprimer($id)
    {
        $sql = "DELETE FROM projects WHERE Id= '$id'";
        mysqli_query($this->getConnection(), $sql);
    }

    public function Modifier($id, $name, $description)
    {
        // Requête SQL
        $sql = "UPDATE projects SET 
        name='$name', description='$description'
        WHERE Id= $id";
        //  
        mysqli_query($this->getConnection(), $sql);
        //
        if (mysqli_error($this->getConnection())) {
            $msg = 'Erreur' . mysqli_errno($this->getConnection());
            throw new Exception($msg);
        }
    }
}
?>