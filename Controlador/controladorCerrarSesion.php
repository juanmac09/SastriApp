<?php
    session_start();
    session_destroy();

    echo "<script> location.href='../Vista/extras/login.php'</script>";
    
?>