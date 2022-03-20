<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- pour ameilleuré le coté responsive -->
    <link rel="stylesheet" href="css/style-formations-filtrer.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!--pour utiliser les icons de site fontawsome -->

    <title> formations </title>
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
            <li class="active"><a href="formations.php"> FORMATIONS </a></li>
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
    <!--**********************************   Début formations   **************************************-->
    <!--*********************************************************************************************************-->
    <div class="lesformations">
        <div class="filtre" id="filtre">
            <div class="titre" onClick="showfiltre()">
                <div class="text">
                    <h3>Filtrer </h3>
                </div>
                <div class="logo"><i class="fas fa-sliders-h"></i></div>
            </div>
            <div class="filtre1">
                <form action="formations.php" method="post" id="myForm">
                    <div class="categorie">
                        <div class="titre-categ" onClick="showcategorie()">
                            <h4>CATÉGORIE </h4><i class="fas fa-caret-down"></i>
                        </div>
                        <div id="liste-categorie">
                            <input type="checkbox" id="web" name="web" value="web" onclick="functionReload()" <?php if ($_POST['web']) { ?> checked <?php  } ?>>
                            <label for="web"> Web </label><br>
                            <input type="checkbox" id="web-mobile" name="web-mobile" value="web-mobile" onclick="functionReload()" <?php if ($_POST['web-mobile']) { ?> checked <?php  } ?>>
                            <label for="web-mobile"> Web-mobile</label><br>
                            <input type="checkbox" id="mobile" name="mobile" value="mobile" onclick="functionReload()" <?php if ($_POST['mobile']) { ?> checked <?php  } ?>>
                            <label for="mobile"> Mobile</label><br><br>
                        </Div>
                    </div>
                    <div class="categorie">
                        <div class="titre-categ" onClick="showmarque()">
                            <h4>LANGAGES </h4><i class="fas fa-caret-down"></i>
                        </div>
                        <div id="liste-marque">


                            <?php if (($_POST['web']) || ((empty($_POST['mobile'])) && (empty($_POST['web-mobile'])))) { ?>
                                <input type="radio" id="HTML-CSS" name="langage" value="1" onclick="functionReload()" <?php if ($_POST['langage'] == "1") { ?> checked <?php  } ?>>
                                <label for="asus"> HTML-CSS </label><br>
                                <input type="radio" id="Node js" name="langage" value="6" onclick="functionReload()" <?php if ($_POST['langage'] == "6") { ?> checked <?php  } ?>>
                                <label for="Node js"> Node js </label><br>
                                <input type="radio" id="React js" name="langage" value="7" onclick="functionReload()" <?php if ($_POST['langage'] == "7") { ?> checked <?php  } ?>>
                                <label for="React js"> React js </label><br>
                                <input type="radio" id="Angular js" name="langage" value="8" onclick="functionReload()" <?php if ($_POST['langage'] == "8") { ?> checked <?php  } ?>>
                                <label for="Angular js"> Angular js </label><br>
                                <input type="radio" id="jQuery" name="langage" value="3" onclick="functionReload()" <?php if ($_POST['langage'] == "3") { ?> checked <?php  } ?>>
                                <label for="jQuery"> jQuery </label><br>
                            <?php } ?>
                            <?php if (($_POST['web-mobile']) || ((empty($_POST['web'])) && (empty($_POST['mobile'])))) { ?>

                                <input type="radio" id="javascript" name="langage" value="2" onclick="functionReload()" <?php if ($_POST['langage'] == "2") { ?> checked <?php  } ?>>
                                <label for="javascript"> JavaScript </label><br>
                                <input type="radio" id="PHP et Mysql" name="langage" value="4" onclick="functionReload()" <?php if ($_POST['langage'] == "4") { ?> checked <?php  } ?>>
                                <label for="PHP et Mysql"> PHP et Mysql </label><br>
                                <input type="radio" id="Python" name="langage" value="5" onclick="functionReload()" <?php if ($_POST['langage'] == "5") { ?> checked <?php  } ?>>
                                <label for="Python"> Python </label><br>
                            <?php } ?>
                            <?php if (($_POST['mobile']) || ((empty($_POST['web-mobile'])) && (empty($_POST['web'])))) { ?>


                                <input type="radio" id="Kotlin" name="langage" value="9" onclick="functionReload()" <?php if ($_POST['langage'] == "9") { ?> checked <?php  } ?>>
                                <label for="Kotlin"> Kotlin </label><br>
                                <input type="radio" id="Swift" name="langage" value="10" onclick="functionReload()" <?php if ($_POST['langage'] == "10") { ?> checked <?php  } ?>>
                                <label for="Swift"> Swift </label><br>
                            <?php } ?>
                        </div>
                    </div>


                </form>
            </div>
        </div>
        <?php
        include("connexion.php");
        if (($_POST['web']) and (empty($_POST['web-mobile'])) and (empty($_POST['mobile'])) and (empty($_POST['langage']))) {
            $web = $_POST['web'];
            $resultats = $connexion->query("SELECT * from formation where categorie='$web'");
            $resultats->setFetchMode(PDO::FETCH_OBJ);
        } else if (($_POST['web-mobile']) and (empty($_POST['web'])) and (empty($_POST['mobile'])) and (empty($_POST['langage']))) {
            $webmobile = $_POST['web-mobile'];
            $resultats = $connexion->query("SELECT * from formation where categorie='$webmobile'");
            $resultats->setFetchMode(PDO::FETCH_OBJ);
        } else if (($_POST['mobile']) and (empty($_POST['web-mobile'])) and (empty($_POST['web'])) and  (empty($_POST['langage']))) {
            $mobile = $_POST['mobile'];
            $resultats = $connexion->query("SELECT * from formation where categorie='$mobile'");
            $resultats->setFetchMode(PDO::FETCH_OBJ);
        } else if (($_POST['mobile']) and ($_POST['web-mobile']) and (empty($_POST['web'])) and (empty($_POST['langage']))) {
            $mobile = $_POST['mobile'];
            $webmobile = $_POST['web-mobile'];
            $resultats = $connexion->query("SELECT * from formation where categorie='$mobile' or categorie='$webmobile'");
            $resultats->setFetchMode(PDO::FETCH_OBJ);
        } else if (($_POST['mobile']) and ($_POST['web']) and (empty($_POST['web-mobile'])) and (empty($_POST['langage']))) {
            $mobile = $_POST['mobile'];
            $web = $_POST['web'];
            $resultats = $connexion->query("SELECT * from formation where categorie='$mobile' or categorie='$web'");
            $resultats->setFetchMode(PDO::FETCH_OBJ);
        } else if (($_POST['web']) and ($_POST['web-mobile']) and (empty($_POST['mobile'])) and (empty($_POST['langage']))) {
            $web = $_POST['web'];
            $webmobile = $_POST['web-mobile'];
            $resultats = $connexion->query("SELECT * from formation where categorie='$web' or categorie='$webmobile'");
            $resultats->setFetchMode(PDO::FETCH_OBJ);
        } else if (($_POST['web']) and ($_POST['web-mobile']) and ($_POST['mobile']) and (empty($_POST['langage']))) {
            $web = $_POST['web'];
            $webmobile = $_POST['web-mobile'];
            $mobile = $_POST['mobile'];
            $resultats = $connexion->query("SELECT * from formation where categorie='$web' or categorie='$webmobile' or categorie='$mobile'");
            $resultats->setFetchMode(PDO::FETCH_OBJ);
        } else if ($_POST['langage']) {
            $langage = $_POST['langage'];
            $resultats = $connexion->query("SELECT * from formation where id_formation='$langage'");
            $resultats->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $resultats = $connexion->query("SELECT * from formation ");
            $resultats->setFetchMode(PDO::FETCH_OBJ);
        }
        if ($resultats->rowCount() >= 1) {
            while ($resultat = $resultats->fetch()) {
        ?>
                <div class="contenu">

                    <div class="formations">

                        <div class="titre1">
                            <h1> <?php echo  $resultat->nom; ?> </h1>
                        </div>

                        <div class="cards-formation">
                            <div class="card-formation">
                                <img src="image/<?php echo  $resultat->image_1; ?>" alt="Avatar" style="width:100%">
                                <div class="container-card">
                                    <h4><b><?php echo strtoupper($resultat->titre_1) ; ?></b></h4>
                                    <p> <?php echo  $resultat->text_1; ?></p>
                                </div>
                            </div>

                            <div class="card-formation">

                                <?php if ($resultat->image_2 != "") {
                                    echo "<img src='image/$resultat->image_2'  alt='Avatar' style='width:100%' >";
                                } ?>
                                <div class="container-card">
                                    <h4><b><?php echo  strtoupper($resultat->titre_2); ?></b></h4>
                                    <p> <?php echo  $resultat->text_2; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="main-video">
                                <div class="video">
                                    <video src="videos/<?php echo  $resultat->video_1; ?>" controls></video>
                                    <h3 class="title"><?php echo  $resultat->titre_video_1; ?> </h3>
                                </div>
                            </div>
                            <div class="video-list">
                                <div class="vid active">
                                    <video src="videos/<?php echo  $resultat->video_1; ?>" controls></video>
                                    <h3 class="title"><?php echo  $resultat->titre_video_1; ?> </h3>
                                </div>
                                <div class="vid">
                                    <video src="videos/<?php echo  $resultat->video_2; ?>" controls></video>
                                    <h3 class="title"><?php echo  $resultat->titre_video_2; ?> </h3>
                                </div>
                                <div class="vid">
                                    <video src="videos/<?php echo  $resultat->video_3; ?>" controls></video>
                                    <h3 class="title"><?php echo  $resultat->titre_video_3; ?> </h3>
                                </div>
                                <div class="conex">
                                    <h2>pour plus des videos, connectez-vous et payez juste 5 euro pour voir tous nos videos</h2>
                                    <?php if (!empty($_SESSION["admin"])) {
                                        if ($_SESSION["admin"]  == true) {
                                            $nom = $resultat->nom;

                                            echo "<a href='formations-paye-admin.php?nom=$resultat->nom'>plus</a> ";
                                        }
                                    } else {
                                        if (!empty($_SESSION["paye"])) {
                                            $langage = $_POST['langage'];
                                            if ($_SESSION["paye"] == $langage) {
                                                $id = $_POST['langage'];
                                                echo "<a href='formations-paye.php?id=$id '>plus</a> ";
                                            } else {
                                                $_SESSION['video'] = true;
                                                $_SESSION["num-formation"]=$resultat->id_formation;
                                    ?> <a href="stripe/form-paiement.php?total=5&&nom=<?php echo "$resultat->nom" ?>&&id= <?php echo "$resultat->id_formation" ?>" onclick="window.open(this.href, '', 
                        'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=700, height=500'); return false;">PAYER</a>

                                            <?php }
                                        } else {
                                            $_SESSION['video'] = true;
                                            $_SESSION["num-formation"]=$resultat->id_formation;
                                            ?> <a href="stripe/form-paiement.php?total=5&&nom=<?php echo "$resultat->nom" ?>&&id= <?php echo "$resultat->id_formation" ?>" onclick="window.open(this.href, '', 
                'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=700, height=500'); return false;">PAYER</a>

                                    <?php }
                                    }  ?>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
    </div>
<?php


            }
        } else {
            echo 'le site est vide';
        }

?>
<script>
    let listVideo = document.querySelectorAll('.video-list .vid');
    let mainVideo = document.querySelector('.main-video video');
    let title = document.querySelector('.main-video .title');
    listVideo.forEach(video => {
        video.onclick = () => {
            listVideo.forEach(vid => vid.classList.remove('active')); /*enlever le mot active de video si on click sur un autre*/
            video.classList.add('active'); /*ajoute le mot active a la video selectionner*/
            if (video.classList.contains('active')) {
                let src = video.children[0].getAttribute('src');
                mainVideo.src = src;
                let text = video.children[1].innerHTML;
                title.innerHTML = text;
            };
        };
    });
</script>
<!--*********************************************************************************************************-->
<!--**********************************   Fin   formations      **************************************-->
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

    function buttonfiltre() {
        var x = document.getElementById("filtre");
        var y = document.getElementById("button-filtre");

        x.style.display = "block";
        y.style.display = "none";
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
</script>
</body>

</html>