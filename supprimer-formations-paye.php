<?php 


session_start();
include('connexion.php') ; 
if ($_SESSION["admin"]  != true){
	header("Location: formations-paye.php");
}




    include ("connexion.php");
    $nom=$_GET["nom"];
    if ($resultats = $connexion->query( "delete from formation_paye where id_video='".$_GET["id"]."'" ) ) 
 {
    header("Location: formations-paye-admin.php?supprimer=oui&nom=$nom ");
} 
else {
    header("Location: formations-paye-admin.php?supprimer=non&nom=$nom");
}



?>