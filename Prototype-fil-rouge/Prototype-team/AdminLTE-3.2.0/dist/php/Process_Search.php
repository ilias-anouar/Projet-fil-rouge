<?php
// include "../Managers/GestionProject.php";
// $project = new GestionProjects();
// $name = $_POST['value'];
// $results = $project->RechercherParNom($name);
// if (!$results) {
//     echo '<p>Item not found.</p>';
// } else {
//     $total = array();
//     foreach ($results as $result) {
//         $response = array(
//             "details" =>
//             '<h5 class="card-title text-black">Id : ' . $results['Id'] . '</h5>'
//             . '<p class="card-text text-black">name : ' . $results['name'] . '</p>'
//             . '<p class="card-text text-black">description : ' . $results['description'] . '</p>',
//         );
//         array_push($total, $response);
//     }
//     echo json_encode($total);
// }

include "../Managers/GestionProject.php";

$project = new GestionProjects();
$name = $_POST['value'];
$results = $project->RechercherParNom($name);
// $results = $project->RechercherParId($name);

if (empty($results)) {
    echo '<p>Item not found.</p>';
} else {
    $total = array();
    foreach ($results as $result) {
        // $response = array(
        //     "card" =>
        //     '<h5 class="card-title text-black">Id : ' . $result->getId() . '</h5>'
        //     . '<p class="card-text text-black">name : ' . $result->getName() . '</p>'
        //     . '<p class="card-text text-black">description : ' . $result->getDescription() . '</p>',
        // );
        $response = array(
            "card" =>
            '<div class="col card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">' . $result->getName() . '</h3>
            <div class="card-tools">
                <span class="badge badge-primary">' . $result->getId() . '</span>
            </div>
        </div>
        <div class="card-body">' . $result->getDescription() . '</div>
        <div class="card-footer">' . $result->getName() . '</div>
    </div>',
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