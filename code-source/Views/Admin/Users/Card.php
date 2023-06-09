<?php
var_dump($IsAjaxRequest);
if (empty($pages)) {
    ?>
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
        No Plans Found!
    </div>
    <?php
} else {
    ?>
    <div class="d-flex flex-wrap justify-content-around">
        <?php
        $users = $pages[$currentPage - 1];
        foreach ($users as $user) {
            ?>
            <div class="user">
                <div class="user-preview">
                    <h6>User</h6>
                    <p>
                        <?= $user['First_name'] ?>
                        <?= $user['Last_name'] ?>
                    </p>
                    <a href="#">View all chapters <i class="fas fa-chevron-right"></i></a>
                </div>
                <div class="user-info">
                    <div class="progress-container">
                        <div class="progress"></div>
                    </div>
                    <p>
                        <?php
                        if ($user['Plan_name'] != null) {
                            echo $user['Plan_name'];
                        } else {
                            echo "No inscription";
                        }
                        ?>
                    </p>
                    <button class="button">Progress</button>
                </div>
            </div>
            <?php
        }
}
?>
</div>

<?php
if (isset($pagesNum)) {
    ?>
    <div class="mt-3 d-flex justify-content-center align-items-center">
        <div class="dataTables_paginate paging_simple_numbers" id="paginate">
            <ul class="pagination">
                <?php
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
                ?>
            </ul>
        </div>
    </div>
    <?php
}
?>