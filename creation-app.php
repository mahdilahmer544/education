<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- pour ameilleuré le coté responsive --> 
<link rel="stylesheet" href="css/style-creation-app.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" 
crossorigin="anonymous" /> <!--pour utiliser les icons de site fontawsome -->

 
     
<title> plus dinfo creation  </title>
</head>
<body>
   <!--*********************************************************************************************************-->
 <!--*****************************  Début   Menu   ***********************************************************-->
 <!--*********************************************************************************************************-->
 <?php

include('connexion.php') ; 
session_start();
if (!empty($_GET["commande"])){
echo "<script>alert('commande passé avec succés');</script>";}
?>
<div class="menu-bar" >
	<label for="menu-mobile" class="menu-mobile"> 
		
	Menu <i class="far fa-bars"></i> <img src="image/education-logo-1.png" style="width:100px;margin-left:100px;"></label>
	
	<input type="checkbox" id="menu-mobile" role="button">
    
    <ul class="log1"><div ><img src="image/education-logo-1.png" style="width:100px;margin-top:8px;margin-left:10px;"></div></ul>
	
    <ul class="menu1"> 
		
		<li ><a href="index.php">ACCUEIL</a></li>
		<li class="active"> <label for="menu-mobile-1-F" class="menu-mobile-1"> SERVICES <i class="fal fa-chevron-down"></i></label>
			 <input type="checkbox" id="menu-mobile-1-F" role="button">
			 <div class="sub-menu-1">
				 <ul>
					  <li><a href="creation-site.php">Création site web</a></li>
					  <li><a href="creation-app.php">Création application mobile</a></li>
				 </ul>
			 </div>	 
		</li>
    <li ><a href="formations.php"> FORMATIONS </a></li>
		<li><a href="boutique.php">BOUTIQUE</a></li>
		<li><a href="blog.php">BLOG </a></li>
		<li> <label for="menu-mobile-1-C" class="menu-mobile-1"> CONTACT <i class="fal fa-chevron-down"></i></label>
		     <input type="checkbox" id="menu-mobile-1-C" role="button">
		     <div class="sub-menu-1">
			     <ul>
				      <li><a href="apropos.php">À propos</a></li>
				      <li><a href="contactez-nous.php">Contactez nous</a></li>
			     </ul>
		      </div>	 
	    </li>
        <li> <?php if (empty($_SESSION["etat"])){ ?><label for="menu-mobile-1-C" class="menu-mobile-1"> <a href='login.php'>SE CONNECTER</a> </label>
			 <?php } else {?>
			 <label for="menu-mobile-1-D" class="menu-mobile-1"> <?php $nom=$_SESSION["nom"];
			                                                            echo"$nom";?> <i class="fal fa-chevron-down"></i></label>
		     <input type="checkbox" id="menu-mobile-1-D" role="button">
		     <div class="sub-menu-1">
			     <ul>
				      <li><a href="deconnexion.php">DECONNECTER</a></li>
				      
			     </ul>
		      </div>
			  <?php } ?>	 
	    </li>
		<?php if ((!empty($_SESSION["etat"]))&&(empty($_SESSION["admin"]))) { ?>
        <li><a href="panier.php" onclick="window.open(this.href, '', 
                'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=700, height=500'); return false;"><i class="fas fa-shopping-cart"></i><?php if (!empty($_SESSION["somme"])){ ?>  <span class="circle" style="padding:1px 5.5px;border-radius: 50%;background: red;"><?php echo $_SESSION['somme'];}?></span></a>
        </li>
      <?php } ?>
	</ul>
   
    
  </div>
