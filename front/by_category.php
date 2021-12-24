<?php

include('../config/dbcon.php');
include('../front/layouts/header.php');
?>



<div class="container">
    <br>
    <?php

    include('../message/message.php')

    ?>
    <div class="container">
        <div align="center">
            <h1 class="display-5"> Results Found </h1>
            <hr style="width:30%;height:3px;">
        </div>
        <br>
        <div class="row row-cols-1 row-cols-md-3">
            <?php

            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                $get_by_categories = "SELECT * FROM post WHERE category_id='$id' ORDER BY id desc LIMIT 12";
                $get_by_categories_run = mysqli_query($con, $get_by_categories);

                if (mysqli_num_rows($get_by_categories_run) > 0) {
                    foreach ($get_by_categories_run as $category) {
            ?>
                        <div class="col mb-4">
                            <a href="../front/details.php?id=<?= $category['id'] ?>">
                                <img src="../uploads/<?= $category['image']; ?>" style="width:100%;height:250px;" />
                                <br>
                                <h5><?= $category['description']; ?></h5>
                                <h6><?= $category['created_at']; ?></h6>
                            </a>
                        </div>
                    <?php  }
                } else {
                    ?>
                    <h3 class="display-5">No Posts Found</h3>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <br>
    <br>
</div>

<?php

include('../front/layouts/footer.php');

include('../front/layouts/scripts.php');

?>