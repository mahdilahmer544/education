<?php
session_start();
include('connexion.php') ; 
if ($_SESSION["admin"]  != true){
	header("Location: boutique.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- pour ameilleuré le coté responsive --> 
<link rel="stylesheet" href="css/style-boutique-admin.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" 
crossorigin="anonymous" /> <!--pour utiliser les icons de site fontawsome -->

 
     
<title> boutique  </title>
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
		<li class="active"><a href="boutique.php">BOUTIQUE</a></li>
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
 <!--**********************************   Début boutique   **************************************-->
 <!--*********************************************************************************************************-->
  <?php
include( "connexion.php" );
if (!empty($_GET["supprimer"])){
if ($_GET["supprimer"]=="oui"){
    echo"<script> alert('produit supprimer');</script>";
}
elseif ($_GET["supprimer"]=="non"){
    echo"<script> alert('produit non supprimer');</script>";
}}
elseif (!empty($_GET["ajouter"])){
if ($_GET["ajouter"]=="oui"){
    echo"<script> alert('produit ajouter');</script>";
}
elseif ($_GET["ajouter"]=="non"){
    echo"<script> alert('produit non ajouter');</script>";
}}
elseif (!empty($_GET["modifier"])){
if ($_GET["modifier"]=="oui"){
    echo"<script> alert('produit modifier');</script>";
}
elseif ($_GET["modifier"]=="non"){
    echo"<script> alert('produit non modifier');</script>";
}}
?>
 <div class="boutique">
    <div class="titre1">
           <h1>Boutique informatique </h1>
    </div>
    <div class="ajouter"><a href="ajouter-boutique.php">AJOUTER UN PRODUIT   </a></div>
    <div class="produits">
        <div class="prods">
            <?php
        
            $resultats = $connexion->query( "SELECT * from produit " );
            $resultats->setFetchMode( PDO::FETCH_OBJ );
       
            if ( $resultats->rowCount() >= 1 ) {
            while ( $resultat = $resultats->fetch() ) {
            
            
            ?>
            <div class="produit">
                <img src="image/produits/<?php  echo  $resultat->image; ?>">
                <div class="titre">
                    <?php  echo  $resultat->titre_principal; ?>
                </div>
                <div class="price">
                    <?php  echo  $resultat->prix; ?> euro 
                </div>
                <div class="liens">
                    <a href="#">ajouter au panier </a>
                    <a href="details-boutique.php?id=<?php  echo  $resultat->id_produit; ?>">détails</a>
                    
                </div> 
				<div class="liens">
				    <a id="modifier" href="modifier-boutique.php?id=<?php  echo  $resultat->id_produit; ?>">modifier</a>
					<a id="supprimer" onclick="javascript:return confirm('voulez vous supprimer ce produit?')" href="supprimer-boutique.php?id=<?php  echo  $resultat->id_produit; ?>">supprimer</a>
			    </div>	
            </div>
            <?php
            
            
            }

            } else {
             echo 'le site est vide';
             }

            ?>
            
            
        
            
            
        </div>
       
        
        
    </div>
    
</div>
<!--*********************************************************************************************************-->
<!--**********************************   Fin   boutique      **************************************-->
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