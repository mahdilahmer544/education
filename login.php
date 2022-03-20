<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style-login.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 	
<title>Document sans titre</title>
</head>

<body>
<br><br><br><br>
<div class="global">

<div class="container"> 
<?php
	include("connexion.php");
	//  PDO   & mysqli 
	if (!empty($_GET["erreur"])){
	if($_GET["erreur"]=="oui") 
	{
		
		echo "Login ou mot de passe est incorrecte" ; 
	}
}
if (!empty($GET["inscription"])){
	if($_GET["inscription"]==1) 
	{
		echo "<script>alert('inscription réussite');</script>"; 
	}
}
if (!empty($_GET["env"])){
	echo"<script>alert('Nous vous avons envoyé un e-mail pour confirmer le compte, vérifiez votre boîte e-mail');</script>";
}
if(empty($_POST["connexion"]))
{

?>	
	
<form method="post" action="login.php">
<fieldset >
<legend> connexion </legend>
<input type="texte"	 name="login" placeholder="e-mail"><br>
<input type="password" name="password" placeholder="mot de passe"> <br>
<input type="submit" value="connexion" name="connexion"  class="connexion">

<button type="button"  name="inscription"  class="inscription" 
onclick="window.location.href = 'inscription.php';"> inscription </button>
</fieldset>
</form><?php
}
	else{
		
		$login = $_POST["login"] ;
		$password  = $_POST["password"] ;
		$etat="1";
		//   '".."'   '".."'
		$resultats=$connexion->query("select * from client where login='".$login."' and password='".md5($password)."' and etat='".$etat."' ");
		$resultats->setFetchMode(PDO::FETCH_OBJ); 
		$resultats2=$connexion->query("select * from admin where login='".$login."' and password='".md5($password)."' ");
		$resultats2->setFetchMode(PDO::FETCH_OBJ);
		
		
		if($resultats->rowCount()==1 ) 
		{    
			
			$resultat = $resultats->fetch();
			$_SESSION["nom"] = $resultat->nom ; 
			$_SESSION["id"] = $resultat->id_utilisateur ; 
			$_SESSION["tel"]  = $resultat->tel ; 
			$_SESSION["adresse"]  = $resultat->adresse ;
			$_SESSION["email"]  = $resultat->login ;
			$_SESSION["paye"]=$resultat->paye ;
			$_SESSION['etat']= true ; 

			header("Location: index.php");
		}
		elseif($resultats2->rowCount()==1 ) 
		{
			$resultat = $resultats2->fetch();
			$_SESSION["nom"] = $resultat->nom ;
			$_SESSION['etat']= true ;
			$_SESSION["admin"]  = true ;
			header("Location: index.php");
		}
		else
		{
			 header("Location: login.php?erreur=oui");
		}
		
		
		
		
		
		
		
		
	
		
	}
	
	
	     ?>
	
	
	
</div>
</div>	     
</body>
</html>