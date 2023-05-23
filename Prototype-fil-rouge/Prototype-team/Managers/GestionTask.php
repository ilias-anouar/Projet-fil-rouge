<?php
// include "Task.php";
// if (file_exists('./Entity/Task.php')) {
//     // Include the file in the './Entety/' directory
//     include './Entity/Task.php';
// } elseif (file_exists('../Entity/Task.php')) {
//     // Include the file in the '../Entety/' directory
//     include '../Entity/Task.php';
// } else {
//     // Neither file exists, so handle the error here
//     echo "Error: Task.php not found in either directory.";
// }
require_once(__ROOT__ . '/Entity/Task.php');
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

    public function RechercherTous($Id)
    {
        $sql = "SELECT Id, name, description FROM tasks WHERE Id_Project = '$Id'";
        $query = mysqli_query($this->getConnection(), $sql);
        $tasks_data = mysqli_fetch_all($query, MYSQLI_ASSOC);

        $tasks = array();
        foreach ($tasks_data as $task_data) {
            $task = new Task();
            $task->setId($task_data['Id']);
            $task->setName($task_data['name']);
            $task->setDescription($task_data['description']);
            array_push($tasks, $task);
        }
        return $tasks;
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