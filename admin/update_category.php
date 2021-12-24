<?php

session_start();
include('../config/dbcon.php');
include('../config/auth.php');
include('./header.php');
?>



<div class="container py-5">
    <h1 class="display-6">Update Category</h1>
    <br>

    <?php

    include('../message/message.php')

    ?>

    <div class="row">
        <?php

        if (isset($_GET['id'])) {
            $category_id = $_GET['id'];

            $category_edit = "SELECT * FROM categories WHERE id='$category_id'";
            $category_edit_run = mysqli_query($con, $category_edit);

            if (mysqli_num_rows($category_edit_run) > 0) {
                foreach ($category_edit_run as $cate) { ?>
                    <form action="../Code/categories_code.php" method="POST">
                        <input type="hidden" value="<?= $cate['id']; ?>" name="category_id" />
                        <div class="group mb-3">
                            <label>FullName</label>
                            <input type="text" name="category_name" value="<?= $cate['category_name']; ?>" class="form-control" required />
                        </div>
                        <div class="group mb-3">
                            <button class="btn btn-primary" name="update_btn" type="submit">Submit</button>
                        </div>
                    </form>
                <?php     }
            } else { ?>
                <div>
                    <h1 class="display-5">No Records Found</h1>
                </div>
        <?php        }
        }

        ?>

    </div>

</div>


<?php

include('./footer.php');
?>