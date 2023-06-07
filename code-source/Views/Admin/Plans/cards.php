<h2 class="text-center">Availiable plans</h2>
<div class="row p-3">
    <div class="col-sm-12 col-md-6">
        <a class="btn  bg-orange" href="add.php">Add Plan</a>
    </div>
    <div class="col-sm-12 col-md-6">
        <div id="search_plan" class="dataTables_filter"><input type="search" id="search" class="form-control"
                placeholder="Plan name" aria-controls="search_plan">
        </div>
    </div>
</div>
<?php
if (empty($pages)) {
    ?>
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
        No Plans Found!
    </div>
    <div class="row">
        <?php
} else {
    $Plans = $pages[$currentPage - 1];
    foreach ($Plans as $Plan) {
        ?>

            <div class="col-md-6 col-lg-4 column">
                <div class="card style gr-1">
                    <div class="txt">
                        <h1>BRANDING AND </br>
                            CORPORATE DESIGN</h1>
                        <p>Visual communication and problem-solving</p>
                    </div>
                    <a href="#" class="text-info">more</a>
                    <a href="#" class="text-danger">delet</a>
                    <a href="#">edite</a>
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

                    </ul>
                </div>
            </div>
            <?php
                    }
                }
}
?>