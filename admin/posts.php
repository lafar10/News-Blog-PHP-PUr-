<?php

session_start();
include('../config/dbcon.php');
include('../config/auth.php');
include('./header.php');
?>



<div class="container py-5">
    <h1 class="display-6">Posts</h1>
    <br>

    <?php

    include('../message/message.php')

    ?>

    <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category_id</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Meta_Title</th>
                    <th>Meta_Description</th>
                    <th>Meta_Conclusion</th>
                    <th>created_at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $get_posts = "SELECT * FROM post";
                $get_posts_run = mysqli_query($con, $get_posts);

                if ($get_posts_run) {
                    foreach ($get_posts_run as $post) {
                ?>
                        <tr>
                            <th><?= $post['id']; ?></th>
                            <th><?= $post['category_id']; ?></th>
                            <th><?= $post['name']; ?></th>
                            <th><img src="../uploads/<?= $post['image']; ?>" /></th>
                            <th><?= $post['meta_title']; ?></th>
                            <th><?= $post['meta_description']; ?></th>
                            <th><?= $post['meta_keyword']; ?></th>
                            <th><?= $post['created_at']; ?></th>
                            <th>
                                <form action="../Code/posts_code.php" method="post" onSubmit="return confirm('are you sure')">
                                    <button class="btn btn-danger" name="delete_btn" value="<?= $post['id']; ?>" type="submit">Delete</button>
                                </form>
                                <a href="../admin/post_update.php?id=<?= $post['id']; ?>" class="btn btn-info">Edit</a>
                            </th>
                        </tr>
                    <?php   }
                } else {
                    ?>

                    <tr>
                        <th colspan="6">No Posts Found</th>
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