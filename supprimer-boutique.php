<?php 


session_start();
include('connexion.php') ; 
if ($_SESSION["admin"]  != true){
	header("Location: boutique.php");
}




    include ("connexion.php");
    if ($resultats = $connexion->query( "delete from produit where id_produit='".$_GET["id"]."'" ) ) 
{
    header("Location: boutique-admin.php?supprimer=oui");
} 
else {
    header("Location: boutique-admin.php?supprimer=non");
}


?>