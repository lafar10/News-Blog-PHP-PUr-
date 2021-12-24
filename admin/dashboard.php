<?php

session_start();
include('../config/dbcon.php');
include('../config/auth.php');
include('./header.php');
?>



<div class="container">

    <?php

    include('../message/message.php')

    ?>
    <h1 class="display-6">Dashboard</h1>

</div>



<?php

include('./footer.php');
?>