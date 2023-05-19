<?php
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__ . '/Managers/GestionProject.php');

$project = new GestionProjects();
$name = $_POST['value'];
$results = $project->RechercherParNom($name);
// $results = $project->RechercherParId($name);

if (empty($results)) {
    echo '<p>Item not found.</p>';
} else {
    $total = array();
    foreach ($results as $result) {
        $response = array(
            "card" =>
            '<tr>
                    <td>' . $result->getId() . '</td>
                    <td>
                        <a>' . $result->getName() . '</a>
                        <br>
                        <small>Created 01.01.2019</small>
                    </td>
                    <td>' . $result->getDescription() . '</td>
                    <td class="project-state">
                        <span class="badge badge-success">Success</span>
                    </td>
                    <td class="project-actions">
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-folder"></i>
                            View
                        </a>
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt"></i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                            <i class="fas fa-trash"></i>
                            Delete
                        </a>
                    </td>
                </tr>',
        );
        array_push($total, $response);
    }
    echo json_encode($total);
}
// if (empty($results)) {
//     echo '<p>Item not found.</p>';
// } else {
//     $response = array(
//         "details" =>
//         '<h5 class="card-title text-black">Id : ' . $results->getId() . '</h5>'
//         . '<p class="card-text text-black">name : ' . $results->getName() . '</p>'
//         . '<p class="card-text text-black">description : ' . $results->getDescription() . '</p>',
//     );
//     echo json_encode($response);
// }
?>