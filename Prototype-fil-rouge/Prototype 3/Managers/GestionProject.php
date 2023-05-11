<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/Entity/Project.php');

// include 'Project.php';
// if (file_exists('./Entity/Project.php')) {
//     // Include the file in the './Entety/' directory
//     include './Entity/Project.php';
// } elseif (file_exists('../Entity/Project.php')) {
//     // Include the file in the '../Entety/' directory
//     include '../Entity/Project.php';
// } else {
//     // Neither file exists, so handle the error here
//     echo "Error: Project.php not found in either directory.";
// }
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

    public function Ajouter($project)
    {
        $Name = $project->getName();
        $Description = $project->getDescription();
        // requête SQL
        $sql = "INSERT INTO `projects`(`name`, `description`) VALUES ('$Name','$Description')";
        mysqli_query($this->getConnection(), $sql);
    }

    public function RechercherTous()
    {
        $sql = 'SELECT Id, name, description FROM projects';
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