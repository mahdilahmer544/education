<?php
session_start();
include('connexion.php') ; 
if ($_SESSION["admin"]  != true){
	header("Location: formations-paye.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- pour ameilleuré le coté responsive --> 
<link rel="stylesheet" href="css/style-ajouter-formations-paye.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" 
crossorigin="anonymous" /> <!--pour utiliser les icons de site fontawsome -->

 
     
<title> ajouter-formations-paye  </title>
</head>
<body>

  <!--*********************************************************************************************************-->
 <!--**********************************   Début   ajouter-formations-paye   *******************************************************-->
 <!--*********************************************************************************************************-->

<div class="ajouter">
<?php
      include( "connexion.php" );
	  if(!$_POST["send"])
	  {
	
	  ?>
    <form method="post" action="" enctype="multipart/form-data">
         video 
         <input type="file" name="video" >
        
         titre video <br>
         <input type="text" name="titre-video"  required> <br>
         type <br>
         <input type="text" name="langage" value="<?php echo $_GET['nom']?>" > <br>
         categorie <br>
         <input type="text" name="categorie" value="<?php echo $_GET['id']?>" > <br>
         <input type="submit" value="ENVOYER" name="send"   class="send" />
         
         
    </form>
            <?php
	    }
	  else
	  {
		if($_POST["send"]){
			$nom_vid="";
			$titre_vid=str_replace("'", "", $_POST["titre-video"]);
          $query="INSERT INTO formation_paye (video,titre_video, type,categorie) 
          VALUES ('".$nom_vid."','".$titre_vid."','".$_POST["langage"]."','".$_POST["categorie"]."')  ";
				

		if($_FILES["video"])
		{
		
         $file_name = $_FILES['video']['name'];
		$file_temp = $_FILES['video']['tmp_name'];
		//$file_size = $_FILES['video']['size'];
 
		//if($file_size < 500000000000000000000000000000000000000000000000000000000000000000000 ){
			$file = explode('.', $file_name);
			$end = end($file);
			$allowed_ext = array('avi', 'flv', 'wmv', 'mov', 'mp4');
			if(in_array($end, $allowed_ext)){
				$name = date("Ymd").time();
				$location = 'videos/'.$name.".".$end;
				if(move_uploaded_file($file_temp, $location)){
					 $titre_vid=str_replace("'", "", $_POST["titre-video"]);
					  $query="INSERT INTO formation_paye (video,titre_video, type,categorie) 
                           VALUES ('".$name."','".$titre_vid."','".$_POST["langage"]."','".$_POST["categorie"]."')  ";
				}
			}else{
				echo "<script>alert('Wrong video format')</script>";
				echo "<script>window.location = 'index.php'</script>";
			}
          }
		//}
          //else{
		//	echo "<script>alert('File too large to upload')</script>";
		//	echo "<script>window.location = 'index.php'</script>";
		//}
         
          
           
           

           $nom=$_POST["langage"];
		 if ( $resultat =$connexion->query($query )) 
		{
			
			header("Location:formations-paye-admin.php?ajouter=oui&nom=$nom ");
		}
		
		else
			{
				header("Location: formations-paye-admin.php?ajouter=non&nom=$nom ");
		}
       }
       	
       }
	    
		
		?>
    
</div>
 <!--*********************************************************************************************************-->
 <!--**********************************   Fin   ajouter-formations-paye   *******************************************************-->
 <!--*********************************************************************************************************-->

</body>
</html>