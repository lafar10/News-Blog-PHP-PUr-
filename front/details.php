<?php

include('../config/dbcon.php');
include('../front/layouts/header.php');
?>

<style>
    #pdef {
        margin-top: 35px;
        animation-name: pdef;
        animation-duration: 2s;
        right: 0%;
    }

    #titdef {
        animation-name: titdef;
        animation-duration: 0.5s;

        animation-direction: top;
    }

    #imgdef {
        animation-name: imgdef;
        animation-duration: 1s;
    }

    @keyframes pdef {
        from {
            transform: translateX(50px);
        }

        to {
            transform: translateX(0px);
        }
    }

    @keyframes imgdef {
        from {
            transform: translateY(50px);
        }

        to {
            transform: translateX(0px);
        }
    }

    @keyframes titdef {
        from {
            transform: translateX(50px);
        }

        to {
            transform: translateX(0px);
        }
    }
</style>

<div align="center">
    <br>
    <br>
    <br>
    <br>
    <div class="row col-lg-8" align="center">
        <?php

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $get_post = "SELECT * FROM post WHERE id='$id'";
            $get_post_run = mysqli_query($con, $get_post);

            if (mysqli_num_rows($get_post_run) > 0) {
                foreach ($get_post_run as $post) {
        ?>
                    <div class="col-lg-12">
                        <img src="../uploads/<?= $post['image'] ?>" id="imgdef" style="width:100%;height:250px;" alt="" srcset="">
                    </div>
                    <br>
                    <h6 align="right"><?= $post['created_at'] ?></h6>
                    <br>
                    <div align="left">
                        <h2 class="display-5" id="titdef"><?= $post['description'] ?></h2>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="col-lg-12">

                        <p id="pdef" align="left">
                            <?= $post['meta_title'] ?>
                        </p>
                        <br>
                        <p id="pdef" align="left">
                            <?= $post['meta_description'] ?>
                        </p>
                        <br>
                        <p id="pdef" align="left">
                            <?= $post['meta_keyword'] ?>
                        </p>
                    </div>
                <?php  }
            } else {
                ?>
                <h3 class="display-5">No Posts Found</h3>
        <?php
            }
        }
        ?>
    </div>
    <br />
    <br />


</div>



<?php

include('../front/layouts/footer.php');

include('../front/layouts/scripts.php');

?>