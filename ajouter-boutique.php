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
<link rel="stylesheet" href="css/style-ajouter-boutique.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" 
crossorigin="anonymous" /> <!--pour utiliser les icons de site fontawsome -->

 
     
<title> ajouter-boutique  </title>
</head>
<body>

  <!--*********************************************************************************************************-->
 <!--**********************************   Début   ajouter-boutique   *******************************************************-->
 <!--*********************************************************************************************************-->

<div class="ajouter">
      <?php
      include( "connexion.php" );
	  if(!$_POST["send"])
	  {
	
	  ?>
    <form method="post" action="" enctype="multipart/form-data">
         image 
         <input type="file" name="avatar" >
         titre principal <br>
         <input type="text" name="titre-princ"  required> <br>
         nom <br>
         <input type="text" name="nom"  required> <br>
         description <br>
         <textarea cols="10" rows="10" name="description" required></textarea>
         prix <br>
         <input type="text" name="prix" placeholder="0" required> <br>
         <h2>Fiche technique</h2>  
         titre-1 <br>
         <input type="text" name="titre-1"  required /> <br>
         text-1 <br>
         <textarea cols="10" rows="10" name="text-1" required></textarea>
         <button id="togg1">ajouter du texte</button>
         <div id="d1">
               titre-2 <br>
               <input type="text" name="titre-2" / > <br>
               text-2 <br>
               <textarea cols="10" rows="10" name="text-2"></textarea>
               <button id="togg2">ajouter du texte</button>
               <div id="d2">
                  titre-3 <br>
                  <input type="text" name="titre-3"  /> <br>
                  text-3 <br>
                  <textarea cols="10" rows="10" name="text-3"></textarea>
                  <button id="togg3">ajouter du texte</button>
                  <div id="d3">
                      titre-4 <br>
                      <input type="text" name="titre-4"  /> <br>
                      text-4 <br>
                      <textarea cols="10" rows="10" name="text-4"></textarea>
                      <button id="togg4">ajouter du texte</button>
                      <div id="d4">
                          titre-5 <br>
                          <input type="text" name="titre-5"/> <br>
                          text-5 <br>
                          <textarea cols="10" rows="10" name="text-5"></textarea>
                          <button id="togg5">ajouter du texte</button>
                          <div id="d5">
                             titre-6 <br>
                             <input type="text" name="titre-6"  /> <br>
                             text-6 <br>
                             <textarea cols="10" rows="10" name="text-6"></textarea>
                             <button id="togg6">ajouter du texte</button>
                             <div id="d6">
                                  titre-7 <br>
                                  <input type="text" name="titre-7"  /> <br>
                                  text-7 <br>
                                  <textarea cols="10" rows="10" name="text-7"></textarea>
                                  <button id="togg7">ajouter du texte</button>
                                  <div id="d7">
                                     titre-8 <br>
                                     <input type="text" name="titre-8"  /> <br>
                                     text-8 <br>
                                     <textarea cols="10" rows="10" name="text-8"></textarea>
                                     <button id="togg8">ajouter du texte</button>
                                     <div id="d8">
                                          titre-9 <br>
                                          <input type="text" name="titre-9"  /> <br>
                                          text-9 <br>
                                          <textarea cols="10" rows="10" name="text-9"></textarea>
                                          <button id="togg9">ajouter du texte</button>
                                          <div id="d9">
                                             titre-10 <br>
                                             <input type="text" name="titre-10"  /> <br>
                                              text-10 <br>
                                              <textarea cols="10" rows="10" name="text-10"></textarea>
                                              
                                          </div>
                                     </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
         </div>
         <input type="submit" value="ENVOYER" name="send"   class="send" />
         
         
    </form>
            <?php
	    }
	  else
	  {
		
		$image="";
          $titre_princ=str_replace("'", "", $_POST["titre-princ"]);
          $nom=str_replace("'", "", $_POST["nom"]);
          $prix=str_replace("'", "", $_POST["prix"]);
          $descrip=str_replace("'", "", $_POST["description"]);
          $titre1=str_replace("'", "", $_POST["titre-1"]);
          $text1=str_replace("'", "", $_POST["text-1"]);
          $titre2=str_replace("'", "", $_POST["titre-2"]);
          $text2=str_replace("'", "", $_POST["text-2"]);
          $titre3=str_replace("'", "", $_POST["titre-3"]);
          $text3=str_replace("'", "", $_POST["text-3"]);
          $titre4=str_replace("'", "", $_POST["titre-4"]);
          $text4=str_replace("'", "", $_POST["text-4"]);
          $titre5=str_replace("'", "", $_POST["titre-5"]);
          $text5=str_replace("'", "", $_POST["text-5"]);
          $titre6=str_replace("'", "", $_POST["titre-6"]);
          $text6=str_replace("'", "", $_POST["text-6"]);
          $titre7=str_replace("'", "", $_POST["titre-7"]);
          $text7=str_replace("'", "", $_POST["text-7"]);
          $titre8=str_replace("'", "", $_POST["titre-8"]);
          $text8=str_replace("'", "", $_POST["text-8"]);
          $titre9=str_replace("'", "", $_POST["titre-9"]);
          $text9=str_replace("'", "", $_POST["text-9"]);
          $titre10=str_replace("'", "", $_POST["titre-10"]);
          $text10=str_replace("'", "", $_POST["text-10"]);
          $query="INSERT INTO produit (titre_principal, nom,image,prix,description, titre_1,text_1, titre_2,text_2, titre_3,text_3, titre_4,text_4, titre_5,text_5, titre_6,text_6, titre_7,text_7, titre_8,text_8, titre_9,text_9, titre_10,text_10) 
          VALUES ('".$titre_princ."','".$nom."','".$image."','".$prix."','".$descrip."','".$titre1."','".$text1."','".$titre2."','".$text2."',
          '".$titre3."','".$text3."','".$titre4."','".$text4."','".$titre5."','".$text5."','".$titre6."','".$text6."','".$titre7."','".$text7."','".$titre8."','".$text8."','".$titre9."','".$text9."','".$titre10."','".$text10."')  ";
		
		if($_FILES["avatar"])
		{
			
     $fichier = strtr($fichier,
     'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
     'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy'); 
      //On remplace les lettres accentutées par les non accentuées dans $fichier.
      //Et on récupère le résultat dans fichier
 
     //En dessous, il y a l'expression régulière qui remplace tout ce qui n'est pas une lettre non accentuées ou un chiffre
     //dans $fichier par un tiret "-" et qui place le résultat dans $fichier.
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
     ?>
     //Voilà, c'est tout pour la sécurité fondamentale. ;o)

     //3-3. Le code final▲
     //Voici en exclusivité, le code d'upload !

     //Code final de l'uploadSélectionnez
     <?php
     $dossier = 'image/produits/';
     $fichier = basename($_FILES['avatar']['name']);
     //$taille_maxi = 100000000000000000000000000000000000000000000000000000;
     $taille = filesize($_FILES['avatar']['tmp_name']);
     $extensions = array('.png', '.gif', '.jpg', '.jpeg');
     $extension = strrchr($_FILES['avatar']['name'], '.'); 
     //Début des vérifications de sécurité...
     if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
    {
     $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
     }
     //if($taille>$taille_maxi)
     //{
     //$erreur = 'Le fichier est trop gros...';
     //}
     if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
     {
     //On formate le nom du fichier ici...
     $fichier = strtr($fichier, 
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
     $fichier=str_replace("'", "", $fichier);
     if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
          $titre_princ=str_replace("'", "", $_POST["titre-princ"]);
          $nom=str_replace("'", "", $_POST["nom"]);
          $prix=str_replace("'", "", $_POST["prix"]);
          $descrip=str_replace("'", "", $_POST["description"]);
          $titre1=str_replace("'", "", $_POST["titre-1"]);
          $text1=str_replace("'", "", $_POST["text-1"]);
          $titre2=str_replace("'", "", $_POST["titre-2"]);
          $text2=str_replace("'", "", $_POST["text-2"]);
          $titre3=str_replace("'", "", $_POST["titre-3"]);
          $text3=str_replace("'", "", $_POST["text-3"]);
          $titre4=str_replace("'", "", $_POST["titre-4"]);
          $text4=str_replace("'", "", $_POST["text-4"]);
          $titre5=str_replace("'", "", $_POST["titre-5"]);
          $text5=str_replace("'", "", $_POST["text-5"]);
          $titre6=str_replace("'", "", $_POST["titre-6"]);
          $text6=str_replace("'", "", $_POST["text-6"]);
          $titre7=str_replace("'", "", $_POST["titre-7"]);
          $text7=str_replace("'", "", $_POST["text-7"]);
          $titre8=str_replace("'", "", $_POST["titre-8"]);
          $text8=str_replace("'", "", $_POST["text-8"]);
          $titre9=str_replace("'", "", $_POST["titre-9"]);
          $text9=str_replace("'", "", $_POST["text-9"]);
          $titre10=str_replace("'", "", $_POST["titre-10"]);
          $text10=str_replace("'", "", $_POST["text-10"]);
          $query="INSERT INTO produit (titre_principal, nom,image,prix,description, titre_1,text_1, titre_2,text_2, titre_3,text_3, titre_4,text_4, titre_5,text_5, titre_6,text_6, titre_7,text_7, titre_8,text_8, titre_9,text_9, titre_10,text_10) 
          VALUES ('".$titre_princ."','".$nom."','".$fichier."','".$prix."','".$descrip."','".$titre1."','".$text1."','".$titre2."','".$text2."',
          '".$titre3."','".$text3."','".$titre4."','".$text4."','".$titre5."','".$text5."','".$titre6."','".$text6."','".$titre7."','".$text7."','".$titre8."','".$text8."','".$titre9."','".$text9."','".$titre10."','".$text10."')  ";
		
        
       
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          echo 'Echec de l\'upload !';
     }
     }
     else
     {
     echo $erreur;
     }} 


			
		
		//echo $query  ; 
		//exit() ; 
		 if ( $resultat =$connexion->query($query )) 
		{
			
			header('Location:boutique-admin.php?ajouter=oui');
		}
		
		else
			{
				header("Location: boutique-admin.php?ajouter=non");
		}
		
			
		
	    }
		
		?>
    <script>
         let togg1 = document.getElementById("togg1");
         let togg2 = document.getElementById("togg2");
         let togg3 = document.getElementById("togg3");
         let togg4 = document.getElementById("togg4");
         let togg5 = document.getElementById("togg5");
         let togg6 = document.getElementById("togg6");
         let togg7 = document.getElementById("togg7");
         let togg8 = document.getElementById("togg8");
         let togg9 = document.getElementById("togg9");
         let d1 = document.getElementById("d1");
         let d2 = document.getElementById("d2");
         let d3 = document.getElementById("d3");
         let d4 = document.getElementById("d4");
         let d5 = document.getElementById("d5");
         let d6 = document.getElementById("d6");
         let d7 = document.getElementById("d7");
         let d8 = document.getElementById("d8");
         let d9 = document.getElementById("d9");
         togg1.addEventListener("click", () => {
          if(getComputedStyle(d1).display == "none"){
           d1.style.display = "block";
          } 
         })
         
         togg2.addEventListener("click", () => {
          if(getComputedStyle(d2).display == "none"){
           d2.style.display = "block";
          } 
         })
         togg3.addEventListener("click", () => {
          if(getComputedStyle(d3).display == "none"){
           d3.style.display = "block";
          } 
         })
         togg4.addEventListener("click", () => {
          if(getComputedStyle(d4).display == "none"){
           d4.style.display = "block";
          }
         })
         togg5.addEventListener("click", () => {
          if(getComputedStyle(d5).display == "none"){
           d5.style.display = "block";
          } 
         })
         togg6.addEventListener("click", () => {
          if(getComputedStyle(d6).display == "none"){
           d6.style.display = "block";
          } 
         })
         togg7.addEventListener("click", () => {
          if(getComputedStyle(d7).display == "none"){
           d7.style.display = "block";
          } 
         })
         togg8.addEventListener("click", () => {
          if(getComputedStyle(d8).display == "none"){
           d8.style.display = "block";
          } 
         })
         togg9.addEventListener("click", () => {
          if(getComputedStyle(d9).display == "none"){
           d9.style.display = "block";
          } 
         })
    </script>
</div>
 <!--*********************************************************************************************************-->
 <!--**********************************   Fin   ajouter-boutique   *******************************************************-->
 <!--*********************************************************************************************************-->

</body>
</html>