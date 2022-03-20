<?php 
include('connexion.php');
	session_start();
	?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- pour ameilleuré le coté responsive -->
	<link rel="stylesheet" href="css/style-contactez-nous.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<!--pour utiliser les icons de site fontawsome -->



	<title> contactez-nous </title>
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
	<!--**********************************   Début   contactez-nous   *******************************************************-->
	<!--*********************************************************************************************************-->

	<div class="contactez-nous">
		<?php
		if (empty($_POST["send"])) {
		?>
			<form method="post" action="" enctype="multipart/form-data">
				<?php
				if (empty($_SESSION['etat'])) {
				?>
					Votre nom (obligatoire) <br>
					<input type="text" name="name" required /> <br>
					Votre email (obligatoire)<br>
					<input type="email" name="email" required /> <br>
					Votre Numéro Telephone <br>
					<input type="tel" name="phone" /> <br>
				<?php } ?>
				Sujet <br>
				<input type="text" name="sujet" /> <br>
				Votre message <br>
				<textarea cols="40" rows="10" name="message"> </textarea><br>
				<input type="submit" value="ENVOYER" name="send" class="send" />


			</form>
		<?php
		} else {

			if ($_SESSION['etat'] != true) {
				$query = "INSERT INTO message (nom_client,email_client, tel_client,sujet,message) 
          VALUES ('" . $_POST["name"] . "','" . $_POST["email"] . "','" . $_POST["phone"] . "','" . $_POST["sujet"] . "','" . $_POST["message"] . "')  ";
				$name = $_POST["name"];
				$phone = $_POST["phone"];
				$email = $_POST["email"];
				$message = $_POST["message"];
				$sujet = $_POST["sujet"];
				$to   = "mahdilahmer544@gmail.com";
				$subject = $sujet;
				$message = "--Le nom de client est : " . $name . " -- Son adresse email est: " . $email . " -- Son numero est: " . $phone . " -- Son message est: " . $message;
				$headers = "From: mahdilahmer544@gmail.com";
				$headers .= "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

				mail($to, $subject, $message, $headers);
			} else {
				$nom = $_SESSION["nom"];
				$tel = $_SESSION["tel"];
				$email = $_SESSION["email"];
				$query = "INSERT INTO message (nom_client,email_client, tel_client,sujet,message) 
          VALUES ('" . $nom . "','" . $email . "','" . $tel . "','" . $_POST["sujet"] . "','" . $_POST["message"] . "')  ";
				$message = $_POST["message"];
				$sujet = $_POST["sujet"];
				$to   = "mahdilahmer544@gmail.com";
				$subject = $sujet;
				$message = " --Le nom de client est : " . $nom . " -- Son adresse email est: " . $email . " -- Son numero est: " . $tel . " -- Son message est: " . $message;
				$headers = "From: mahdilahmer544@gmail.com";
				$headers .= "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

				mail($to, $subject, $message, $headers);
			}
			if ($resultat = $connexion->query($query)) {

				echo "<script>alert('votre message a été envoyé avec succès');</script>";
				echo "<script>window.location='contactez-nous.php';</script>";
			} else {
				echo "<script>alert(' message  envoyé ');</script>";
				echo "<script>window.location='contactez-nous.php';</script>";
			}
		} ?>
		<div class="contact">
			<p><i class="far fa-phone-alt"></i> (+216)  29 508 262 </p>
			<p><i class="fal fa-envelope"></i> contact@formationendeveloppement.com</p>
		</div>
	</div>
	<!--*********************************************************************************************************-->
	<!--**********************************   Fin   contactez-nous   *******************************************************-->
	<!--*********************************************************************************************************-->


	<!--*********************************************************************************************************-->
	<!--*********************************  Début Pied de page **************************************************-->
	<!--*********************************************************************************************************-->
	<footer>
		<p> Contactez-nous <br>
			<i class="fas fa-mobile-alt"></i> 29508262 <br>
			<i class="fas fa-at"></i> contact@formationendeveloppement.com

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