<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- pour ameilleuré le coté responsive --> 
<link rel="stylesheet" href="css/style-plusdinfoscreation.css">
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
		
		<li class="active"><a href="index.php">ACCUEIL</a></li>
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
 <!--**********************************   Début plus d'info creation   **************************************-->
 <!--*********************************************************************************************************-->
 <div class="plusdinfo">
    <div class="titre1">
           <h1>Création site web et application mobile</h1>
    </div>
    <div class="contenu">
        <img src="image/creation-site-app.jpg">
        <div class="text">
            <h1>Création site web et application mobile pas cher</h1>
            Vous avez besoin d’un site web professionnel, adaptatif ( responsive design ), 
            sécuriser et bien classer sur tous les moteurs de recherche ou d’une application Smartphone 
            (les applications qui fonctionne sous Android ou Iphone).<br>
            Notre site vous propose la formule d’un création site web  
            all inclusive (site web professionnel, dynamique, sécuriser, l’hébergement du site gratuit,
             nom domaine gratuit et un site bien classé sur tous les principaux moteur de recherche 
              avec meilleur rapport prix et qualité.<br>
            Notre équipe professionnel s’engage a la création site web  avec tout les derniers
             innovation technologique en informatique pour rendre votre site web consultable en 1er page
              sur google et convertible ( tous visiteur  votre site web est transformable en client 
              potentielle ) .<br>
            
            
            Pour tout renseignement ou information complémentaire n’hésitez pas à nous contacter <br>
        </div> 
    </div>
    <div class="contenu">
         <div class="text">
             <h1>Pack All Inclusive : Le vrai BigDeal  , Création site internet   professionnel</h1>
             <ul>
                   <li>Développement d’une boutique en ligne avec paiement en ligne  international.</li>
                   <li>  Hébergement web professionnel et sécurisé (SSL + Anti-web-Hack).</li>
                   <li>  Développement d’une application Android & ios (Apple).</li>
                   <li>  Contrat de maintenance gratuit ( 3 mois ) .</li>
                   <li>  Compagne mailing gratuit (plus 200 000 Email  international ).</li>
                   <li>  Sponsorisation votre page Facebook gratuite ( 1000 j’aime ) .</li>
                   <li> Création et Activation Carte paiement international + compte Paypal vérifié.</li>
             </ul>
         </div>
         <img src="image/creation-site-app1.jpg">
    </div>
    <div class="contenu">
        <img src="image/creation-site-app2.jpg">
        <div class="text">
            <h1>Notre site </h1>
            Notre site   offre de nombreux services dans le domaine 
            d’internet.<br> Nous sommes  des seniors dans la  création site web vitrine, création 
            site web dynamique, création site e-commerce, application web et mobile aussi que le référencement
             web…<br>
            Consolidée par une équipe motivée, actif et experte, notre site  s’investit 
            dans chacune de ses missions, spécialement faveur son professionnalisme et encore à son suite 
            personnalisé vis-à-vis de tout nos clients.<br>
        </div>
   </div>
   <a href="contactez-nous.php">CONTACTEZ-NOUS</a>
</div>
<!--*********************************************************************************************************-->
<!--**********************************   Fin   plus d'info creation      **************************************-->
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