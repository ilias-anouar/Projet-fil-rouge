<h1>
    <?php var_dump($IsAjaxRequest) ?>
</h1>
<table class="table table-striped projects">
    <thead>
        <tr>
            <th style="width: 2%">
                #
            </th>
            <th style="width: 20%">
                Project Name
            </th>
            <th class="text-center" style="width: 50%">
                Description
            </th>
            <th style="width: 8%" class="text-center">
                Status
            </th>
            <th style="width: 20%">
                Actions
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (empty($pages)) {
            ?>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                No Projects Found!
            </div>
            <?php
        } else {
            $projects = $pages[$currentPage - 1];
            foreach ($projects as $result) {
                ?>
                <tr>
                    <td>
                        <?= $result->getId() ?>
                    </td>
                    <td>
                        <a>
                            <?= $result->getName() ?>
                        </a>
                    </td>
                    <td>
                        <?= $result->getDescription() ?>
                    </td>
                    <td class="project-state">
                        <span class="badge badge-success">Success</span>
                    </td>
                    <td class="project-actions">
                        <a class="btn btn-primary btn-sm" href="../tasks/index.php?id=<?= $result->getId() ?>">
                            <i class="fas fa-folder"></i>
                            View
                        </a>
                        <a class="btn btn-info btn-sm" href="editer.php?id=<?= $result->getId() ?>">
                            <i class="fas fa-pencil-alt"></i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="supprimer.php?id=<?= $result->getId() ?>">
                            <i class="fas fa-trash"></i>
                            Delete
                        </a>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>
<div class="mt-3 d-flex justify-content-center align-items-center">
    <div class="dataTables_paginate paging_simple_numbers" id="paginate">
        <ul class="pagination">
            <?php
            if (isset($pagesNum)) {
                for ($i = 0; $i < $pagesNum; $i++) {
                    if ($currentPage == $i + 1) {
                        ?>
                        <li class="page-item active">
                            <a class="page-link" data-page="<?= $i + 1 ?>" href="#">
                                <?= $i + 1 ?>
                            </a>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li class="page-item ">
                            <a class="page-link" data-page="<?= $i + 1 ?>" href="#">
                                <?= $i + 1 ?>
                            </a>
                        </li>
                        <?php
                    }
                }
            }
            ?>
        </ul>
    </div>
</div>