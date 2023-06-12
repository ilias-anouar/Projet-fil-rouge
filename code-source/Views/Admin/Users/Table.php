<?php
if (empty($pages)) {
    ?>
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
        No User Found!
    </div>
    <?php
} else {
    ?>
    <table class="table table-striped projects">
        <thead>
            <tr>
                <th style="width: 2%">
                    Id
                </th>
                <th style="width: 20%">
                    Full name
                </th>
                <th class="text-center" style="width: 50%">
                    Email
                </th>
                <th style="width: 20%">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $users = $pages[$currentPage - 1];
            foreach ($users as $user) {
                ?>
                <tr>
                    <td>
                        <?= $user->Get_Id() ?>
                    </td>
                    <td>
                        <a>
                            <?= $user->getFirst_Name() ?>
                            <?= $user->getLast_Name() ?>
                        </a>
                    </td>
                    <td>
                        <?= $user->getEmail() ?>
                    </td>
                    <td class="project-actions">
                        <a class="btn btn-primary btn-sm"
                            href="mailto:<?= $user->getEmail() ?>?subject=Mail from our 'IA FITNESS TRACKER'&body=Some body text here">
                            Send Email <i class="fa fa-envelope"></i>
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