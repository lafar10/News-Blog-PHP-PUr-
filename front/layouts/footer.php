<?php

include('../config/dbcon.php');
?>
<style>
    #aa {
        color: grey;
    }

    #aa:hover {
        margin-right: 5px;
    }
</style>
<footer class=" bg-light">
    <hr>
    <div class="container">
        <div class="row ">
            <div class="col-md-4 footer-column">
                <img src="../public/master_icon.png" alt="" width="100%" height="200px">
            </div>
            <div class="col-md-4 footer-column">
                <br>
                <br>
                <ul class="nav flex-column " align="center">
                    <li class="nav-item ">
                        <h6 class="display-6">Menu</h6>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="aa" href="../front/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="aa" href="../front/about_us.php">About US</a>
                    </li>
                    <?php
                    $get_categories = "SELECT * FROM categories order By id desc";
                    $get_categories_run = mysqli_query($con, $get_categories);

                    if (mysqli_num_rows($get_categories_run) > 0) {
                        foreach ($get_categories_run as $post) {
                    ?>
                            <li class="nav-item">
                                <a class="nav-link" id="aa" href="../front/by_category.php?id=<?= $post['id'] ?>"><?= $post['category_name'] ?></a>
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
            </div>
            <div class="col-md-4 footer-column" align="center">
                <br>
                <br>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <h5 class="display-6">Map's</h5>
                    </li>
                    <br>
                    <li class="nav-item">
                        <a class="nav-link" id="aa" href="#"><i style="color:rgb(218, 140, 121);" class="fas fa-map-marked-alt"></i> Oued-Zem, Boulevard Mohamed V N°201, <br>Morocco.<br>Tel :+47 45 80 80 80</a>
                    </li>
                </ul>
            </div>
        </div>
        <br>
        <br>
        <div class="text-center"><i class="fas fa-ellipsis-h"></i></div>

        <div class="row text-center">
            <div class="col-md-4 box">
                <span class="copyright quick-links">Copyright &copy; Your Website <script>
                        document.write(new Date().getFullYear())
                    </script>
                </span>
            </div>
            <div class="col-md-4 box">
                <ul class="list-inline social-buttons">
                    <li class="list-inline-item">
                        <a href="#">
                            <i style="color:rgb(85, 173, 255);" class="fab fa-twitter"></i>
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
                            <i style="color:deeppink;" class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <i style="color:green;" class="fab fa-whatsapp"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 box">
                <ul class="list-inline quick-links">
                    <li class="list-inline-item">
                        <a href="#">Privacy Policy</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">Terms of Use</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>


<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>

        <h5 id="offcanvasRightLabel">القائمة</h5>
    </div>
    <form action="" methodd="get" align="center" class="d-flex">
        <input type="text" name="search" class="form-control">&nbsp;&nbsp;
        <button type="submit" class="btn btn-outline-warning"><i class="fas fa-search"></i></button>
    </form>&nbsp;&nbsp;
    <div class="offcanvas-body" align="right">
        <ul class="nav flex-column text-secondary">
            <li class="nav-item">
                <a class="nav-link" href="">الرئيسية</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">اتصل بنا</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">من نحن</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-secondary" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    الأخبار
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" style="text-align:right;" href=""></a></li>
                </ul>
            </li>
        </ul>
        <ul class="list-inline social-butts">
            <li class="list-inline-item">
                <a href="#">
                    <i class="fab fa-twitter"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="#">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="#">
                    <i class="fab fa-youtube"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="#">
                    <i class="fab fa-instagram"></i>
                </a>
            </li>
        </ul>
    </div>
</div>

<?php

include('../front/layouts/scripts.php');

?>