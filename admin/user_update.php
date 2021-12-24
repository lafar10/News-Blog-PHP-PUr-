<?php

session_start();
include('../config/dbcon.php');
include('../config/auth.php');
include('./header.php');
?>



<div align="center">
    <br>
    <h1 class="display-6">User Update</h1>
    <br>
    <div class="row col-md-6">
        <?php

        if (isset($_GET['id'])) {
            $user_id = $_GET['id'];

            $update_user = "SELECT * FROM users WHERE id='$user_id'";
            $update_user_run = mysqli_query($con, $update_user);

            if ($update_user_run) {
                foreach ($update_user_run as $user) { ?>
                    <form action="../Code/users_code.php" method="post">
                        <input type="hidden" value="<?= $user['id']; ?>" name="user_id" />
                        <div class="group mb-3">
                            <label for="">name</label>
                            <input type="text" class="form-control" name="name" value="<?= $user['name']; ?>" />
                        </div>

                        <div class="group mb-3">
                            <label for="">email</label>
                            <input type="text" class="form-control" name="email" value="<?= $user['email']; ?>" />
                        </div>

                        <div class="group mb-3">
                            <label for="">Role As</label>
                            <select class="form-control" name="role_as">
                                <option <?= $user['role_as'] == '1' ? 'selected' : '' ?>>1</option>
                                <option <?= $user['role_as'] == '0' ? 'selected' : '' ?>>0</option>
                            </select>
                        </div>
                        <div class="group mb-3">
                            <button type="submit" class="btn btn-success" name="update_user">Update</button>
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

</div>



<?php

include('./footer.php');
?>