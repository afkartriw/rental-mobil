<?php 
    session_start();
    include('server.php');
    //if user is not logged in, you cannot access this page
    if (empty($_SESSION['username'])) {
        header('location: login.php');
    } else {
        header('location: ../FormCRUD/form.php');
    }
?>

