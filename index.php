<?php
require_once('db/base_PDO.php');
$title ='Live Question';
require_once('includes/header.php');
require_once('includes/tableaux.php');
?>

<body>
    <?php
    if (!empty($_SESSION)) {
        require_once('./includes/nav-bar-login.php');
    }
    else {
        require_once('./includes/nav-bar.php');
    }
    ?>

    <?php
    if (!empty($_SESSION)) {
        require_once('./includes/index-login.php');
    }
    else {
        require_once('./includes/index-no-login.php');
    }
    ?>

    <?php 
    require_once('./includes/footer.php');
    ?>