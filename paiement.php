<?php
		session_start();
		include('connexion.php') ;
        if(!$_SESSION["etat"])
        { 
            $id=$_GET["id"];
           header("Location: login.php ");
        }  
		if((!empty($_SESSION["paye"]))&(!empty($_GET["nom"])))
        { 
           $nom=$_GET["nom"];
           header("Location: formations-paye.php?nom=$nom ");
        }  
		?>
<!DOCTYPE html>
<html>
<head>
<title>paiement</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style-paiement.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <br><br><br><br>
<div class="global">

<div class="container"> 
       <?php
     if (!empty($_GET["erreur"])) {
	  if($_GET["erreur"]==1) 
	{
		echo "<script>alert('Login deja existe');</script> " ; 
	}
	elseif ($_GET["erreur"]==2){
		echo"<script>alert('utilisateur non ajouter');</script>";
	} 
    elseif ($_GET["erreur"]==3){
		echo " <script>alert('cle ou id incorrecte');</script>";
	} 
    elseif ($_GET["erreur"]==4){
		echo "<script>alert('aucun utilisateur trouvé');</script>";
	} }
  $sujet="";
  $message="";
  $type="";
  if (!empty($_POST["sujet"])){
  $sujet=$_POST["sujet"];
  $message=$_POST["message"];
  $type=$_POST["type"];
}
	if(empty($_POST["paye"]))
	{
		
	?>
         <div class="boutton">
         <button id="togg1" class="togg1 active"><h3>carte crédit</h3></button>
         <button id="togg2" class="togg2"><h3>carte e-dinar </h3></button>
         </div>
        <form method="post" action="" enctype="multipart/form-data"  id="d1">
        
                 <h3>numero de carte crédit </h3>
                 <input type="text" name="num-carte" placeholder="numero de carte crédit" required> <br>
                 <h3>date d'expiration</h3>
                 <input class="expir" type="number" name="mois" placeholder="mois " required> 
                 <input class="expir" type="number" name="anne" placeholder="année " required> <br>
                 <h3>CVV</h3>
                 <input class="cvv"type="number" name="cvv" placeholder="numéro CVV" required> <br>
				         <input type="hidden" name="message" value="<?php echo $message ?>" >
                 <input type="hidden" name="type" value="<?php echo $type ?>" >
                 <input type="hidden" name="sujet" value="<?php echo $sujet ?>" >
                 <input type="submit" value="confirmer le paiement" name="paye"  class="send">
        
        </form>
        <form method="post" action="" enctype="multipart/form-data" id="d2" >
        
                 <h3>numero de carte e-dinar </h3>
                 <input type="text" name="num-carte" placeholder="numero de carte e-dinar " required> <br>
                 
                
                 <h3>code 8 chiffres</h3>
                 <input class="cvv"type="number" name="code-8" placeholder="code 8 chiffres" required> <br>
				         <input type="hidden" name="message" value="<?php echo $message ?>" >
                 <input type="hidden" name="type" value="<?php echo $type ?>" >
                 <input type="hidden" name="sujet" value="<?php echo $sujet ?>" >
                 <input type="submit" value="confirmer le paiement" name="paye"  class="send">
        
        </form>
        <?php
	}
	else 
	{      
    if ($_GET["total"]){
		 $paye="payé";
		 $query="INSERT INTO commande (prix_total,nom_client,tel,adresse,etat) 
         VALUES ('".$_GET["total"]."','".$_SESSION["nom"]."','".$_SESSION["tel"] ."','".$_SESSION["adresse"]."','".$paye."')  ";
         $resultat =$connexion->query($query );
		 
		 echo "<script>alert('commande passé avec succés');</script>";
		 echo "<script>window.close()</script>";
		 }
		 if ($_GET["nom"]) {
			 $_SESSION["paye"]=true;
             $login=$_SESSION["email"];
			 $paye=true;
			 $query = "update client set  `paye`='".$paye."'
             where `login`='".$login."'  ";
			  $resultat =$connexion->query($query );	  
		 $nom=$_GET["nom"];
		 header("Location: formations-paye.php?nom=$nom ");
		 
		 }

     if ($_GET["commande"]=true){
            $sujet=$_POST["sujet"];
  
            $message=$_POST["message"];
            $type=$_POST["type"];
            $nom= $_SESSION["nom"] ;
		      	$tel=$_SESSION["tel"]  ;
		      	$email=$_SESSION["email"]   ;
            $query="INSERT INTO creation_site_app (nom_client,email_client, tel_client,sujet,description,type) 
          VALUES ('".$nom."','".$email."','".$tel."','".$sujet."','".$message."','".$type."')  ";
		 $resultat =$connexion->query($query );
     
     header("Location: index.php?commande=true ");
     
     }
     
   
}

		
		
	
	
		?>
  
</div>
</div>

</div>
<script>
let togg1 = document.getElementById("togg1");
let togg2 = document.getElementById("togg2");
let d1 = document.getElementById("d1");
let d2 = document.getElementById("d2");
togg1.addEventListener("click", () => {
  if(getComputedStyle(d1).display != "none"){
    d1.style.display = "block";
  } else {
    d1.style.display = "block";
    togg1. className = "togg1 active";
    d2.style.display = "none";
    togg2. className = "togg2";
  }
})
togg2.addEventListener("click", () => {
  if(getComputedStyle(d2).display != "none"){
    d2.style.display = "block";
  } else {
    d2.style.display = "block";
    togg2. className = "togg2 active";
    d1.style.display = "none";
    togg1. className = "togg1";
  }
})

</script>    
</body>
</html>