<?php

session_start();
include('../config/dbcon.php');
if (isset($_SESSION['auth'])) {
    if (!$_SESSION['message']) {
        $_SESSION['message'] = "You already Connect";
    }
    header('Location: ../front/index.php');
    exit(0);
}
include('../config/dbcon.php');

include('../front/layouts/header.php');
?>



<div class="container py-5" align="center">
    <div class="card col-md-5  border-0">
        <div class="card-header">
            <h4 class="display-6">Register</h4>
            <?php

            include('../message/message.php');

            ?>
        </div>
        <div class="card-body">
            <div class="row">
                <form action="../Code/auth_code.php" method="POST">
                    <div class="group mb-3">
                        <label>FullName</label>
                        <input type="text" name="name" class="form-control" required />
                    </div>
                    <div class="group mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required />
                    </div>
                    <div class="group mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required />
                    </div>
                    <div class="group mb-3">
                        <label>Confirm Password</label>
                        <input type="password" name="confirm_ps" class="form-control" required />
                    </div>
                    <div class="group mb-3">
                        <button class="btn btn-primary" name="register_btn" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<?php

include('../front/layouts/scripts.php');

?>