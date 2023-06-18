<?php
if (empty($pages)) {
    ?>
    <div class="alert alert-warning mt-3">
        <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> -->
        <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
        No Plans Found!
    </div>
    <?php
} else {
    ?>
    <div class="row">
        <?php
        $Plans = $pages[$currentPage - 1];
        foreach ($Plans as $Plan) {
            ?>
            <div class="col-md-6 col-lg-4 column">
                <div class="card style gr-1">
                    <div class="txt">
                        <h1>
                            <?= $Plan->getName() ?>
                        </h1>
                        <p>
                            <?= $Plan->getDescription() ?>
                        </p>
                    </div>
                    <div class="d-flex justify-content-evenly">
                        <a href="index.php?Id_plan=<?= $Plan->Get_Id() ?>" class="btn btn-outline-info">Select</a>
                    </div>
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