<?php

session_start();

if(isset($_SESSION['testsio444'])){
    $_SESSION['testsio444'] = array();

    session_destroy();

    header("Location: ../");
}else{
    header("Location: ../login.php");
}

?>