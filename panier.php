<?php
session_start();
include_once("fonctions-panier.php");
include( "connexion.php" );
if (!empty($_GET["acheter"])){
if($_GET["acheter"]=="oui") 
{
    echo "<script> alert('commande  passée avec succès')</script> " ; 
}
}
$erreur = false;

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
   if(!in_array($action,array('ajout', 'suppression', 'refresh')))
   $erreur=true;

   //récupération des variables en POST ou GET
   $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
   $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
   $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;

   //Suppression des espaces verticaux
   $l = preg_replace('#\v#', '',$l);
   //On vérifie que $p est un float
   $p = floatval($p);

   //On traite $q qui peut être un entier simple ou un tableau d'entiers
    
   if (is_array($q)){
      $QteArticle = array();
      $i=0;
      foreach ($q as $contenu){
         $QteArticle[$i++] = intval($contenu);
      }
   }
   else
   $q = intval($q);
    
}

if (!$erreur){
   switch($action){
      Case "ajout":
         ajouterArticle($l,$q,$p);
         break;

      Case "suppression":
         supprimerArticle($l);
         break;

      Case "refresh" :
         for ($i = 0 ; $i < count($QteArticle) ; $i++)
         {
            modifierQTeArticle($_SESSION['panier']['libelleProduit'][$i],round($QteArticle[$i]));
         }
         break;

      Default:
         break;
   }
}

echo '<?xml version="1.0" encoding="utf-8"?>';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="css/style-panier.css">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<title>Votre panier</title>
</head>
<body>

<form method="post" action="panier.php">
<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">

    <tr>
        <td colspan="4">Votre panier</td>
    </tr>
    <tr>
        <td>Libellé</td>
        <td>Quantité</td>
        <td>Prix Unitaire</td>
        <td>Action</td>
    </tr>


    <?php
    if(!$_SESSION["etat"])
    { 
        $id=$_GET["id"];
       header("Location: login.php ");
    } 
    if (creationPanier())
    {
       $nbArticles=count($_SESSION['panier']['libelleProduit']);
       if ($nbArticles <= 0){
       $_SESSION['somme']=0;
       echo "<tr><td  colspan='4'>Votre panier est vide </ td></tr>";}
       else
       {
           ?> <form methode="post" action="panier.php"> <?php
          for ($i=0 ;$i < $nbArticles ; $i++)
          {
             echo "<tr>";
             echo "<td>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."</ td>";
             echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."\" disabled/></td>";
             echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."</td>";
             echo "<td><div class='supprimer'><a href=\"".htmlspecialchars("panier.php?action=suppression&l=".rawurlencode($_SESSION['panier']['libelleProduit'][$i]))."\">supprimer</a></div></td>";
             echo "</tr>";
             $detail[$i][0]=htmlspecialchars($_SESSION['panier']['libelleProduit'][$i]) ;
             $detail[$i][1]=htmlspecialchars($_SESSION['panier']['prixProduit'][$i]) ;
             $detail[$i][2]=htmlspecialchars($_SESSION['panier']['qteProduit'][$i]) ;
             $somme=$somme+$detail[$i][2];
             $_SESSION['somme']=$somme;
          }

          echo "<tr><td colspan=\"2\"> </td>";
          echo "<td colspan=\"2\">";
          echo "Total : ".MontantGlobal();
          ?> <input type="hidden" name="total" value="<?php echo MontantGlobal(); ?> " ><?php
          echo "</td></tr>";

          
          
          
           /*
          echo "<tr><td colspan=\"4\">";
          echo "<input type=\"submit\" value=\"Rafraichir\"/>";
          echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";
          echo" </td><td><input type='submit' name='commander' value='commander'> ";
          echo "</td></tr>"; */
          ?>
          </table>
          </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6 ">
                    <input class="btn btn-block btn-light text-uppercase" name="continue" value="poursuivre vos achats" type="submit">
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                       
                        <input type='submit' name='commander' class="btn btn-lg btn-block btn-success text-uppercase" value='finaliser votre commande'>
                     
                  </div>
            </div>
        </div>
    </div>
</div>
          </form> 
          <?php
            if (!empty($_POST["commander"]))
	            {
    
                    for ($i=0 ;$i < $nbArticles ; $i++){
                      
                      
                      
                     
                     

                    $query1="INSERT INTO details_commande (nom_produit,prix,quantite,nom_client,tel,adresse) 
                     VALUES ('".$detail[$i][0]."','".$detail[$i][1]."','".$detail[$i][2]."','".$_SESSION["nom"]."','".$_SESSION["tel"]."','".$_SESSION["adresse"]."')  ";
                    $resultat1 =$connexion->query($query1 );  
                  
                  }
                     
                     if ($i >= $nbArticles ){
                        $total=$_POST["total"];
                      //header("Location: paiement.php?total=$total");
                      header("Location: stripe/form-paiement.php?total=$total");
                     
                     }
                      
          
                   
                }
          
          
       }
    }
    ?>
    

<?php 
if (!empty($_POST['continue'])) { echo "<script>window.close()</script>"; }
?>
</form>
</body>
</html>