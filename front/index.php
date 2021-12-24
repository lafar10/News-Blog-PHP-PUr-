<?php

session_start();
include('../config/dbcon.php');
include('../front/layouts/header.php');
?>



<div class="container">
    <br>
    <?php

    include('../message/message.php')

    ?>
    <div class="card border-0">
        <div class="card-body">
            <div class="row g-2">
                <div class="col-md-7">
                    <?php
                    $get_first_post = "SELECT * FROM post ORDER BY id DESC LIMIT 1";
                    $get_first_post_run = mysqli_query($con, $get_first_post);

                    if (mysqli_num_rows($get_first_post_run) > 0) {
                        foreach ($get_first_post_run as $post) {
                    ?>

                            <a href="../front/details.php?id=<?= $post['id'] ?>">
                                <img src="../uploads/<?= $post['image']; ?>" style="width:100%;height:280px;" />
                                <br>
                                <h5><?= $post['description']; ?></h5>
                                <h6><?= $post['created_at']; ?></h6>
                                <p>
                                    <?= $post['meta_title']; ?>
                                </p>
                            </a>
                        <?php  }
                    } else {
                        ?>
                        <h3 class="display-5">No Posts Found</h3>
                    <?php
                    } ?>

                </div>
                <div class="col-lg-5">
                    <?php
                    $get_first_post = "SELECT * FROM post ORDER BY id desc LIMIT 2";
                    $get_first_post_run = mysqli_query($con, $get_first_post);

                    if (mysqli_num_rows($get_first_post_run) > 0) {
                        foreach ($get_first_post_run as $post) {
                    ?>
                            <div class="col-lg-12">
                                <a href="../front/details.php?id=<?= $post['id'] ?>">
                                    <img src="../uploads/<?= $post['image']; ?>" style="width:100%;height:150px;" />
                                    <h3 class="display-8"><?= $post['description']; ?></h3>
                                    <h6><?= $post['created_at']; ?></h6>

                                </a>
                            </div>

                        <?php  }
                    } else {
                        ?>
                        <h3 class="display-5">No Posts Found</h3>
                    <?php
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="col-lg-4">
            <h1 class="display-5"> Latest New's </h1>
            <hr style="width:60%;height:3px;">
        </div>
        <br>
        <br>
        <div class="row row-cols-1 row-cols-md-3">
            <?php
            $get_post = "SELECT * FROM post ORDER BY id DESC LIMIT 6";
            $get_post_run = mysqli_query($con, $get_post);

            if (mysqli_num_rows($get_post_run) > 0) {
                foreach ($get_post_run as $post) {
            ?>
                    <div class="col mb-4">
                        <a href="../front/details.php?id=<?= $post['id'] ?>">
                            <img src="../uploads/<?= $post['image']; ?>" style="width:100%;height:250px;" />
                            <br>
                            <h5><?= $post['description']; ?></h5>
                            <h6><?= $post['created_at']; ?></h6>
                        </a>
                    </div>
                <?php  }
            } else {
                ?>
                <h3 class="display-5">No Posts Found</h3>
            <?php
            } ?>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <br>
        <br>
        <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link text-secondary active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Finance</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-secondary" id="pills-politic-tab" data-bs-toggle="pill" data-bs-target="#pills-politic" type="button" role="tab" aria-controls="pills-politic" aria-selected="false">Politic</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-secondary" id="pills-sport-tab" data-bs-toggle="pill" data-bs-target="#pills-sport" type="button" role="tab" aria-controls="pills-sport" aria-selected="false">Sport</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-secondary" id="pills-culture-tab" data-bs-toggle="pill" data-bs-target="#pills-culture" type="button" role="tab" aria-controls="pills-culture" aria-selected="false">Culture</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-secondary" id="pills-art-tab" data-bs-toggle="pill" data-bs-target="#pills-art" type="button" role="tab" aria-controls="pills-art" aria-selected="false">Art</button>
            </li>
        </ul>
        <div class="tab-content show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="row row-cols-1 row-cols-md-3">
                <?php
                $get_finance = "SELECT * FROM post WHERE category_id='11' LIMIT 6";
                $get_finance_run = mysqli_query($con, $get_finance);

                if (mysqli_num_rows($get_finance_run) > 0) {
                    foreach ($get_finance_run as $finance) {
                ?>
                        <div class="col mb-4">
                            <a href="../front/details.php?id=<?= $finance['id'] ?>">
                                <img src="../uploads/<?= $finance['image']; ?>" style="width:100%;height:250px;" />
                                <br>
                                <h5><?= $finance['description']; ?></h5>
                                <h6><?= $finance['created_at']; ?></h6>
                            </a>
                        </div>
                    <?php  }
                } else {
                    ?>
                    <h3 class="display-5">No Posts Found</h3>
                <?php
                } ?>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-politic" role="tabpanel" aria-labelledby="pills-politic-tab">
            <div class="row row-cols-1 row-cols-md-3">
                <?php
                $get_politic = "SELECT * FROM post WHERE category_id='7' LIMIT 6";
                $get_politic_run = mysqli_query($con, $get_politic);

                if (mysqli_num_rows($get_politic_run) > 0) {
                    foreach ($get_politic_run as $politic) {
                ?>
                        <div class="col mb-4">
                            <a href="../front/details.php?id=<?= $politic['id'] ?>">
                                <img src="../uploads/<?= $politic['image']; ?>" style="width:100%;height:250px;" />
                                <br>
                                <h5><?= $politic['description']; ?></h5>
                                <h6><?= $politic['created_at']; ?></h6>
                            </a>
                        </div>
                    <?php  }
                } else {
                    ?>
                    <h3 class="display-5">No Posts Found</h3>
                <?php
                } ?>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-sport" role="tabpanel" aria-labelledby="pills-sport-tab">
            <div class="row row-cols-1 row-cols-md-3">
                <?php
                $get_sport = "SELECT * FROM post WHERE category_id='8' LIMIT 6";
                $get_sport_run = mysqli_query($con, $get_sport);

                if (mysqli_num_rows($get_sport_run) > 0) {
                    foreach ($get_sport_run as $sport) {
                ?>
                        <div class="col mb-4">
                            <a href="../front/details.php?id=<?= $sport['id'] ?>">
                                <img src="../uploads/<?= $sport['image']; ?>" style="width:100%;height:250px;" />
                                <br>
                                <h5><?= $sport['description']; ?></h5>
                                <h6><?= $sport['created_at']; ?></h6>
                            </a>
                        </div>
                    <?php  }
                } else {
                    ?>
                    <h3 class="display-5">No Posts Found</h3>
                <?php
                } ?>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-culture" role="tabpanel" aria-labelledby="pills-culture-tab">
            <div class="row row-cols-1 row-cols-md-3">
                <?php
                $get_culture = "SELECT * FROM post WHERE category_id='10' LIMIT 6";
                $get_culture_run = mysqli_query($con, $get_culture);

                if (mysqli_num_rows($get_culture_run) > 0) {
                    foreach ($get_culture_run as $culture) {
                ?>
                        <div class="col mb-4">
                            <a href="../front/details.php?id=<?= $culture['id'] ?>">
                                <img src="../uploads/<?= $culture['image']; ?>" style="width:100%;height:250px;" />
                                <br>
                                <h5><?= $culture['description']; ?></h5>
                                <h6><?= $culture['created_at']; ?></h6>
                            </a>
                        </div>
                    <?php  }
                } else {
                    ?>
                    <h3 class="display-5">No Posts Found</h3>
                <?php
                } ?>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-art" role="tabpanel" aria-labelledby="pills-art-tab">
            <div class="row row-cols-1 row-cols-md-3">
                <?php
                $get_art = "SELECT * FROM post WHERE category_id='9' LIMIT 6";
                $get_art_run = mysqli_query($con, $get_art);

                if (mysqli_num_rows($get_art_run) > 0) {
                    foreach ($get_art_run as $art) {
                ?>
                        <div class="col mb-4">
                            <a href="../front/details.php?id=<?= $art['id'] ?>">
                                <img src="../uploads/<?= $art['image']; ?>" style="width:100%;height:250px;" />
                                <br>
                                <h5><?= $art['description']; ?></h5>
                                <h6><?= $art['created_at']; ?></h6>
                            </a>
                        </div>
                    <?php  }
                } else {
                    ?>
                    <h3 class="display-5">No Posts Found</h3>
                <?php
                } ?>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
</div>

<?php

include('../front/layouts/footer.php');

include('../front/layouts/scripts.php');

?>