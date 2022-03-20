<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- pour ameilleuré le coté responsive --> 
<link rel="stylesheet" href="css/style-apropos.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" 
crossorigin="anonymous" /> <!--pour utiliser les icons de site fontawsome -->

 
     
<title> a propos </title>
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
		<li> <label for="menu-mobile-1-F" class="menu-mobile-1"> SERVICES <i class="fal fa-chevron-down"></i></label>
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
		<li class="active"> <label for="menu-mobile-1-C" class="menu-mobile-1"> CONTACT <i class="fal fa-chevron-down"></i></label>
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
 <!--*********************************  Début A propos **************************************************-->
 <!--*********************************************************************************************************-->
<div class="apropos">
	<div class="contenu1">
          <img src="image/computer-user.jpg">
          <div class="text">
			     <h1> Notre site </h1> <br>
	             Notre site web est un site de formation en ligne. <br>
	              Le site permet aux visiteurs d'accéder à des formations au développement web<br>
				   et mobile,certaines gratuites et d'autres payantes, il crée également des <br>
				   sites web et des applications mobiles payants, et permet au visiteur d'accéder<br>
				   à une boutique en ligne contenant des produits informatiques.<br>
	              Notre préséance est d’être à l’écoute de vos projets et constamment au courant <br>
				  des dernières nouveautés technologiques.<br>

                 Vous êtes déjà introduit sur le web, c’est un bon commencement ! <br>
		         Faveur à notre expérience dans ce domaine, nous allons vous assister à mettre <br>
				 toutes les chances de votre côté pour la croissance de vos projets digitaux.<br>
          </div>
    </div>
	<div class="contenu2">
		<div class="text">
			
				<h1>  Nos formations </h1><br>
				Nos formations en ligne sont des formations en développement web et mobile.<br>
                Dans le développement web ,on donne des cours dans les différents languages<br> de 
				developpement Frontend et Backend .<br>
                Nos languages du formation en développement web sont :  <br>
                HTML / CSS  /  javascript  /  jQuery  /  PHP  /  Python  /  Node js  / React js / Angular<br>
				
                Nos languages du formation en développement mobile sont :<br>
                javascript  /  kotlin  /  Swift  /  Python  /  PHP <br>
		</div>
		<img src="image/computer-user2.jpg">
    </div>
	<div class="contenu3">
		<img src="image/computer-user3.jpg">
		<div class="text">
			   <h1> Nos services </h1> <br>
				Vous avez besoin d’un site web professionnel, adaptatif ( responsive design ), <br>
				sécuriser et bien classer sur tous les moteurs de recherche ou d’une application <br>
				Smartphone (les applications qui fonctionne sous Android ou Iphone.<br>

                Notre site vous propose la formule d’un création site web  all inclusive <br>
				(site web professionnel, dynamique,sécuriser, l’hébergement du site gratuit,<br>
				nom domaine gratuit et un site bien classé sur tous les principaux moteur de <br>
				recherche( référencement SEO Tunisie ) avec meilleur rapport prix et qualité .<br>

                Notre équipe professionnel s’engage a la création site web et application mobile avec<br>
				 tout les derniers innovation technologique en informatique pour rendre votre site web<br>
				  consultable en 1er page sur google  .<br>
				
		</div>
    </div>
	<div class="contenu4">
		<div class="text">
			
				<h1> Notre boutique  </h1><br>
				
				Notre boutique en ligne contenant des produits informatiques : <br>
				carte Google Play,pc, matériels pc (souris, clavier, ecran, unité centrale), <br>
				logiciel antivirus, routeur. <br> 
		</div>
		<img src="image/shop.jpg">
    </div>
</div>
 <!--*********************************************************************************************************-->
 <!--*********************************  Fin A propos **************************************************-->
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