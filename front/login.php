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
include('../front/layouts/header.php');
?>



<div class="container py-5" align="center">
    <br>
    <?php

    include('../message/message.php')

    ?>
    <div class="card col-md-5 border-0">
        <div class="card-header">
            <h4 class="display-6">Login</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <form action="../Code/auth_code.php" method="post">
                    <div class="group mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required />
                    </div>
                    <div class="group mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required />
                    </div>
                    <div class="group mb-3">
                        <label>Remember me</label>
                        <input type="checkbox" class="form-control" style="width:20px;height:20px;" />
                    </div>
                    <div class="group mb-3">
                        <button class="btn btn-primary" name="login_btn" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php

include('../front/layouts/scripts.php');

?>