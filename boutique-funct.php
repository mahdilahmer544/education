<?php session_start();
include('connexion.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php $lib=$_SESSION["libelle"];
          $prix= $_SESSION["prix"];
        
    header("Location: panier.php?action=ajout&l=$lib&q=1&p=$prix");?>

</body>
</html>
