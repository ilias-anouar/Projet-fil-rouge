<?php
if (file_exists('./Entity/Project.php')) {
    // Include the file in the './Entety/' directory
    include './Entity/Project.php';
} elseif (file_exists('../Entity/Project.php')) {
    // Include the file in the '../Entety/' directory
    include '../Entity/Project.php';
} else {
    // Neither file exists, so handle the error here
    echo "Error: Project.php not found in either directory.";
}

class GestionProjet
{
    private $Connection = null;

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

    public function Add($projet)
    {
        $name = $projet->GetName();
        $description = $projet->GetDescription();
        $sql = "INSERT INTO project (name, description) values ('$name', '$description')";
        mysqli_query($this->getConnection(), $sql);
    }
    public function Update($id, $name, $description)
    {
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
    public function Delete($id)
    {
        $sql = "DELETE FROM projects WHERE Id= $id";
        mysqli_query($this->getConnection(), $sql);
    }

    public function ToutProjet()
    {
        $sql = "SELECT * FROM projects";
        $query = mysqli_query($this->getConnection(), $sql);
        $projects_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $projects = array();
        foreach ($projects_data as $Projet_data) {
            $project = new Project();
            $project->setId($Projet_data['Id']);
            $project->setName($Projet_data['name']);
            $project->setDescription($Projet_data['description']);
            array_push($projects, $project);
        }
        return $projects;
    }

    public function ProjetParId($Id)
    {
        $sql = "SELECT * FROM projects WHERE Id = $Id";
        $query = mysqli_query($this->getConnection(), $sql);
        $projects_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $project = new Project();
        $project->setId($projects_data['Id']);
        $project->setName($projects_data['name']);
        $project->setDescription($projects_data['description']);
        return $project;
    }
}



?>