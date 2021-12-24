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
    <?php if (isset($_GET['id'])) {
        $post_id = $_GET['id'];

        $update_post = "SELECT * FROM post WHERE id='$post_id' LIMIT 1";
        $update_post_run = mysqli_query($con, $update_post);

        if ($update_post_run) {
            foreach ($update_post_run as $post) { ?>
                <form action="../Code/posts_code.php" method="POST">
                    <div class="row g-2">
                        <input class="hidden" value="<?= $post['id']; ?>" name="post_id" />
                        <div class="col-lg-6">
                            <label>name</label>
                            <input type="text" name="name" value="<?= $post['name']; ?>" class="form-control" required />
                        </div>
                        <div class="col-lg-6">
                            <label>Title</label>
                            <input type="text" name="description" value="<?= $post['description']; ?>" class="form-control" required />
                        </div>
                        <div class="col-lg-6">
                            <label>Image</label>
                            <input type="file" name="image" value="<?= $post['image']; ?>" class="form-control" required />
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
                                        <option value="<?= $category['id'] ?>" <?= $category['id'] == $post['category_id'] ? 'selected' : '' ?>><?= $category['category_name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            <?php
                            } else {
                            ?>
                                <select>
                                    <option>-- Empty --</option>
                                </select>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-lg-12">
                            <label>Introduction</label>
                            <textarea rows="5" name="meta_title" class="form-control" required><?= $post['meta_title']; ?></textarea>
                        </div>
                        <div class="col-lg-12">
                            <label>Show</label>
                            <textarea rows="10" name="meta_description" class="form-control" required><?= $post['meta_description']; ?></textarea>
                        </div>
                        <div class="col-lg-12">
                            <label>Introduction</label>
                            <textarea rows="5" name="meta_keyword" class="form-control" required><?= $post['meta_keyword']; ?></textarea>
                        </div>
                        <div class="group mb-3">
                            <button class="btn btn-success" name="post_update_btn" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            <?php }
        } else { ?>
            <h1>Not Fount</h1>
    <?php
        }
    }
    ?>

</div>


<?php

include('./footer.php');
?>