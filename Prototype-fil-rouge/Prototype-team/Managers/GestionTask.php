<?php
require_once(__ROOT__ . '/Entity/Task.php');
require_once(__ROOT__ . '/Entity/Project.php');

class GestionTasks
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

    public function Ajouter($task)
    {
        $Id = $task->getId();
        $Name = $task->getName();
        $Description = $task->getDescription();
        // requête SQL
        $sql = "INSERT INTO `tasks`(`name`, `description`, `Id_Project`) VALUES ('$Name','$Description', '$Id')";
        mysqli_query($this->getConnection(), $sql);
    }

    public function pages($items, $pagesNum, $itemsPerPage)
    {
        $pages = array();
        for ($i = 0; $i < $pagesNum; $i++) {
            array_push($pages, array_slice($items, $i * $itemsPerPage, ($i + 1) * $itemsPerPage));
        }
        return $pages;
    }
    public function RechercherTous($id)
    {
        $tasks = "SELECT Id, name, description FROM tasks WHERE Id_Project = '$id'";
        $projects = "SELECT * FROM projects";
        $tasks = mysqli_query($this->getConnection(), $tasks);
        $projects = mysqli_query($this->getConnection(), $projects);
        $tasks_data = mysqli_fetch_all($tasks, MYSQLI_ASSOC);
        $projects_data = mysqli_fetch_all($projects, MYSQLI_ASSOC);
        $tasks = array();
        $projects = array();
        $result = array();
        foreach ($tasks_data as $task_data) {
            $task = new Task();
            $task->setId($task_data['Id']);
            $task->setName($task_data['name']);
            $task->setDescription($task_data['description']);
            array_push($tasks, $task);
        }
        foreach ($projects_data as $project_data) {
            $project = new Project();
            $project->setId($project_data['Id']);
            $project->setName($project_data['name']);
            $project->setDescription($project_data['description']);
            array_push($projects, $project);
        }
        $result = [$projects, $tasks];
        return $result;
    }

    public function RechercherParId($id)
    {
        $sql = "SELECT * FROM tasks WHERE Id= '$id'";
        $result = mysqli_query($this->getConnection(), $sql);
        // Récupère une ligne de résultat sous forme de tableau associatif
        $Task_data = mysqli_fetch_assoc($result);
        $task = new Task();
        $task->setId($Task_data['Id']);
        $task->setName($Task_data['name']);
        $task->setDescription($Task_data['description']);
        return $task;
    }

    public function Supprimer($id)
    {
        $sql = "DELETE FROM tasks WHERE Id= '$id'";
        mysqli_query($this->getConnection(), $sql);
    }

    public function Modifier($id, $name, $description)
    {
        // Requête SQL
        $sql = "UPDATE tasks SET 
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