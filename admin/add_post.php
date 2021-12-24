<?php

include('../config/dbcon.php');
include('../config/auth.php');
include('./header.php');
?>



<div class="container py-5">
    <h1 class="display-6">Add Post</h1>
    <br>
    <?php

    include('../message/message.php')

    ?>
    <form action="../Code/posts_code.php" method="POST" enctype="multipart/form-data">
        <div class="row g-2">
            <div class="col-lg-6">
                <label>name</label>
                <input type="text" name="name" class="form-control" required />
            </div>
            <div class="col-lg-6">
                <label>Title</label>
                <input type="text" name="description" class="form-control" required />
            </div>
            <div class="col-lg-6">
                <label>Image</label>
                <input type="file" name="image" class="form-control" required />
            </div>
            <div class="col-lg-6">
                <label>Category Name</label>
                <?php
                $get_categories = "SELECT * FROM categories";
                $get_categories_run = mysqli_query($con, $get_categories);

                if ($get_categories_run) {
                ?>
                    <select name="category_id" class="form-control" required>
                        <?php foreach ($get_categories_run as $category) {
                        ?>
                            <option value="<?= $category['id']; ?>"><?= $category['category_name']; ?></option>
                        <?php       }
                        ?>
                    </select>
                <?php
                }
                ?>
            </div>
            <div class="col-lg-12">
                <label>Introduction</label>
                <textarea rows="5" name="meta_title" class="form-control" required></textarea>
            </div>
            <div class="col-lg-12">
                <label>Show</label>
                <textarea rows="10" name="meta_description" class="form-control" required></textarea>
            </div>
            <div class="col-lg-12">
                <label>Introduction</label>
                <textarea rows="5" name="meta_keyword" class="form-control" required></textarea>
            </div>
            <div class="group mb-3">
                <button class="btn btn-success" name="post_sub_btn" type="submit">Submit</button>
            </div>
        </div>
    </form>
</div>


<?php

include('./footer.php');
?>