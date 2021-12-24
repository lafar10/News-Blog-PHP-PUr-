<?php

session_start();
include('../config/dbcon.php');

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-sm">
    <div class="container">

        <button class="navbar-toggler" type="button" style="border:none;focus:none" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="">
            <img src="../public/master_icon.png" alt="" width=" 75px" height="45px">
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto" style="margin-right:20px;">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../front/about_us.php">About US</a>
                </li>
                <?php
                $get_categories = "SELECT * FROM categories order By id desc";
                $get_categories_run = mysqli_query($con, $get_categories);

                if (mysqli_num_rows($get_categories_run) > 0) {
                    foreach ($get_categories_run as $post) {
                ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../front/by_category.php?id=<?= $post['id'] ?>"><?= $post['category_name'] ?></a>
                        </li>
                    <?php  }
                } else {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="">Need Categories</a>
                    </li>
                <?php
                } ?>
            </ul>
            <ul class="list-inline social-butts" style="margin-top:12px;">
                <?php if (isset($_SESSION['auth_name'])) { ?>

                    <li class="list-inline-item dropdown">
                        <a class="nav-link dropdown-toggle text-secondary" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION['auth_name'] ?> <i class="fas fa-user"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <form action="../Code/auth_code.php" method="POST">
                                    <button class="dropdown-item" name="logout_btn" type="submit">
                                        تسجيل الخروج <i class="fas fa-sign-out-alt"></i>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                <?php } else { ?>

                    <li class="list-inline-item "><a class="btn btn-outline-secondary" style="text-align:right;" href="../front/login.php">تسجيل الدخول <i class="fas fa-lock"></i></a></li>
                    <li class="list-inline-item "><a class="btn btn-secondary" style="text-align:right;" stye="margin-left:3px;" href="../front/register.php">إنشاء حساب <i class="fas fa-user-plus"></i></a></li>

                <?php } ?>

                <li class="list-inline-item">
                    <a href="#">
                        <i style="color:sky-blue;" class="fab fa-twitter"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#">
                        <i style="color:blue;" class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#">
                        <i style="color:red;" class="fab fa-youtube"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#">
                        <i id="instagram" class="fab fa-instagram"></i>
                    </a>
                </li>

            </ul>

        </div>

    </div>
</nav>
<br>