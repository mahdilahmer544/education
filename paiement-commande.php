<?php

include('connexion.php');
session_start();

?>

    <?php
    include('connexion.php');
    session_start();
    $type=$_POST['type'];
    
    $_SESSION['type-commande'] = $_POST['type'];
    $_SESSION['sujet'] = $_POST['sujet'];
    $_SESSION['message'] = $_POST['message'];
    header("Location: stripe/form-paiement.php?total=300")
    ?>
    







  