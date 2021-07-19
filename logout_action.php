<?php
if(session_id() == '' || !isset($_SESSION)) {
    session_start();
 }
    $_SESSION['user'] = '';
    $_SESSION['logged_in'] = false;
    $_SESSION['logMess'] = "Logout successful!";
    header('Location: index.php');
?>