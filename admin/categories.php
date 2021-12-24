<?php

session_start();
include('../config/dbcon.php');
include('../config/auth.php');
include('./header.php');
?>



<div class="container py-5">
    <h1 class="display-6">Categories</h1>
    <br>

    <?php

    include('../message/message.php')

    ?>

    <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>created_at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $get_categories = "SELECT * FROM categories";
                $get_categories_run = mysqli_query($con, $get_categories);

                if ($get_categories_run) {
                    foreach ($get_categories_run as $categories) {
                ?>
                        <tr>
                            <th><?= $categories['id']; ?></th>
                            <th><?= $categories['category_name']; ?></th>
                            <th><?= $categories['created_at']; ?></th>
                            <th>
                                <form action="../Code/categories_code.php" method="post" onSubmit="return confirm('are you sure')">
                                    <button class="btn btn-danger" name="btn-delete" value="<?= $categories['id']; ?>" type="submit">Delete</button>
                                </form>
                                <a href="../admin/update_category.php?id=<?= $categories['id']; ?>" class="btn btn-info">Edit</a>
                            </th>
                        </tr>
                    <?php   }
                } else {
                    ?>

                    <tr>
                        <th colspan="6">No Categories Found</th>
                    </tr>

                <?php
                }

                ?>


            </tbody>

        </table>

    </div>

</div>



<?php

include('./footer.php');
?>