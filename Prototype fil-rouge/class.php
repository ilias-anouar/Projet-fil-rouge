<?php

class project
{
    public $name;
    public $description;

    public function __construct($name, $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    public function addItem($name, $description, $conn, $db_name)
    {
        $sql = "INSERT INTO `$db_name`(`name`, `description`) VALUES (:name,:description)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->execute();
    }

    public function deleteProject($Id_Project, $conn)
    {
        $sql = "DELETE FROM `project` WHERE Id_Project=:Id_Project";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':Id_Project', $Id_Project);
        $stmt->execute();
    }

    public function showProjectList($conn)
    {
        $sql = "SELECT name FROM `project`";
        $names = $conn->query($sql);
        $resulte = $names->fetch(PDO::FETCH_ASSOC);
    }
}
?>