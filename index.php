<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- pour ameilleuré le coté responsive --> 
<link rel="stylesheet" href="css/style-index-test.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" 
crossorigin="anonymous" /> <!--pour utiliser les icons de site fontawsome -->


     
<title> index </title>
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
 <!--*********************************  Début Image Silder  **************************************************-->
 <!--*********************************************************************************************************-->

 <div class="slider">
	 <div class="slide active">
		   <img src="image/creation11.jpg" alt="">
		   <div class="info" >
		       <h1 class="titre12">Création site web et application mobile</h1>
		       <a href="plusdinfoscreation.php"> PLUS D'INFOS </a>
		   </div>	 
	 </div>
	 <div class="slide">
		    <img src="image/formation11.jpg" alt="">
			<div class="info">
		        <h1 class="titre12">Formation en développement web et mobile</h1>
			    <a href="plusdinfosformation.php"> PLUS D'INFOS </a>
			</div>
		
     </div>
	 <div class="slide">
		   <img src="image/boutique11.jpg" alt="">
		   <div class="info">
			   <h1 class="titre12">Boutique en ligne</h1>
		       <a href="plusdinfosboutique.php"> PLUS D'INFOS </a>
		   </div>
	 </div>
	 <div class="navigation">
		   <i class="fas fa-chevron-left prev-btn"></i>
		   <i class="fas fa-chevron-right next-btn"></i>
	 </div>
	 <div class="navigation-visibility">
		  <div class="slide-icon active"></div>
		  <div class="slide-icon"></div>
		  <div class="slide-icon"></div>
	 </div>
</div>
<!--******************************* code javascript image slider ****************************************** -->
<script type="text/javascript">
const slider =document.querySelector(".slider");
const nextBtn=document.querySelector(".next-btn");
const prevBtn=document.querySelector(".prev-btn");
const slides=document.querySelectorAll(".slide");
const slideIcons=document.querySelectorAll(".slide-icon");
const numberOfSlides=slides.length;
var slideNumber=0;
// *****************************  image slider next button  *************************************************
nextBtn.addEventListener("click",()=>{
 slides.forEach((slide)=>{
	 slide.classList.remove("active"); /*le mot active deplace d'un slide à autre*/
 });
 slideIcons.forEach((slideIcon)=>{
	 slideIcon.classList.remove("active"); /*le mot active deplace d'un icon à autre*/
 });
 slideNumber++;
 if(slideNumber>(numberOfSlides-1)){
	 slideNumber=0;
 }
 slides[slideNumber].classList.add("active");
 slideIcons[slideNumber].classList.add("active");
});

// *******************************  image slider previous button  **********************************************
prevBtn.addEventListener("click",()=>{
 slides.forEach((slide)=>{
	 slide.classList.remove("active"); /*le mot active deplace d'un slide à autre*/
 });
 slideIcons.forEach((slideIcon)=>{
	 slideIcon.classList.remove("active"); /*le mot active deplace d'un icon à autre*/
 });
 slideNumber--;
 if(slideNumber<0){
	 slideNumber=numberOfSlides-1;
 }
 slides[slideNumber].classList.add("active");
 slideIcons[slideNumber].classList.add("active");
});
//*************************************  image slider autoplay  ************************************************
var playSlider;
var repeater = ()=>{
	playSlider=setInterval(function(){
		slides.forEach((slide)=>{
	 slide.classList.remove("active"); /*le mot active deplace d'un slide à autre*/
 });
 slideIcons.forEach((slideIcon)=>{
	 slideIcon.classList.remove("active"); /*le mot active deplace d'un icon à autre*/
 });
 slideNumber++;
 if(slideNumber>(numberOfSlides-1)){
	 slideNumber=0;
 }
 slides[slideNumber].classList.add("active");
 slideIcons[slideNumber].classList.add("active");
	},4000);
}
repeater();
//**********************************  stop the image slider autoplay on mouseover  *****************************
slider.addEventListener("mouseover", () => {
  clearInterval(playSlider);
});
//********************************  start the image slider autoplay again on mouseout  ************************
slider.addEventListener("mouseout", () => {
  repeater();
});
</script>
<!--/******************************* Fin code javascript image slider *************************************** -->
 <!--*********************************************************************************************************-->
 <!--**********************************   Fin  Image Slider   *******************************************************-->
 <!--*********************************************************************************************************-->







 <!--*********************************************************************************************************-->
 <!--*********************************  Début Pied de page **************************************************-->
 <!--*********************************************************************************************************/-->
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
 <!--/*********************************************************************************************************-->
 <!--**********************************   Fin   Pied de page   *******************************************************-->
 <!--*********************************************************************************************************/-->
</body>
</html>