<?php

include('../config/dbcon.php');
include('../config/auth.php');
include('./header.php');
?>



<div class="container py-5">
    <h1 class="display-6">Add Category</h1>
    <br>

    <div class="row">
        <form action="../Code/categories_code.php" method="POST">
            <div class="group mb-3">
                <label>FullName</label>
                <input type="text" name="category_name" class="form-control" required />
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