<!--*********************************************************************************************************-->
<!--**********************************   Fin   Menu   *******************************************************-->
<!--*********************************************************************************************************-->


 
 <!--*********************************************************************************************************-->
 <!--**********************************   Début creation app  **************************************-->
 <!--*********************************************************************************************************-->
 <div class="plusdinfo">
    <div class="titre1">
           <h1>Création application mobile  </h1>
    </div>
    <div class="contenu">
        <img src="image/creation-app1.jpg">
        <div class="text">
            <h1>Les avantages d’une application mobile :</h1>
            Les avantages sont nombreux :<br>
           <ul> 
            <li>accessibles par un QR-Code ou à travers une adresse UR </li> 
            <li>aucune confirmation n’est essentielle auprès des applications market (Apple store, Google Play, etc.)</li> 
            <li>Le site mobile se transforme d’un simple clic en vraie application mobile !</li> 
            <li>Création de contenus mobiles et mise à jour du contenu.</li> 
            De nombreux éléments pour créer et manager les contenus mobiles :<br>

            <li>Articles</li> 
            <li>Galerie photos</li> 
            <li>Playlist audio/vidéo</li> 
            <li>Géo localisation</li> 
            <li>Push notification</li> 
            <li>Admob</li> 
           </ul>
            
        </div> 
    </div>
    <div class="contenu">
         <div class="text">
             <h1>Application native</h1>
              est une application mobile qui est développée exactement pour un des systèmes d’exploitation
              utilisé par les Smartphones et tablettes (iOS, Android, windows mobile, etc.).

              Le fait de développer une application native admet généralement d’utiliser toutes les fonctionnalités
              jointes au OS visé (accéléromètre, appareil photo, GPS, etc.) et permet également de présenter des 
              applications généralement plus riches que les web applications en HTML5. Une fois téléchargées et 
              installées authentiques applications peuvent par ailleurs être utilisées sans Internet.
              <h1>Application web</h1>
              est une application contrôlable (architecture 3 tiers) directement en ligne grâce à un navigateur
              web et qui ne nécessite donc pas d’installation sur les machines clientes, contrairement aux 
              applications mobiles1. De la même manière que les sites web, une application web est souvent
              installée sur un serveur et se conduit en citant des services à l’aide d’un browser, via un
              réseau informatique (Internet, LAN, MAN, etc.).
              <h1>Application hybride</h1>
              est une application utilisant le navigateur web intégré du support (Smartphone, tablette et
               smart télévision) et les techniques Web (HTML, CSS et Javascript) pour fonctionner sur 
               différents OS (iOS, Android, Windows Phone, etc.). Une telle application utilise les services
                natifs des appareils  Smartphones et peut être répartie sur les app market  telles que 
                l’AppStore, le Google Play, etc.
 
                Toutes nos applications mobiles réduisent le chemin de navigation des « mobinautes » tout en favorisant
                l’émotion et le plaisir, le tout pour procurer une expérience utilisateur (UX) optimale. 
         </div>
         <img src="image/creation-app2.jpg" id="image2"/>
    </div>
   <a href="commande.php?type=application mobile">PASSER UNE COMMANDE</a>
</div>
<!--*********************************************************************************************************-->
<!--**********************************   Fin    creation    app  **************************************-->
<!--*********************************************************************************************************-->



 

 <!--*********************************************************************************************************-->
 <!--*********************************  Début Pied de page **************************************************-->
 <!--*********************************************************************************************************-->
  <footer>
    <p> Contactez-nous <br>
    <i class="fas fa-mobile-alt"></i> 29508262 <br>
	<i class="fas fa-at"></i>  contact@formationendeveloppement.com

	</p>
	
    <div class="social-media">
        <p><a href="https://facebook.com"><i class="fab fa-facebook-f"></i></a></p>
      <p><a href="https://youtube.com"><i class="fab fa-youtube"></i></a></p>
      <p><a href="https://instagram.com"><i class="fab fa-instagram"></i></a></p>
      
    </div>
  </footer>
 <!--*********************************************************************************************************-->
 <!--**********************************   Fin   Pied de page   *******************************************************-->
 <!--*********************************************************************************************************-->
</body>
</html>