<?php
session_start();
include('connexion.php');
if (!empty($_SESSION["admin"])) {
  if ($_SESSION["admin"]  == true) {
    header("Location: boutique-admin.php");
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <!--<meta http-equiv="refresh" content="10" /> -->
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- pour ameilleuré le coté responsive -->
  <link rel="stylesheet" href="css/style-boutique-filtre.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <!--pour utiliser les icons de site fontawsome -->



  <title> boutique </title>
</head>

<body>
  <!--*********************************************************************************************************-->
  <!--*****************************  Début   Menu   ***********************************************************-->
  <!--*********************************************************************************************************-->
  <?php

  include('connexion.php');
  session_start();
  if (!empty($_GET["commande"])) {
    echo "<script>alert('commande passé avec succés');</script>";
  }
  ?>
  <div class="menu-bar">
    <label for="menu-mobile" class="menu-mobile">

      Menu <i class="far fa-bars"></i> <img src="image/education-logo-1.png" style="width:100px;margin-left:100px;"></label>

    <input type="checkbox" id="menu-mobile" role="button">

    <ul class="log1">
      <div><img src="image/education-logo-1.png" style="width:100px;margin-top:8px;margin-left:10px;"></div>
    </ul>

    <ul class="menu1">

      <li><a href="index.php">ACCUEIL</a></li>
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
      <li> <?php if (empty($_SESSION["etat"])) { ?><label for="menu-mobile-1-C" class="menu-mobile-1"> <a href='login.php'>SE CONNECTER</a> </label>
        <?php } else { ?>
          <label for="menu-mobile-1-D" class="menu-mobile-1"> <?php $nom = $_SESSION["nom"];
                                                              echo "$nom"; ?> <i class="fal fa-chevron-down"></i></label>
          <input type="checkbox" id="menu-mobile-1-D" role="button">
          <div class="sub-menu-1">
            <ul>
              <li><a href="deconnexion.php">DECONNECTER</a></li>

            </ul>
          </div>
        <?php } ?>
      </li>
      <?php if ((!empty($_SESSION["etat"])) && (empty($_SESSION["admin"]))) { ?>
        <li><a href="panier.php" onclick="window.open(this.href, '', 
                'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=700, height=500'); return false;"><i class="fas fa-shopping-cart"></i><?php if (!empty($_SESSION["somme"])) { ?> <span class="circle" style="padding:1px 5.5px;border-radius: 50%;background: red;"><?php echo $_SESSION['somme'];
                                                                                                                                                                                                                                                                                                                              } ?></span></a>
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
  include("connexion.php");
  ?>
  <div class="boutique-titre">
    <div class="titre1">
      <h1>Boutique informatique </h1>
    </div>
  </div>
  <div class="contenu">

    <div class="filtre" id="filtre">
      <div class="titre" onClick="showfiltre()">
        <div class="text">
          <h3>Filtrer </h3>
        </div>
        <div class="logo"><i class="fas fa-sliders-h"></i></div>
      </div>
      <div class="filtre1">
        <form action="" method="post" id="myForm">
          <div class="categorie">
            <div class="titre-categ" onClick="showcategorie()">
              <h4>CATÉGORIE </h4><i class="fas fa-caret-down"></i>
            </div>
            <div id="liste-categorie">
              <input type="radio" id="pc-port" name="categorie" value="pc portable" onclick="functionReload()" <?php if ($_POST['categorie'] == "pc portable") { ?> checked <?php  } ?>>
              <label for="pc-port"> Pc portable </label><br>
              <input type="radio" id="pc-fixe" name="categorie" value="pc bureautique" onclick="functionReload()" <?php if ($_POST['categorie'] == "pc bureautique") { ?> checked <?php  } ?>>
              <label for="pc-fixe"> Pc bureautique</label><br>
              <input type="radio" id="pc-gamer" name="categorie" value="pc gamer" onclick="functionReload()" <?php if ($_POST['categorie'] == "pc gamer") { ?> checked <?php  } ?>>
              <label for="pc-gamer"> Pc gamer</label><br><br>
            </div>
          </div>
          <div class="categorie">
            <div class="titre-categ" onClick="showmarque()">
              <h4>MARQUE </h4><i class="fas fa-caret-down"></i>
            </div>
            <div id="liste-marque">
              <input type="radio" id="asus" name="marque" value="asus" onclick="functionReload()" <?php if ($_POST['marque'] == "asus") { ?> checked <?php  } ?>>
              <label for="asus"> Asus </label><br>
              <input type="radio" id="lenovo" name="marque" value="lenovo" onclick="functionReload()" <?php if ($_POST['marque'] == "lenovo") { ?> checked <?php  } ?>>
              <label for="lenovo"> Lenovo </label><br>
              <input type="radio" id="msi" name="marque" value="msi" onclick="functionReload()" <?php if ($_POST['marque'] == "msi") { ?> checked <?php  } ?>>
              <label for="msi"> MSI </label><br><br>
            </div>
          </div>
          <div class="categorie">
            <div class="titre-categ" onClick="showprix()">
              <h4>PRIX </h4><i class="fas fa-caret-down"></i>
            </div>
            <div id="liste-prix">

              Inférieur à <input class="numb" type="number" name="inferieur" onfocusout="functionReload()" value="<?php if ($_POST['inferieur']) {
                                                                                                                    echo $_POST['inferieur'];
                                                                                                                  } ?>"> <br><br>

              Supérieur à <input class="numb" type="number" name="superieur" onfocusout="functionReload()" value="<?php if ($_POST['superieur']) {
                                                                                                                    echo $_POST['superieur'];
                                                                                                                  } ?>"> <br>
            </div>
          </div>
        </form>

      </div>
    </div>

    <div class="boutique">

      <div class="produits">
        <div class="prods">
          <?php
          if (($_POST['inferieur']) && (empty($_POST['superieur'])) and (empty($_POST['marque'])) and (empty($_POST['categorie']))) {
            $resultats = $connexion->query("SELECT * from produit where prix<=" . $_POST['inferieur'] . "");
            $resultats->setFetchMode(PDO::FETCH_OBJ);
          } else if (($_POST['superieur']) && (empty($_POST['inferieur'])) and (empty($_POST['marque'])) and (empty($_POST['categorie']))) {
            $resultats = $connexion->query("SELECT * from produit where prix>=" . $_POST['superieur'] . "");
            $resultats->setFetchMode(PDO::FETCH_OBJ);
          } else if (($_POST['inferieur']) && ($_POST['superieur']) and (empty($_POST['marque'])) and (empty($_POST['categorie']))) {
            $inf = $_POST['inferieur'];
            $sup = $_POST['superieur'];
            $resultats = $connexion->query("SELECT * from produit  where prix<='$inf' and prix>='$sup' ");
            $resultats->setFetchMode(PDO::FETCH_OBJ);
          } else if (($_POST['categorie']) and (empty($_POST['marque'])) and (empty($_POST['inferieur'])) and (empty($_POST['superieur']))) {
            $categorie = $_POST['categorie'];
            $categorie = strtoupper($categorie);
            $resultats = $connexion->query("SELECT * from produit where UPPER(nom) like '%$categorie%' ");
            $resultats->setFetchMode(PDO::FETCH_OBJ);
          } else if (($_POST['marque']) and (empty($_POST['categorie'])) and (empty($_POST['inferieur'])) and (empty($_POST['superieur']))) {
            $marque = $_POST['marque'];
            $marque = strtoupper($marque);
            $resultats = $connexion->query("SELECT * from produit where UPPER(nom) like '%$marque%' ");
            $resultats->setFetchMode(PDO::FETCH_OBJ);
          } else if (($_POST['marque']) and ($_POST['categorie']) and (empty($_POST['inferieur'])) and (empty($_POST['superieur']))) {
            $marque = $_POST['marque'];
            $categorie = $_POST['categorie'];
            $marque = strtoupper($marque);
            $categorie = strtoupper($categorie);
            $resultats = $connexion->query("SELECT * from produit where UPPER(nom) like '%$marque%' and UPPER(nom) like '%$categorie%' ");
            $resultats->setFetchMode(PDO::FETCH_OBJ);
          } else if (($_POST['marque']) and ($_POST['categorie']) and ($_POST['inferieur']) and (empty($_POST['superieur']))) {
            $marque = $_POST['marque'];
            $categorie = $_POST['categorie'];
            $inf = $_POST['inferieur'];
            $marque = strtoupper($marque);
            $categorie = strtoupper($categorie);
            $resultats = $connexion->query("SELECT * from produit where UPPER(nom) like '%$marque%' and UPPER(nom) like '%$categorie%' and prix<='$inf' ");
            $resultats->setFetchMode(PDO::FETCH_OBJ);
          } else if (($_POST['marque']) and ($_POST['categorie']) and (empty($_POST['inferieur'])) and ($_POST['superieur'])) {
            $marque = $_POST['marque'];
            $categorie = $_POST['categorie'];
            $sup = $_POST['superieur'];
            $marque = strtoupper($marque);
            $categorie = strtoupper($categorie);
            $resultats = $connexion->query("SELECT * from produit where UPPER(nom) like '%$marque%' and UPPER(nom) like '%$categorie%' and prix>='$sup' ");
            $resultats->setFetchMode(PDO::FETCH_OBJ);
          } else if (($_POST['marque']) and ($_POST['categorie']) and ($_POST['inferieur']) and ($_POST['superieur'])) {
            $marque = $_POST['marque'];
            $categorie = $_POST['categorie'];
            $inf = $_POST['inferieur'];
            $sup = $_POST['superieur'];
            $marque = strtoupper($marque);
            $categorie = strtoupper($categorie);
            $resultats = $connexion->query("SELECT * from produit where UPPER(nom) like '%$marque%' and UPPER(nom) like '%$categorie%' and prix>='$sup' and prix<='$inf' ");
            $resultats->setFetchMode(PDO::FETCH_OBJ);
          } else if (($_POST['marque']) and (empty($_POST['categorie'])) and ($_POST['inferieur']) and (empty($_POST['superieur']))) {
            $marque = $_POST['marque'];

            $inf = $_POST['inferieur'];
            $marque = strtoupper($marque);
            $categorie = strtoupper($categorie);
            $resultats = $connexion->query("SELECT * from produit where UPPER(nom) like '%$marque%'  and prix<='$inf' ");
            $resultats->setFetchMode(PDO::FETCH_OBJ);
          } else if (($_POST['marque']) and (empty($_POST['categorie'])) and (empty($_POST['inferieur'])) and ($_POST['superieur'])) {
            $marque = $_POST['marque'];

            $sup = $_POST['superieur'];
            $marque = strtoupper($marque);
            $categorie = strtoupper($categorie);
            $resultats = $connexion->query("SELECT * from produit where UPPER(nom) like '%$marque%'  and prix>='$sup' ");
            $resultats->setFetchMode(PDO::FETCH_OBJ);
          } else if (($_POST['marque']) and (empty($_POST['categorie'])) and ($_POST['inferieur']) and ($_POST['superieur'])) {
            $marque = $_POST['marque'];

            $inf = $_POST['inferieur'];
            $sup = $_POST['superieur'];
            $marque = strtoupper($marque);
            $categorie = strtoupper($categorie);
            $resultats = $connexion->query("SELECT * from produit where UPPER(nom) like '%$marque%'  and prix>='$sup' and prix<='$inf' ");
            $resultats->setFetchMode(PDO::FETCH_OBJ);
          } else if (($_POST['categorie']) and (empty($_POST['marque'])) and ($_POST['inferieur']) and (empty($_POST['superieur']))) {
            $categorie = $_POST['categorie'];

            $inf = $_POST['inferieur'];
            $marque = strtoupper($marque);
            $categorie = strtoupper($categorie);
            $resultats = $connexion->query("SELECT * from produit where UPPER(nom) like '%$categorie%'  and prix<='$inf' ");
            $resultats->setFetchMode(PDO::FETCH_OBJ);
          } else if (($_POST['categorie']) and (empty($_POST['marque'])) and (empty($_POST['inferieur'])) and ($_POST['superieur'])) {
            $categorie = $_POST['categorie'];

            $sup = $_POST['superieur'];
            $marque = strtoupper($marque);
            $categorie = strtoupper($categorie);
            $resultats = $connexion->query("SELECT * from produit where UPPER(nom) like '%$categorie%'  and prix>='$sup' ");
            $resultats->setFetchMode(PDO::FETCH_OBJ);
          } else if (($_POST['categorie']) and (empty($_POST['marque'])) and ($_POST['inferieur']) and ($_POST['superieur'])) {
            $categorie = $_POST['categorie'];

            $inf = $_POST['inferieur'];
            $sup = $_POST['superieur'];
            $marque = strtoupper($marque);
            $categorie = strtoupper($categorie);
            $resultats = $connexion->query("SELECT * from produit where UPPER(nom) like '%$categorie%'  and prix>='$sup' and prix<='$inf' ");
            $resultats->setFetchMode(PDO::FETCH_OBJ);
          } else {
            $resultats = $connexion->query("SELECT * from produit ");
            $resultats->setFetchMode(PDO::FETCH_OBJ);
          }

          if ($resultats->rowCount() >= 1) {
            while ($resultat = $resultats->fetch()) {


          ?>
              <div class="produit" <?php if ($resultats->rowCount() == 1){?>style="width:100%;"<?php } ?>>
                <img src="image/produits/<?php echo  $resultat->image; ?>">
                <div class="titre">
                  <?php echo  $resultat->titre_principal; ?>
                </div>
                <div class="price">
                  <?php echo  $resultat->prix; ?> euro
                </div>
                <div class="liens">
                  <a href="panier.php?action=ajout&amp;l=<?php echo  $resultat->nom; ?>&amp;q=1&amp;p=<?php echo  $resultat->prix; ?>" onclick="window.open(this.href, '', 
                'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=700, height=500'); return false;window.location.reload(true);">Ajouter au panier</a>
                  <a href="details-boutique.php?id=<?php echo  $resultat->id_produit; ?>">détails</a>
                </div>
              </div>
          <?php


            }
          } else {
            echo 'produit introuvable';
          }

          ?>





        </div>



      </div>

    </div>
  </div>
  <!--*********************************************************************************************************-->
  <!--**********************************   Fin   boutique      **************************************-->
  <!--*********************************************************************************************************-->
  <div id="button-filtre" class="button-filtre"><button onClick="buttonfiltre()">
      <div class="text">
        <h3>Filtrer </h3>
      </div>
      <div class="logo"><i class="fas fa-sliders-h"></i>
    </button></div>





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
  <script>
    function functionReload() {
      document.getElementById("myForm").submit();
    }
    var intervalId = window.setInterval(function() {
      document.getElementById("myForm").submit();
    }, 15000);  

    function showfiltre() {
      var x = document.getElementById("filtre");
      var y = document.getElementById("button-filtre");

      x.style.display = "none";
      y.style.display = "block";
    }

    function showcategorie() {
      var x = document.getElementById("liste-categorie");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }

    function showmarque() {
      var x = document.getElementById("liste-marque");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }

    function showprix() {
      var x = document.getElementById("liste-prix");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }

    function buttonfiltre() {
      var x = document.getElementById("filtre");
      var y = document.getElementById("button-filtre");

      x.style.display = "block";
      y.style.display = "none";
    }
  </script>
</body>

</html>