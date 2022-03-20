<?php 


session_start();
include('connexion.php') ; 
if ($_SESSION["admin"]  != true){
	header("Location: blog.php");
}




    include ("connexion.php");
    if ($resultats = $connexion->query( "delete from blog where id_blog='".$_GET["id"]."'" ) ) 
{
    header("Location: blog-admin.php?supprimer=oui");
} 
else {
    header("Location: blog-admin.php?supprimer=non");
}


?>