<?php

include('../config/dbcon.php');
include('../config/auth.php');
include('./header.php');
?>



<div class="container py-5">
    <h1 class="display-6">Add User</h1>
    <br>

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


<?php

include('./footer.php');
?>