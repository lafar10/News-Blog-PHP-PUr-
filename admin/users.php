<?php

session_start();
include('../config/dbcon.php');
include('../config/auth.php');
include('./header.php');
?>



<div class="container py-5">
    <h1 class="display-6">Users</h1>
    <br>

    <?php

    include('../message/message.php')

    ?>

    <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role As</th>
                    <th>created_at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $get_users = "SELECT * FROM users";
                $get_users_run = mysqli_query($con, $get_users);

                if ($get_users_run) {
                    foreach ($get_users_run as $user) {
                ?>
                        <tr>
                            <th><?= $user['id']; ?></th>
                            <th><?= $user['name']; ?></th>
                            <th><?= $user['email']; ?></th>
                            <th><?= $user['role_as']; ?></th>
                            <th><?= $user['created_at']; ?></th>
                            <th>
                                <form action="../Code/users_code.php" method="post" onSubmit="return confirm('are you sure')">
                                    <button class="btn btn-danger" name="btn-delete" value="<?= $user['id']; ?>" type="submit">Delete</button>
                                </form>
                                <a href="../admin/user_update.php?id=<?= $user['id']; ?>" class="btn btn-info">Edit</a>
                            </th>
                        </tr>
                    <?php   }
                } else {
                    ?>

                    <tr>
                        <th colspan="6">No Users Found</th>
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