<?php
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once( __ROOT__."/Managers/GestionProject.php");

$project = new GestionProjects();
if (isset($_GET['pageId'])) {
    $currentPage = $_GET['pageId'];
} else {
    $currentPage = 1;
}

// Retrieve the total number of pages
$pages = $project->Page_num();

// Get results for the current page
$results = $project->Pagination($currentPage);

if (empty($results)) {
    echo '<p>Item not found.</p>';
} else {
    $total = array();

    foreach ($results as $result) {
        $response = array(
            "card" => '
                <tr>
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
            "pagination" => ''
        );

        array_push($total, $response);
    }

    // Generate pagination links as list items
    $paginationLinks = '';
    for ($i = 1; $i <= $pages; $i++) {
        $activeClass = ($i == $currentPage) ? 'active' : '';
        $paginationLinks .= '<li class="page-item ' . $activeClass . '"><a class="page-link" href="#" data-page="' . $i . '">' . $i . '</a></li>';
    }

    // Append the pagination links to the response
    $total[0]['pagination'] = '<ul class="pagination">' . $paginationLinks . '</ul>';

    echo json_encode($total);
}

?>